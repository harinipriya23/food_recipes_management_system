<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
    protected $connection;
    protected $stmt;

    public function __construct($config, $username = 'root', $password = "")
    {
        try {
            $dsn = "mysql:host={$config['host']};dbname={$config['db_name']}";
            $this->connection = new PDO($dsn, $username, $password);
            // echo "connection success";
        } catch (PDOException $e) {
            echo "connection failed" . $e->getMessage();
            exit();
        }
    }
    public function query($query, $attributes)
    {
        try {
            $this->stmt =  $this->connection->prepare($query);
            $this->stmt->execute($attributes);
            return $this;
        } catch (PDOException $e) {
            echo "Query failed" . $e->getMessage();
            exit();
        }
    }
    public function fetch()
    {
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function fetchAll()
    {
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function lastInsertId()
    {
        return $this->connection->lastInsertId();
    }
}
