<?php
    include("connection.php");
?>

    <head>
        <title>Register - Gym Hero</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/Register.css">
    </head>
    
    <body>
        <div class="video-container">
            <video autoplay muted loop id="background-video">
                <source src="vid/WorkoutBackground.mp4" type="video/mp4">
            </video>
        </div> 
        
        <div class="center-content">
          <h1 >
              <img src="img/Gym Hero.png" width="220" height="220" alt>&nbsp; Gym Hero
          </h1>
          <br>
          <h1 >Register</h1>
          <div id="form">
            <form name="registerForm" action="register.php" onsubmit="return validateRegistration()" method="POST">
                <div class="input-container">
                    <label for="username" class="label">Username:</label><br>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="input-container">
                    <label for="email" class="label">Email:</label><br>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="input-container">
                    <label for="password" class="label">Password:</label><br>
                    <input type="password" id="password" name="password" required>
                </div>

                <br>
                
                <div class="button-container">
                    <input type="submit" id="registerBtn" value="Register" name="registerSubmit">
                </div>
            </form>
        </div>
        <br>
        <p>Already have an account? <a href="index.php">Login here</a></p>
                
        </div>
        
        
        
    </body>

