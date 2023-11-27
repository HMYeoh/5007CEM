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

if (isset($_POST['logout'])) {
    // Destroy the session and redirect to the login page
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<head>
    <title>Gym Hero Homepage</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/Homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                <li class="nav-item active">
                    <a class="nav-link" href="Homepage.php">Homepage</a>
                </li>
                <li class="nav-item">
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

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1 class="mt-5">
                    <a href="Homepage.php" >
                        <img src="img/Gym Hero.png" width="220" height="220" alt="Gym Hero Logo">
                    </a>&nbsp; Welcome <?php echo $row["name"]; ?>
                </h1>
            </div>
        </div>
    </div>

    <br>
    

    <div class="slideshow-container">

        <div class="mySlides fade">
            <img src="img/FridayWorkout.jpg">
            <div class="overlay-text">
                <h1 class="display-4">Explore Our Workout</h1>
            </div>
        </div>

        <div class="mySlides fade">
            <img src="img/GymPicture2.jpg">
            <div class="overlay-text">
                <h1 class="display-4">Discover Our Modern Gym Facilities</h1>
            </div>
        </div>

        <div class="mySlides fade">
            <img src="img/GymPicture1.jpg">
            <div class="overlay-text">
                <h1 class="display-4">Join Us For A Healthier Lifestyle</h1>
            </div>
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
        setTimeout(showSlides, 3000); // Change image every 3 seconds
    }
</script>
