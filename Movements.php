<?php
require 'confiq.php';
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
}
else{
    header("Location: index.php");
}

if (isset($_POST['logout'])) {
    // Destroy the session and redirect to the login page
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

    <head>
        <title>Gym Hero Movements</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/Movements.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="Homepage.php">
            Gym Hero
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="Homepage.php">Homepage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Workout Schedule.php">Workout Schedule</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="Movements.php">Movements</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Instructors.php">Instructor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Videos.php">Routine</a>
                </li>
                <br>
                <li class="nav-item">
                    <form method="post" class="d-flex">
                        <button class="btn btn-danger" type="submit" name="logout">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
        
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1 class="mt-5">
                    <a href="Homepage.php" >
                        <img src="img/Gym Hero.png" width="220" height="220" alt="Gym Hero Logo">
                    </a>&nbsp; Movements
                </h1>
            </div>
        </div>
    </div>

    <br>

    <div class="movements-section">

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db_name = "workoutdb";
        $conn = new mysqli($servername, $username, $password, $db_name, 3306);
        if($conn->connect_error){
            die("Connection failed".$conn->connect_error);
        }
        echo "";

        //Output Form Entries from the Database
        $sql = "SELECT * FROM workout";
        //fire query
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0)
        {
        while($row = mysqli_fetch_assoc($result)){
            echo '<div class="movement-container"><h1>' . $row["name"] . '</h1><br><p>' . $row["description"] . '</p></div>';
        }
        }
        else
        {
            echo "No results";
        }
        // closing connection
        mysqli_close($conn);


        ?>
        <br>
        <br>
    </div>

        <div class="footer">
            <div class="footer-content">
                <div class="footer-column">
                    <p>
                        <img src="img/Gym Hero.png" alt class="footer-logo-img">
                    </p>
                </div>
                <br>

                <div class="footer-column">
                    <div class="footer-information">
                        <p>&copy; 2023 Gym Hero. All rights reserved.</p>
                        <p>Contact us: GymHero@gmail.com</p>
                    </div>
                </div>

                <div class="footer-column">
                    <div class="footer-information">
                        <p>Instructor Contact: Larry@gmail.com</p>
                        <p>Instructor Number: 012-9876543</p>
                    </div>
                </div>
            </div>
        </div>

    </body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

