<?php
require 'confiq.php';
if(!empty($_SESSION["id"])){
    header("Location: Homepage.php");
}
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' OR email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
        echo
        "<script> alert('Username or Email has already taken'); </script>";
    }
    else{
        if($password == $confirmpassword){
            $query = "INSERT INTO user VALUES('','$name','$username','$email','$password')";
            mysqli_query($conn,$query);
            echo
            "<script> alert('Registration Successful'); </script>";
        }
        else{
            echo
            "<script> alert('Password does not match'); </script>";
        }
    }
}

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
              <img src="img/Gym Hero.png" width="220" height="220" alt>&nbsp; 
          </h1>
          <br>
          <h1 >Register</h1>
          <div id="form">
            <form name="registerForm" action="" method="POST" autocomplete="off">
                <div class="input-container">
                    <label for="name" class="label">Name:</label><br>
                    <input type="text" id="name" name="name" required>
                </div>
                
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
                
                <div class="input-container">
                    <label for="confirmpassword" class="label">Confirm Password:</label><br>
                    <input type="password" id="confirmpassword" name="confirmpassword" required>
                </div>

                <br>
                <p>Already have an account? <a href="index.php">Login Here</a></p>
                <button type="submit" name="submit" class="register-button">Register</button> 
            </form>
          </div>
          <br>
          
          
        </div>
        
        
        
    </body>

