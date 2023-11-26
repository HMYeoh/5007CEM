<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
  
// include database and object files
include_once '../config/database.php';
include_once '../objects/workout.php'; // Update the object file to workout.php
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare workout object
$workout = new Workout($db); // Update the object to Workout
  
// set ID property of record to read
$workout->id = isset($_GET['id']) ? $_GET['id'] : die();
  
// read the details of workout to be edited
$workout->readOne();
  
if($workout->name != null){
    // create array
    $workout_arr = array(
        "id" =>  $workout->id,
        "name" => $workout->name,
        "description" => $workout->description,
    );
  
    // set response code - 200 OK
    http_response_code(200);
  
    // make it json format
    echo json_encode($workout_arr);
}
  
else{
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user workout does not exist
    echo json_encode(array("message" => "Workout does not exist."));
}
?>
