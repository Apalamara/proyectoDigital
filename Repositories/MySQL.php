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
    private $name = 'session';


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
            self::DB_DRIVER . ":host=" . self::DB_HOST .";dbname=" . self::DB_NAME . ";charset=utf8mb4",
            self::DB_USERNAME,
            self::DB_PASSWORD,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }
}