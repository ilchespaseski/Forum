<?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','root');
define('DB_DATABASE','mockup-forum');

class DatabaseConnection
{
    public function __construct()
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if($conn->connect_error){
            die("h1 Database Connection Failed");
        }
        return $this->conn = $conn;
    }
}

?>