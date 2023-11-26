<?php
if ( isset($_GET["id"]) ) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "workoutdb";

    //Create connection
    $connection = new mysqli($servername, $username, $password, $database, 3306);

    $sql = "DELETE FROM workout WHERE id=$id";
    $connection->query($sql);
}

header("location: Instructor Movements.php");
exit;
?>