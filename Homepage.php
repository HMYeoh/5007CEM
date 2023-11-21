<?php
// Start the PHP session if needed
// session_start();
?>

<head>
    <title>Gym Hero Homepage</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/Homepage.css">
</head>
<body>

<!-- <div class="content-container"> -->
    <div class="topnav">
        <a class="active" href="Homepage.php">Homepage</a>
        <a href="Workout Schedule.php">Workout Schedule</a>
        <a href="Movements.php">Movements</a>
        <a href="Instructors.php">Instructors</a>
        <div class="logout-container">
            <button type="submit">Logout</button>
        </div><!-- End of logout-container -->
    </div><!-- End of top-navigation -->
<!-- </div> End of content-container -->

    <div class="center-container">
        <h1>
            <a href="Homepage.php" >
                <img src="img/Gym Hero.png" width="220" height="220" alt>
            </a>&nbsp; Welcome to Gym Hero
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
            <p>
                <img src="img/Gym Hero.png" alt class="footer-logo-img">
            </p>
            <p>&copy; 2023 Gym Hero. All rights reserved.</p>
            <p>Contact us: GymHero@gmail.com</p>
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
