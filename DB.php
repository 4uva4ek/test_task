<?php

class DB
{
    private $username = "test";
    private $password = "test";
    private $serverName = "db";
    private $database = "test";
    private $port = "3306";
    private $connection;

    public function __construct()
    {
        $this->connect();
    }


    protected function connect()
    {
        try {
            $this->connection = new mysqli($this->serverName, $this->username, $this->password, $this->database, $this->port);
        } catch (Exception $exception) {
            die($exception->getMessage());
        }
    }

    protected function query($sql)
    {
        $status = $this->connection->query($sql);
        if (!$status) {
            echo $this->connection->error;
        }
        return $status;
    }

    public function saveUserData()
    {
        $data = [
            "ip_address" => $_SERVER["REMOTE_ADDR"],
            "user_agent" => $_SERVER["HTTP_USER_AGENT"],
            "page_url" => $_SERVER["REQUEST_URI"]
        ];
        return $this->query("INSERT INTO user_info (" . implode(", ", array_keys($data)) . ") VALUES ('" . implode("', '", $data) . "') 
        ON DUPLICATE KEY UPDATE views_count=views_count+1;");
    }
}