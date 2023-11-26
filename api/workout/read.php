<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once '../objects/workout.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$workout = new Workout($db);

// read destination will be here
// query destination
$stmt = $workout->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {
    // destination array
    $workout_arr = array();
    $workout_arr["records"] = array();

    // retrieve our table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // extract row
        extract($row);

        $workout_item = array(
            "ID" => $id,
            "Name" => $name,
            "Description" => html_entity_decode($description),
        );

        array_push($workout_arr["records"], $workout_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show products data in json format
    echo json_encode($workout_arr);
} else {
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(array("message" => "No destinations found."));
}

?>