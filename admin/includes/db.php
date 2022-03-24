<?php

class Database{

    //database credential information
    private static $dbservername = 'localhost';
    private static $dbname = 'vms';
    private static $username = 'root';
    private static $password = "";
    private static $connection = null;

    public static function connect()
    {
        if(self::$connection == null)
        {
            try
            {
                self::$connection = new PDO('mysql:host='. self::$dbservername . ';dbname='.
                self::$dbname , self:: $username , self:: $password);    
            }
           catch(PDOException $e)
           {
               die($e->getMessage());
           }

          
        }
        return self::$connection;
    }
    public static function disconnect()
    {
        self::$connection = null;
    }
}

?>