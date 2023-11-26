<?php
    include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="css/Admin Login.css"/>
</head>
<body>
    <div id="form" class="login-container">
        <h2>Login</h2>
        <form name="form" action="login.php" onsubmit="return isvalid()" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="user" name="user" >
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="pass" name="pass" >
            </div>
            <!-- <button type="submit" class="login-btn">Login</button> -->
            <input type="submit" id="btn" value="Login" name="submit" class="login-btn"/>
        </form>
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
                if(user.length=="" ){
                alert("Username is empty");
                return false
                }
                if(pass.length=="" ){
                alert("Password is empty");
                return false
                }
            }
        }
    </script>
</body>
</html>
