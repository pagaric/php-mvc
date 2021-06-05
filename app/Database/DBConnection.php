<?php

namespace App\Database;

use PDO;
use PDOException;

class DBConnection
{
    private $host;
    private $dbName;
    private $userName;
    private $pwd;
    private $pdo;

    public function __construct(string $host, string $dbName, string $userName, string $pwd)
    {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->userName = $userName;
        $this->pwd = $pwd;
    }

    public function getPDO(): PDO
    {
        if ($this->pdo === null) {
            try {
                
                $this->pdo = new PDO("mysql:dbname={$this->dbName};host={$this->host};charset=UTF8",
                    $this->userName,
                    $this->pwd, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                ]);

            } catch (PDOException $e) {
                echo "Erreur: " .$e->getMessage();
            }
        }

        return $this->pdo;

        // return $this->pdo ?? $this->pdo = new PDO("mysql:dbname={$this->dbName};host={$this->host};charset=UTF8", $this->userName, $this->pwd);
    }
}
