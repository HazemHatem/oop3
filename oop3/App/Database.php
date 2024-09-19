<?php

namespace App;

class Database
{
    private static $host = "localhost";
    private static $user = "root";
    private static $password = "";
    private static $connection;

    public static function connect()
    {
        self::$connection = mysqli_connect(self::$host, self::$user, self::$password);
        self::checkConnection(self::$connection);
    }

    public static function checkConnection($connection)
    {
        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $connection;
    }

    public static function Createdb($db_name)
    {
        $sql = "CREATE DATABASE IF NOT EXISTS $db_name";
        self::query($sql);
        self::$connection = mysqli_connect(self::$host, self::$user, self::$password, $db_name);
        self::checkConnection(self::$connection);
    }

    public static function Deletedb($db_name)
    {
        $sql = "DROP DATABASE $db_name";
        self::query($sql);
    }

    public static function Deletetable($table_name)
    {
        $sql = "DROP TABLE $table_name";
        self::query($sql);
    }

    public static function CreateTable($table_name, $columns)
    {
        $sql = "CREATE TABLE IF NOT EXISTS $table_name ($columns)";
        self::query($sql);
    }

    public static function checkquery($query)
    {
        if (!$query) {
            die("Query failed: " . mysqli_error(self::$connection));
        } else {
            return $query;
        }
    }

    public static function query($sql)
    {
        return self::checkquery(mysqli_query(self::$connection, $sql));
    }

    public static function Select($sql)
    {
        $result = self::query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public static function close()
    {
        mysqli_close(self::$connection);
    }
}
