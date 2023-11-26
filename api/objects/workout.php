<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';

class Workout
{
    private $conn;
    private $table_name = "workout";

    // Destination properties
    public $id;
    public $name;
    public $description;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Method to read destinations from the database
    public function read()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // create workout
function create(){
  
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                name=:name, description=:description";
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->description=htmlspecialchars(strip_tags($this->description));
  
    // bind values
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":description", $this->description);
  
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
}

// used when filling up the update workout form
function readOne(){
  
    // query to read single record
    $query = "SELECT
                id, name, description
            FROM
                " . $this->table_name . "
            WHERE
                id = ?
            LIMIT
                0,1";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // bind id of workout to be updated
    $stmt->bindParam(1, $this->id);
  
    // execute query
    $stmt->execute();
  
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
    // set values to object properties
    $this->name = $row['name'];
    $this->description = $row['description'];
}

// update the workout
function update(){
  
    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
                name = :name,
                description = :description
            WHERE
                id = :id";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->name = htmlspecialchars(strip_tags($this->name));
    $this->description = htmlspecialchars(strip_tags($this->description));
    $this->id = htmlspecialchars(strip_tags($this->id));
  
    // bind new values
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':description', $this->description);
    $stmt->bindParam(':id', $this->id);
  
    // execute the query
    if($stmt->execute()){
        return true;
    }
  
    return false;
}

function delete(){
  
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->id = htmlspecialchars(strip_tags($this->id));
  
    // bind id of record to delete
    $stmt->bindParam(1, $this->id);
  
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
}

// search workouts
function search($keywords){
  
    // select all query
    $query = "SELECT id, name, description FROM " . $this->table_name . " WHERE name LIKE ? OR description LIKE ?";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $keywords = htmlspecialchars(strip_tags($keywords));
    $keywords = "%{$keywords}%";
  
    // bind
    $stmt->bindParam(1, $keywords);
    $stmt->bindParam(2, $keywords);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
}

public function readPaging($from_record_num, $records_per_page){
  
    // select query
    $query = "SELECT id, name, description
              FROM " . $this->table_name . "
              ORDER BY id DESC
              LIMIT ?, ?";
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // bind variable values
    $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
    $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
  
    // execute query
    $stmt->execute();
  
    // return values from database
    return $stmt;
}

// used for paging products
public function count(){
    $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
  
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
    return $row['total_rows'];
}
}

?>