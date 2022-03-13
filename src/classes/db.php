<?php
namespace App\Classes;

use MysqliDb;

class Db
{
    private static $host = "localhost";
    private static $user = "root";
    private static $pwd = "";
    private static $dbName = "commerce_website";

    protected static function connect()
    {
        $database = new MysqliDb (self::$host, self::$user, self::$pwd, self::$dbName);
        try
        {
            $database->connect();
            return $database;
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}