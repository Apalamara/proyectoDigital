<?php 

namespace OfficeGuru\Repositories;

use \PDO;

abstract class MySQL
{
    CONST DB_DRIVER = 'mysql';
    CONST DB_HOST = 'localhost';
    CONST DB_NAME = 'office_guru';
    CONST DB_USERNAME = 'root';
    CONST DB_PASSWORD = '';

    /** @var PDO */
    protected $conn;

    public function __construct()
    {
        $this->connect();
    }

    /** 
     * @return void
     */
    protected function connect()
    {
        $this->conn = new PDO(
            'mysql:host=localhost;dbname=office_guru;charset=utf8mb4',
            self::DB_USERNAME,
            self::DB_PASSWORD,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }


    protected abstract function rowToEntity(array $row);

    /**
     * @param array $rows
     * @return array
     */
    protected function rowsToEntities(array $rows)
    {
        $entities = [];
        foreach($rows as $row)
        {
            $entities[] = $this->rowToEntity($row);
        }

        return $entities;
    }
}