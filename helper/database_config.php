<?php

class DatabaseConfig
{
    private $host = '127.0.0.1';
    private $port = '3306';
    private $username = 'root';
    private $password = 'password';
    private $database = "flip_db";

    protected $connection;

    public function __construct()
    {
        if (!isset($this->connection)) {
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database, $this->port);
            if (!$this->connection) {
                echo "Error Connecting Database to Server";
                exit();
            }
        }
    }
}