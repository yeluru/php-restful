<?php
class Database{
 
    // specify your own database credentials
     private $host = "restfulapis.db.3823919.0a2.hostedresource.net";
     private $db_name = "restfulapis";
     private $username = "restfulapis";
     private $password = "Umad%v1M";
    public $conn;
 
    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>
