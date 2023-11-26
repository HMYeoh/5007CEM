<?php
    include("connection.php");
    if(isset($_POST['submit'])){
        $ins_name = $_POST['ins_name'];
        $ins_password = $_POST['ins_pass'];

        $sql = "select * from instructor_login where ins_name = '$ins_name' and ins_password = '$ins_password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count==1){
            header("Location:InstructorHomepage.php");
        }
        else{
            echo '<script>
                window.location.href = "Instructor Login.php";
                alert("Login failed. Invalid username or password")
                </script>';
        }
    }
    
?>