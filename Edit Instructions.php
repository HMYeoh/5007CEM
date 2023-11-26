<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "workoutdb";

//Create connection
$connection = new mysqli($servername, $username, $password, $database, 3306);

$id = "";
$name = "";
$description = "";
$sets = "";
$minutes = "";

$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
    // GET method: Show the data of the movement

    if ( !isset($_GET["id"]) ) {
        header("location: Instructor View.php");
        exit;
    }

    $id = $_GET["id"];

    // Read the row of the selected movement from database table
    $sql = "SELECT * FROM instruction WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: Instructor View.php");
        exit;
    }

    $name = $row["workout_name"];
    $description = $row["workout_description"];
    $sets = $row["workout_sets"];
    $minutes = $row["workout_minutes"];
}
else {
    // POST method: Update the data of the movement

    $id = $_POST["id"];
    $name = $_POST["workout_name"];
    $description = $_POST["workout_description"];
    $sets = $_POST["workout_sets"];
    $minutes = $_POST["workout_minutes"];

    do {
        if ( empty($id) || empty($name) || empty($description) || empty($sets) || empty($minutes) ) {
            $errorMessage = "All the fields are required";
            break;
        }

        $sql = "UPDATE instruction " .
               "SET workout_name = '$name', workout_description = '$description', workout_sets = '$sets', workout_minutes = '$minutes' " . 
               "WHERE id = $id";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $successMessage = "Movement updated correctly";

        header("location: Instructor View.php");
        exit;

    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Hero - Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>New Movement</h2>

        <?php
        if ( !empty($errorMessage) ){
            echo "
            <div class='alert aleart-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Workout Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="workout_name" value="<?php echo $name; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Workout Description</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="workout_description" value="<?php echo $description; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Workout Sets</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="workout_sets" value="<?php echo $sets; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Workout Minutes</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="workout_minutes" value="<?php echo $minutes; ?>">
                    </div>
                </div>

                <?php
                if ( !empty($successMessage) ) {
                    echo "
                    <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert aleart-success alert-dismissible fade show' role='alert'>
                                <strong>$successMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>
                    </div>
                    ";
                }
                ?>

                <div class="row mb-3">
                    <div class="offset-sm-3 col-sm-3 d-grid">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <div class="col-sm-3 d-grid">
                        <a class="btn btn-outline-primary" href="Instructor View.php" role="button">Cancel</a>
                    </div>
                </div>
        </form>
    </div>
</body>
</html>