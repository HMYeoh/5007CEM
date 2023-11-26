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
    <title>Gym Hero Homepage</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/Videos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
</head>
<body>
    <div class="topnav">
        <a href="Homepage.php">Homepage</a>
        <a href="Workout Schedule.php">Workout Schedule</a>
        <a href="Movements.php">Movements</a>
        <a href="Instructors.php">Instructor</a>
        <a class="active" href="Videos.php">Routine</a>
        <div class="logout-container">
            <a href="logout.php">Logout</a>
        </div><!-- End of logout-container -->
    </div><!-- End of top-navigation -->

    <br>

    <div class="video-content">
        <div class="video-container">
            <video controls autoplay loop>
                <source src="vid/Workout.mp4" type="video/mp4">
            </video>
        </div>

        <h1>15-Minute Daily Routine Body Stretch</h1>
    </div>
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

