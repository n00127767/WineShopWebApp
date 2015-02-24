<?php

class WineryTableGateway {
   
    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getWinery() {
        $sqlQuery = "SELECT * FROM winery";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve winery");
        }
        
        return $statement;
    }
    
    public function getWineryById($id) {
        $sqlQuery = "SELECT * FROM winery WHERE Winery_ID = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array (
            "id" => $id
        );
        
        $status = $statement->execute ($params);
        
        if (!$status) {
            die("Could not retrieve winery");
        }
        return $statement;
    }
    
    public function insertWinery($n, $a, $cn, $cp, $e, $wa){
        $sqlQuery = "INSERT INTO winery ".
                "(Name, Address, ContactName, ContactPhone, Email, WebAddress) ".
                "VALUES (:Name, :Address, :ContactName, :Phone, :Email, :WebAddress)";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "Name" => $n,
            "Address" => $a,
            "ContactName" => $cn,
            "ContactPhone" => $cp,
            "Email" => $e,
            "WebAddress" => $wa
        );
        
        $status = $statement->execute($params);
        
        if (!$status){
            die("Could not insert user");
        }
        
        $id = $this->connection->lastInsertId();
        
        return $id;
    }
    
    public function deleteWinery($id) {
        $sqlQuery = "DELETE from winery WHERE Winery_ID = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die ("Could not delete winery");
        }
        
        return ($statement->rowCount() == 1);
    }
    
    public function updateWinery($id, $n, $a, $cn, $cp, $e, $wa) {
        $sqlQuery = 
                "UPDATE winery SET ".
                "Name = :Name, ".
                "Address = :Address, ".
                "ContactName = :ContactName, ".
                "ContactPhone = :ContactPhone, ".
                "Email = :Email, " .
                "WebAddress = :WebAddress " .
                "WHERE Winery_ID = :Winery_ID";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "Winery_ID" => $id,
            "Name" => $n,
            "Address" => $a,
            "ContactName" => $cn,
            "ContactPhone" => $cp,
            "Email" => $e,
            "WebAddress" => $wa
                
        );

echo '<pre>';
print_r($_POST);
echo '</pre>';
        
        $status = $statement->execute($params);
            
        return ($statement->rowCount () == 1);
        
    }
}




