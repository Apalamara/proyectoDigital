<?php 
namespace proyectoDitital\Repositories;

class UsuarioRepo extends Json
{
    protected function rowToEntity(array $row)
    {
        $entity = new Usuario(
            $row['first_name'],
            $row['last_name'],
            $row['email'],
            $row['password'],
        );

        $entity->setId($row['id']);
        $entity->setImage($row['image']);

        return $entity;
    }

    
}