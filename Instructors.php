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
        <title>Gym Hero Instructors</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/Instructors.css">
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
                    <a class="nav-link" href="Movements.php">Movements</a>
                </li>
                <li class="nav-item active">
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
                    </a>&nbsp; Instructor
                </h1>
            </div>
        </div>
    </div>

    <br>

    <div class="instructor">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="image-container">
                        <img src="img/Instructor1.jpg" alt="Instructor Image" class="img-fluid rounded mx-auto">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="introduction">
                        <h1 class="mb-4">Meet Our Instructor</h1>
                        <p>
                            Larry is a dedicated and experienced fitness instructor with a passion for helping individuals achieve their fitness goals. 
                            With a wealth of knowledge in various workout routines and training techniques, Larry brings enthusiasm and motivation to every 
                            session. Whether you're a beginner or an experienced fitness enthusiast, Larry is here to guide you on your fitness journey. 
                            Get ready to sweat, smile, and see results with Larry as your instructor!
                        </p>
                        <div class="payment mt-4">
                            <a href="Payment.php" class="btn btn-success">Sign Up</a>
                        </div>
                        <h4 class="mt-4">- From RM55.00</h4>
                        <h4>- Instructor Consultation</h4>
                        <h4>- Beginner - Advanced Movement</h4>
                    </div>
                </div>
            </div>
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

