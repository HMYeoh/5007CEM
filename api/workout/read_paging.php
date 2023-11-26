<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/core.php';
include_once '../shared/utilities.php';
include_once '../config/database.php';
include_once '../objects/workout.php'; // Update the object file to workout.php

// utilities
$utilities = new Utilities();

// instantiate database and workout object
$database = new Database();
$db = $database->getConnection();

// initialize object
$workout = new Workout($db);

// query workouts with pagination
$stmt = $workout->readPaging($from_record_num, $records_per_page);
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {

    // workouts array
    $workouts_arr = array();
    $workouts_arr["records"] = array();
    $workouts_arr["paging"] = array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $workout_item = array(
            "id" => $id,
            "name" => $name,
            "description" => html_entity_decode($description)
            // Add other fields as needed
        );

        array_push($workouts_arr["records"], $workout_item);
    }

    // include paging
    $total_rows = $workout->count();
    $page_url = "{$home_url}workout/read_paging.php?";
    $paging = $utilities->getPaging($page, $total_rows, $records_per_page, $page_url);
    $workouts_arr["paging"] = $paging;

    // set response code - 200 OK
    http_response_code(200);

    // make it json format
    echo json_encode($workouts_arr);
} else {

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user workouts do not exist
    echo json_encode(
        array("message" => "No workouts found.")
    );
}
?>