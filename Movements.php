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

?>

    <head>
        <title>Gym Hero Movements</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/Movements.css">
    </head>
    <body>
        <div class="topnav">
            <a href="Homepage.php">Homepage</a>
            <a href="Workout Schedule.php">Workout Schedule</a>
            <a class="active" href="Movements.php">Movements</a>
            <a href="Instructors.php">Instructor</a>
            <a href="Videos.php">Routine</a>
            <div class="logout-container">
                <a href="logout.php">Logout</a>
            </div><!-- End of logout-container -->
        </div><!-- End of top-navigation -->
        
        <div class="center-container">
            <h1>
                <a href="Homepage.php" >
                    <img src="img/Gym Hero.png" width="150" height="150" alt>
                </a>&nbsp; Movements
            </h1>
            
        </div>

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
            echo '<div class="movement-container"><h1>' . $row["name"] . '</h1><br>' . $row["description"] . '<br><br></div>';
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

