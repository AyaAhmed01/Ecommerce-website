<?php
namespace App\Classes;

use MysqliDb;

class Db
{
    private static $host = "localhost";
    private static $user = "scanlsoo_ayaAhmed";
    private static $pwd = "uejG2hjn@4SWGSC";
    private static $dbName = "scanlsoo_ecommerce_website";

    protected static function connect()
    {
        $database = new MysqliDb (self::$host, self::$user, self::$pwd, self::$dbName);
        try
        {
            $database->connect();
            return $database;
        } catch (\Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}