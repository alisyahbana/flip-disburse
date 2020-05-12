<?php
include_once "database_config.php";

class Database extends DatabaseConfig
{
    public function __construct()
    {
        parent::__construct();
    }

    public function execute($query)
    {
        $result = $this->connection->query($query);
        echo mysqli_error($this->connection);
        if ($result == false) {
            echo 'Error: cannot execute the command';
            return false;
        } else {
            return true;
        }
    }

    public function get($query)
    {
        $result = $this->connection->query($query);

        if ($result == false) {
            return false;
        }

        $rows = array();

        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }
}