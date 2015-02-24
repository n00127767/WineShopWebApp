<?php

class WineTableGateway {
   
    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getWines() {
        $sqlQuery = "SELECT * FROM wine";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve wines");
        }
        
        return $statement;
    }
    
    public function getWineById($id) {
        $sqlQuery = "SELECT * FROM wine WHERE Wine_ID = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array (
            "id" => $id
        );
        
        $status = $statement->execute ($params);
        
        if (!$status) {
            die("Could not retrieve wine");
        }
        return $statement;
    }
    
    public function insertWine($n, $d, $y, $t, $tp){
        $sqlQuery = "INSERT INTO wine ".
                "(Name, Description, Year, Type, Temperature) ".
                "VALUES (:Name, :Description, :Year, :Type, :Temperature)";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "Name" => $n,
            "Description" => $d,
            "Year" => $y,
            "Type" => $t,
            "Temperature" => $tp
        );
        
        $status = $statement->execute($params);
        
        if (!$status){
            die("Could not insert user");
        }
        
        $id = $this->connection->lastInsertId();
        
        return $id;
    }
    
    public function deleteWine($id) {
        $sqlQuery = "DELETE from wine WHERE Wine_ID = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die ("Could not delete wine");
        }
        
        return ($statement->rowCount() == 1);
    }
    
    public function updateWine($id, $n, $d, $y, $t, $tp) {
        $sqlQuery = 
                "UPDATE wine SET ".
                "Name = :Name, ".
                "Description = :Description, ".
                "Year = :Year, ".
                "Type = :Type, ".
                "Temperature = :Temperature " .
                "WHERE Wine_ID = :Wine_ID";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "Wine_ID" => $id,
            "Name" => $n,
            "Description" => $d,
            "Year" => $y,
            "Type" => $t,
            "Temperature" => $tp
                
        );

echo '<pre>';
print_r($_POST);
echo '</pre>';
        
        $status = $statement->execute($params);
            
        return ($statement->rowCount () == 1);
        
    }
}


