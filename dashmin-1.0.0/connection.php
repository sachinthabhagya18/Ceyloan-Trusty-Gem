<?php

class Database
{


    public static $connection;

    public static function setupconnection()
    {

        if (!isset(Database::$connection)) {
            Database::$connection = new mysqli("localhost", "root", "kom2254772@sltbb", "gem_project", 3306);
        }
    }

    public static function iud($q)
    {

        Database::setupconnection();
        Database::$connection->query($q);
    }

    public static function search($q)
    {
        Database::setupconnection();
        $resultset =  Database::$connection->query($q);
        return $resultset;
    }
}



