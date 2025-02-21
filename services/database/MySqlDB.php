<?php

namespace services\database;

use mysqli;
use mysqli_sql_exception;

class MySqlDB{
    private $connection;

    public function __construct($config){
        $this->connection = $this->initConnection($config);
        if ($this->connection->connect_errno){
            throw new mysqli_sql_exception("Couldn't connect to database using given credentials");
        }
    }

    private function initConnection($config): mysqli{
        $dbHost = $config["DB_HOST"];
        $dbUser = $config["DB_USER"];
        $dbPassword = $config["DB_PASSWORD"];
        $dbName = $config["DB_NAME"];
        $dbPort = $config["DB_PORT"];
        return new mysqli($dbHost, $dbUser, $dbPassword, $dbName, $dbPort);
    }

    public function query($query, $params=[]): array | false{
        // Execute a SQL query
        return $this->connection->execute_query($query, $params)->fetch_all(MYSQLI_ASSOC);
    }
}
