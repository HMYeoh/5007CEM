<?php
require 'confiq.php';
if(!empty($_SESSION["id"])){
    header("Location: Homepage.php");
}
if(isset($_POST["submit"])){
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: Homepage.php");
        }
        else{
            echo
            "<script> alert('Wrong Password'); </script>";
        }
    }
    else{
        echo
        "<script> alert('User not registered'); </script>";
    }
}
?>

    <head>
        <title>Gym Hero Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/index.css">
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
          <h1 >Login</h1>
          <br>
        
          <div id="form">
              <form name="form" action="" method="POST" autocomplete="off" onsubmit="return isvalid();">
                <div class="input-container">
                    <label for="usernameemail" class="label">Username or Email:</label><br>
                    <input type="text" id="usernameemail" name="usernameemail" required><br>
                </div>
                <div class="input-container">
                    <label for="password" class="label">Password:</label><br>
                    <input type="password" id="password" name="password" required><br><br>
                </div>
                <br>
                <p>If you have not register. <a href="Register.php">Register Now</a></p>
                <button type="submit" name="submit" onclick="isvalid();" class="login-button">Login</button> 
                <!-- <div class="button-container"> 
                    <input type="submit" id="btn" value="Login" name="submit"/>
                </div> -->
                
              </form>
          </div>
                
        </div>
        
        <script>
            function isvalid(){
                var user = document.form.usernameemail.value;
                var pass = document.form.password.value;
                if(user.length=="" && pass.length==""){
                    alert("Username and password field is empty");
                    return false
                }
                else{
                    if(user.length==""){
                    alert("Username is empty");
                    return false
                    }
                    if(pass.length==""){
                    alert("Password is empty");
                    return false
                    }
                }
            }
        </script>
        
    </body>

