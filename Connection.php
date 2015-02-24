<?php
class Connection {
    
    private static $connection = NULL;
    
    public static function getInstance() {
        if (Connection::$connection === NULL) {
            
            $host = "daneel";
            $database = "n00127767";
            $username = "N00127767";
            $password = "N00127767";
            
            $dsn = "mysql:host=" . $host . ";dbname=" . $database;
            Connection::$connection = new PDO($dsn, $username, $password);
            Connection::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            if (!Connection::$connection) {
                die("Could not connect to database");
                
            }
        }
            return Connection::$connection;
    }
}
