<?php

namespace App\Models;

use PDO;
use App\Config\Config;
use App\Database\DBConnection;

abstract class Model
{
    protected $db;
    protected $config;

    protected $table;

    public function __construct()
    {
        $this->config = new Config(CONFIG);
        
        if($this->db === null){
            $this->db = new DBConnection(
                $this->config->get('db.host'),
                $this->config->get('db.dbName'),
                $this->config->get('db.userName'),
                $this->config->get('db.dbPwd'));
        }
    }

    public function getAll()
    {
        $stmt = $this->db->getPDO()->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
        // $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        return $stmt->fetchAll();
    }

    public function getAllApi()
    {
        $stmt = $this->db->getPDO()->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
        // $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        $count != 0 ? $result =  $stmt->fetchAll() : $result = $count;
        return $result;
    }
    
    public function getById($id)
    {
        $stmt = $this->db->getPDO()->prepare("SELECT * FROM {$this->table} WHERE id = (?)");
        // $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}