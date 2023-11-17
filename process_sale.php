<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $carModel = $_POST['carModel'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $totalPrice = $_POST['totalPrice'];

    // Create or open the text file
    $file = fopen("sales_record.txt", "a");

    // Append the sale information to the file
    fwrite($file, "Car Model: $carModel, Quantity: $quantity, Price per Car: $price, Total Price: $totalPrice\n");

    // Close the file
    fclose($file);

    // Redirect back to the sale form
    header("Location: sale_form.php");
    exit();
} else {
    // If accessed directly, redirect to the login page
    header("Location: login.php");
    exit();
}
?>

