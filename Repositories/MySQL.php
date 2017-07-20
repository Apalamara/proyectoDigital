<?php 

namespace OfficeGuru\Repositories;

abstract class MySQL
{
    CONST DB_DRIVER = 'mysql';
    CONST DB_HOST = 'localhost';
    CONST DB_NAME = 'officeGuru';
    CONST DB_USERNAME = 'officeGuru';
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
            'mysql:host=localhost;dbname=officeGuru;charset=utf8',
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