<?php
require 'confiq.php';
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    $username = $row['username'];
    $workoutResult = mysqli_query($conn, "SELECT * FROM instruction WHERE username = '$username'");
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/Workout Schedule.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Gym Hero Workout Schedule</title>
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
                <li class="nav-item active">
                    <a class="nav-link" href="Workout Schedule.php">Workout Schedule</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Movements.php">Movements</a>
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
    
    <div class="center-container">
        <h1>
            <a href="Homepage.php" >
                <img src="img/Gym Hero.png" width="150" height="150" alt="Gym Hero Logo">
            </a>&nbsp; Workout Schedule
        </h1>
    </div>

    <div class="fetched-workout">
        <h1>Workout Session</h1>
        <div class="fetched-data">
            <?php
            while ($workoutRow = mysqli_fetch_assoc($workoutResult)) {
                echo "
                <div class='workout-day'>
                    <div class='workout-details'>
                        <h2>{$workoutRow['workout_name']}</h2>
                        <ul>
                            <li>Description: {$workoutRow['workout_description']}</li><br>
                            <li>Sets: {$workoutRow['workout_sets']}</li><br>
                            <li>Minutes: {$workoutRow['workout_minutes']}</li>
                        </ul>
                    </div>
                </div>
                ";
            }
            ?>
        </div>
    </div>
    
    <div class="center-content">
        <h1>This Year Best Workout Schedule</h1>
        <div class="workout-day">
            <img src="img/MondayWorkout.jpg" alt="Monday Workout">
            <div class="workout-details">
                <h2>Monday</h2>
                <ul>
                    <li>Run 300M</li>
                    <li>30 Push Ups</li>
                    <li>30 Jumping Jacks</li>
                </ul>
            </div>
        </div>

        <div class="workout-day">
            <img src="img/TuesdayWorkout.jpg" alt="Tuesday Workout">
            <div class="workout-details">
                <h2>Tuesday</h2>
                <ul>
                    <li>Run 200M</li>
                    <li>30 Press Ups</li>
                    <li>4 reps of Renegade Row</li>
                </ul>
            </div>
        </div>
        
        <div class="workout-day">
            <img src="img/RestDay.jpeg" alt="Rest Day">
            <div class="workout-details">
                <h2>Wednesday</h2>
                <p>Rest Day</p>
            </div>
        </div>
        
        <div class="workout-day">
            <img src="img/ThursdayWorkout.jpg" alt="Thursday Workout">
            <div class="workout-details">
                <h2>Thursday</h2>
                <ul>
                    <li>20 Minutes of Rowing</li>
                    <li>30 Pull Ups</li>
                    <li>5 sets of Lunge</li>
                </ul>
            </div>
        </div>
        
        <div class="workout-day">
            <img src="img/FridayWorkout.jpg" alt="Friday Workout">
            <div class="workout-details">
                <h2>Friday</h2>
                <ul>
                    <li>15 Burpees</li>
                    <li>10 Minutes Jump Rope</li>
                    <li>30 Second Plank</li>
                </ul>
            </div>
        </div>
        
        <div class="workout-day">
            <img src="img/SaturdayWorkout.jpg" alt="Saturday Workout">
            <div class="workout-details">
                <h2>Saturday</h2>
                <ul>
                    <li>Run 300M</li>
                    <li>10 Sit Ups</li>
                    <li>30 Push Ups</li>
                </ul>
            </div>
        </div>
        
        <div class="workout-day">
            <img src="img/RestDay2.jpg" alt="Rest Day">
            <div class="workout-details">
                <h2>Sunday</h2>
                <p>"Sometimes making progress means taking rest days."</p>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

