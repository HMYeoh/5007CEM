<?php

// Logout logic
if (isset($_POST['logout'])) {
    // Destroy the session and redirect to the login page
    session_destroy();
    header("Location: Instructor Login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Hero - Instructor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="InstructorHomepage.php">Gym Hero - Instructor</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="InstructorHomepage.php">Homepage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Instructor Members.php">Members</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="Instructor Movements.php">Movements</a>
                    </li>
                    <li class="nav-item">
                        <form method="post" class="d-flex">
                            <button class="btn btn-danger" type="submit" name="logout">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <h2>List of Movements</h2>
        <br>
        <a class="btn btn-primary" href="Instructor Create.php" role="button">New Movement</a>
        <br>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "workoutdb";

                //Create connection
                $connection = new mysqli($servername, $username, $password, $database, 3306);

                //Check connection
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                //read all row from database table
                $sql = "SELECT * FROM workout";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                $rowNumber = 1;

                //read data of each row
                while($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$rowNumber</td>
                        <td>$row[name]</td>
                        <td>$row[description]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='Instructor Edit.php?id=$row[id]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='Instructor Delete.php?id=$row[id]'>Delete</a>
                        </td>
                    </tr>
                    ";
                    $rowNumber++;
                }

                ?>

                
            </tbody>
        </table>
    </div>
</body>
</html>

