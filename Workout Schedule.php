<?php
// Start the PHP session if needed
// session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/Workout Schedule.css">
    <title>Gym Hero Workout Schedule</title>
</head>
<body>
    <div class="topnav">
        <a href="Homepage.php">Homepage</a>
        <a class="active" href="WorkoutSchedule.php">Workout Schedule</a>
        <a href="Movements.php">Movements</a>
        <a href="Instructors.php">Instructors</a>
        <div class="logout-container">
            <button type="submit">Logout</button>
        </div><!-- End of logout-container -->
    </div><!-- End of top-navigation -->
    
    <div class="center-container">
        <h1>
            <a href="Homepage.php" >
                <img src="img/Gym Hero.png" width="150" height="150" alt="Gym Hero Logo">
            </a>&nbsp; Workout Schedule
        </h1>
    </div>
    
    <div class="center-content">
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
            <p>
                <img src="img/Gym Hero.png" alt class="footer-logo-img">
            </p>
            <p>&copy; 2023 Gym Hero. All rights reserved.</p>
            <p>Contact us: GymHero@gmail.com</p>
        </div>
    </div>
</body>

