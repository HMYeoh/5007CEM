<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "workoutdb");
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
}


if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $payment_method = $_POST["paymentOption"];
    $payment_amount = "RM55.00";

    $query = "INSERT INTO payment_history VALUES('', '$name', '$email', '$payment_method', '$payment_amount')";
    mysqli_query($conn, $query);
    echo
    "
    <script> alert('Payment Successfully'); </script>
    ";
    header("Location: Homepage.php"); // Redirect to Homepage.php
    exit();
}
?>

<head>
    <title>Gym Hero Instructors</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/Payment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <form class="payment" action="" method="post" id="paymentForm" autocomplete="off">
        <h1>Payment Details</h1>
        <p>Total Amount: RM55.00</p>
        <p>Name: <?php echo $row["name"]; ?></p>
        <p>Email: <?php echo $row["email"]; ?></p>
        <input type="hidden" name="name" value="<?php echo $row["name"]; ?>">
        <input type="hidden" name="email" value="<?php echo $row["email"]; ?>">
        <br>
        <a href="QRPayment.php" class="qr-payment-button">Pay With QR Payment</a>
        <br>
        <br>
        <br>

        <!-- Payment Options -->
        <label>
            <input type="radio" name="paymentOption" value="Credit Card" checked>
            Pay with Credit Card
        </label>

        <label>
            <input type="radio" name="paymentOption" value="Debit Card">
            Pay with Debit card
        </label>

        <div class="cvv-input">
            <label for="cardNumber">Card Number:</label>
            <input type="text" id="cardNumber" name="cardNumber" required>
        </div>

        <div class="cvv-input">
            <label for="expiryDate">Expiry Date:</label>
            <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YYYY" required>
        </div>

        <div class="cvv-input">
            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" required>
        </div>


        <!-- Add an id to the submit button -->
        <button type="submit" name="submit" id="submitButton">Submit Payment</button>
        <button type="button" id="cancelButton">Cancel</button>
    </form>

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
    cancelButton.addEventListener('click', function () {
        // Redirect to Instructors.php
        window.location.href = "Instructors.php";
    });

    document.addEventListener('DOMContentLoaded', function () {
        // Get reference to the submit button
        var submitButton = document.getElementById('submitButton');

        // Add an event listener to the submit button
        submitButton.addEventListener('click', function () {
            // Display an alert when the button is clicked
            alert('Payment Successfully');

            // Redirect to Homepage.php
            window.location.href = "Homepage.php";
        });
    });
</script>
