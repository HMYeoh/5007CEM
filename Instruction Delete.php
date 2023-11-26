<?php
if ( isset($_GET["id"]) ) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "workoutdb";

    //Create connection
    $connection = new mysqli($servername, $username, $password, $database, 3306);

    $sql = "DELETE FROM instruction WHERE id=$id";
    $connection->query($sql);
}

header("location: Instructor View.php");
exit;
?>