<?php

require_once ('../Ecommerce\ website/DB/MysqliDb.php');

class Dbh
{
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbName = "commerce_website";

    protected function connect()
    {
        $database = new MysqliDb ("localhost", "root", "", "commerce_website");
        if(!$database->connect()){
            return $database;
        } else {
            echo "Error: Database doesn't exist";
        }
    }
}