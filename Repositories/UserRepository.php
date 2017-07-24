<?php 

namespace OfficeGuru\Repositories;

use OfficeGuru\Entities\User;
use \PDO;

class UserRepository extends MySQL
{
    private $name = 'user';

    /**
     * @param array $row
     * @return User
     */
    protected function rowToEntity(array $row): User
    {
        $entity = new User(
            $row['first_name'],
            $row['last_name'],
            $row['email'],
            $row['password']
        );

        $entity->setId($row['user_id']);
        if($row['image'])
        {
            $entity->setImage($row['image']);
        }

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
     * @param User $user
     * @return bool
     */
    function insert(User $user)
    {
        $this->conn->beginTransaction();
        try 
        {
            $stmt = $this->conn->prepare("
                INSERT INTO {$this->name} (
                    first_name, last_name, email, password, image
                ) VALUES (
                    :first_name, :last_name, :email, :password, :image
                );
            ");

            $stmt->bindValue(':first_name', $user->getFirstName(), PDO::PARAM_STR);
            $stmt->bindValue(':last_name', $user->getLastName(), PDO::PARAM_STR);
            $stmt->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
            $stmt->bindValue(
                ':image',
                $user->getImage() ?? null,
                $user->getImage() ? PDO::PARAM_STR : PDO::PARAM_NULL
            );

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