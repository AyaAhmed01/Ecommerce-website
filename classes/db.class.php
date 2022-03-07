<?php

class Db
{
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbName = "commerce_website";

    protected function connect()
    {
        $database = new MysqliDb ($this->host, $this->user, $this->pwd, $this->dbName);
        try
        {
            $database->connect();
            return $database;
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}