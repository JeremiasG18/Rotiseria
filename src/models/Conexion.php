<?php 

namespace Jeremias\Rotiseria\models;

use PDO;
use PDOException;

class Conexion {
    private string $host = 'localhost';
    private string $user = 'root';
    private string $password = '';
    private string $dbname = 'rotiseria';

    private PDO $pdo;

    public function __construct()
    {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8";

            $this->pdo = new PDO($dsn, $this->user, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);

        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function con(): PDO 
    {
        return $this->pdo;
    }
}