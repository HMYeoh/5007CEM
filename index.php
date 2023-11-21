<?php
    include("connection.php");
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
              <img src="img/Gym Hero.png" width="220" height="220" alt>&nbsp; Gym Hero
          </h1>
          <br>
          <h1 >Login</h1>
          <br>
        
          <div id="form">
              <form name="form" action="login.php" onsubmit="return isvalid()" method="POST">
                <div class="input-container">
                    <label for="username" class="label">Username:</label><br>
                    <input type="text" id="user" name="user"><br>
                </div>
                <div class="input-container">
                    <label for="password" class="label">Password:</label><br>
                    <input type="password" id="pass" name="pass"><br><br>
                </div>
                <br>
                <div class="button-container"> 
                    <input type="submit" id="btn" value="Login" name="submit"/>
                    <button type="submit" class="register-button">Register</button>
                </div>
              </form>
          </div>
                
        </div>
        
        <script>
            function isvalid(){
                var user = document.form.user.value;
                var pass = document.form.pass.value;
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

