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
        <title>Gym Hero Instructors</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/Instructors.css">
    </head>
    <body>
        <div class="topnav">
            <a href="Homepage.php">Homepage</a>
            <a href="Workout Schedule.php">Workout Schedule</a>
            <a href="Movements.php">Movements</a>
            <a class="active" href="Instructors.php">Instructor</a>
            <a href="Videos.php">Routine</a>
            <div class="logout-container">
                <a href="logout.php">Logout</a>
            </div><!-- End of logout-container -->
        </div><!-- End of top-navigation -->
        
        <div class="center-container">
            <h1>
                <a href="Homepage.php" >
                    <img src="img/Gym Hero.png" width="150" height="150" alt>
                </a>&nbsp; Instructor
            </h1>
        </div>
        <div class="instructor">
            <div class="image-container">
                <img src="img/Instructor1.jpg" alt>
            </div>
            <div class="introduction">
                <h1>Meet Our Instructor</h1>
                <p>
                    Larry is a dedicated and experienced fitness instructor with a passion for helping individuals achieve their fitness goals. 
                    With a wealth of knowledge in various workout routines and training techniques, Larry brings enthusiasm and motivation to every 
                    session. Whether you're a beginner or an experienced fitness enthusiast, Larry is here to guide you on your fitness journey. 
                    Get ready to sweat, smile, and see results with Larry as your instructor!
                </p>
                <div class="payment">
                    <a href="Payment.php" class="choose-button">Sign Up</a>
                </div>
                <h4>- From RM55.00</h4>
                <h4>- Instructor Consultation</h4>
                <h4>- Beginner - Advanced Movement</h4>
            </div>
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

