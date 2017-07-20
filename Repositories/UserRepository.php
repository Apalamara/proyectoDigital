<?php 

namespace OfficeGuru\Repositories;

use OfficeGuru\Entities\User;

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
            $row['password'],
        );

        $entity->setId($row['id']);
        $entity->setImage($row['image']);

        return $entity;
    }

    /**
     * @param string $field
     * @param mixed $value
     * @todo como documento lo de abajo
     * @return User | null
     */
    function fetchByField(string $field, $value)
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
     * @return boolean
     */
    function insert(User $User)
    {
        $this->conn->beginTransaction();
        try {
            $stmt = $this->conn->prepare('
                INSERT INTO users (
                    first_name, last_name, email, password, image
                ) VALUES (
                    :nombre, :apellido, :email, :password, :username, 
                    :fecha_nacimiento, :sexo, :descripcion, :avatar
                );
            ');

            $stmt->bindValue(':first_name', $user->getNombre(), PDO::PARAM_STR);
            $stmt->bindValue(':last_name', $user->getApellido(), PDO::PARAM_STR);
            $stmt->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
                ':avatar',
                $user->getAvatar() ?? null,
                $user->getAvatar() ? PDO::PARAM_STR : PDO::PARAM_NULL
            );

            $stmt->execute();

            $id = $this->conn->lastInsertId();
            $stmt = $this->conn->prepare('
                INSERT INTO categoria_user VALUES (:user, :categoria);
            ');
            $stmt->bindValue(':user', $id, PDO::PARAM_INT);

            /** @var Categoria $categoria */
            foreach($categorias as $categoria)
            {
                $stmt->bindValue(':categoria', $categoria->getId(), PDO::PARAM_INT);
                $stmt->execute();
            }

            $this->conn->commit();

            return true;
        } catch(PDOException $e) {
            $this->conn->rollBack();

            return false;
        }
    }
}