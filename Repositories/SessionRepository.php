<?php 

namespace OfficeGuru\Repositories;

use OfficeGuru\Entities\Session;
use \PDO;

class SessionRepository extends MySQL
{
    private $name = 'session';

    /**
     * @param array $row
     * @return User
     */
    protected function rowToEntity(array $row): Session
    {
        $entity = new User(
            $row['id_user'],
            $row['type'],
            $row['token'],
            $row['expiration_date']
        );

        return $entity;
    }

    /**
     * @param string $field
     * @param mixed $value
     * @todo como documento lo de abajo
     * @return User | null
     */
    function fetchByField(string $field, $value)//: ?User // Requires PHP 7.1
    {
        $stmt = $this->conn->prepare("
            SELECT {$this->name}.*
            FROM {$this->name}
            WHERE LOWER({$this->name}.$field) = LOWER(:value)
            LIMIT 1
        ");

        $stmt->bindValue(':value', trim($value), PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? $this->rowToEntity($result) : null;
    }

    /**
     * @param Session $session
     * @return bool
     */
    function insert(Session $session)
    {
        $this->conn->beginTransaction();
        try 
        {
            $currentDate = new \DateTime("now");
            
            $stmt = $this->conn->prepare("
                INSERT INTO {$this->name} (
                    id_user, type, token, creation_date, expiration_date
                ) VALUES (
                    :id_user, :type, :token, :creation_date, :expiration_date
                );
            ");

            $stmt->bindValue(':id_user', $session->getIdUser(), PDO::PARAM_INT);
            $stmt->bindValue(':type', $session->getType(), PDO::PARAM_STR);
            $stmt->bindValue(':token', $session->getToken(), PDO::PARAM_STR);
            $stmt->bindValue(':creation_date', $currentDate->format('Y-m-d H:i:s'), PDO::PARAM_STR);
            $stmt->bindValue(':expiration_date', $session->getExpirationDate(), PDO::PARAM_STR);

            $stmt->execute();
            $this->conn->commit();

            return true;
        } 
        catch(PDOException $e) 
        {
            $this->conn->rollBack();

            return false;
        }
    }

    /**
     * @param string $token
     * @return bool
     */
    function deleteByToken(string $token)
    {
        $this->conn->beginTransaction();
        try 
        {       
            $stmt = $this->conn->prepare("
                DELETE FROM {$this->name} WHERE token = ':token';
            ");

            $stmt->bindValue(':token', $token, PDO::PARAM_STR);

            $stmt->execute();
            $this->conn->commit();

            return true;
        } 
        catch(PDOException $e) 
        {
            $this->conn->rollBack();

            return false;
        }
    }
}