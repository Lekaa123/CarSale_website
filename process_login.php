<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_sale";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}





if ($_POST['username'] && $_POST['password']) {
    $enteredUsername = $_POST['username'];
    $enteredPassword = $_POST['password'];

    // Fetch user credentials from the database
    $sql = "SELECT * FROM users WHERE username = '$enteredUsername'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        // Verify the entered password against the hashed password in the database
        if (password_verify($enteredPassword, $hashedPassword)) {
            // Redirect to the sale record form upon successful login
            header("Location: sale_form.php");
            exit();
        }
    }
}

// Invalid credentials, redirect back to login
header("Location: sale_form.php");
exit();

?>