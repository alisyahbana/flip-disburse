<?php

class DatabaseConfig
{
    private $host = '127.0.0.1';
    private $username = 'root';
    private $password = 'password';
    private $database = 'flip_db'; //change to database name

    protected $connection;

    public function __construct()
    {
        if (!isset($this->connection)) {
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
            if (!$this->connection) {
                echo "Error Connecting Database to Server";
                exit();
            }
        }
    }
}