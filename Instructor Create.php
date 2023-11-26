<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "workoutdb";

//Create connection
$connection = new mysqli($servername, $username, $password, $database, 3306);

$name = "";
$description = "";

$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $name = $_POST["name"];
    $description = $_POST["description"];

    do {
        if ( empty($name) || empty($description) ) {
            $errorMessage = "All the fields are required";
            break;
        }

        // add new movement to database
        $sql = "INSERT INTO workout (name, description) " . 
               "VALUES ('$name', '$description')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $name = "";
        $description = "";

        $successMessage = "Movement added correctly";

        header("location: Instructor Movements.php");
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
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="description" value="<?php echo $description; ?>">
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
                        <a class="btn btn-outline-primary" href="Instructor Movements.php" role="button">Cancel</a>
                    </div>
                </div>
        </form>
    </div>
</body>
</html>