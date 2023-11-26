<?php
// Logout logic
if (isset($_POST['logout'])) {
    // Destroy the session and redirect to the login page
    session_destroy();
    header("Location: Instructor Login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Hero - Instructor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="InstructorHomepage.php">Gym Hero - Instructor</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="InstructorHomepage.php">Homepage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Instructor Members.php">Members</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Instructor Movements.php">Movements</a>
                </li>
                <li class="nav-item">
                    <form method="post" class="d-flex">
                        <button class="btn btn-danger" type="submit" name="logout">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container my-5">
    <h2>Welcome Back</h2>
    <img src="img/Gym Hero.png" width="220" height="220" alt>
    <!-- Add any additional content for the Instructor Homepage here -->
</div>

<!-- Bootstrap JS, Popper.js, and jQuery (for Bootstrap features) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
