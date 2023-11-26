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
    <title>Gym Hero Homepage</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/Homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
</head>
<body>

<!-- <div class="content-container"> -->
    <div class="topnav">
        <a class="active" href="Homepage.php">Homepage</a>
        <a href="Workout Schedule.php">Workout Schedule</a>
        <a href="Movements.php">Movements</a>
        <a href="Instructors.php">Instructor</a>
        <a href="Videos.php">Routine</a>
        <div class="logout-container">
            <a href="logout.php">Logout</a>
        </div><!-- End of logout-container -->
    </div><!-- End of top-navigation -->
<!-- </div> End of content-container -->

    <div class="center-container">
        <h1>
            <a href="Homepage.php" >
                <img src="img/Gym Hero.png" width="220" height="220" alt>
            </a>&nbsp; Welcome <?php echo $row["name"]; ?>
        </h1>
    </div>

    <div class="slideshow-container">

        <div class="mySlides fade">
            <img src="img/FridayWorkout.jpg" >
            <div class="text"><h1>Explore Our Workout</h1></div>
        </div>

        <div class="mySlides fade">
            <img src="img/GymPicture2.jpg" >
            <div class="text"><h1>Discover Our Modern Gym Facilities</h1></div>
        </div>

        <div class="mySlides fade">
            <img src="img/GymPicture1.jpg" >
            <div class="text"><h1>Join Us For A Healthier Lifestyle</h1></div>
        </div>

    </div>
    <br>

    <div style="text-align:center">
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
    </div>
    <br>
    <br>
    
    <div class="section">
        <div class="section-content">
            <div class="Trainer">
                <img src="img/Trainer1.jpg" >
            </div>
            <div class="message">
                <h1>"It's not too late to change your lifestyle." </h1>
                <p>- Adam</p>
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

<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}    
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 3000); // Change image every 2 seconds
    }
</script>
