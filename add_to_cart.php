<?php
include('dbcalls/connect.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve house_id from POST data
    $house_id = $_POST['house_id'];

    // Retrieve user_id from session
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        // Redirect to login page or handle the error
        header("Location: login.php");
        exit();
    }

    // Prepare the SQL statement to insert into cart
    $sql = "INSERT INTO cart (user_id, house_id) VALUES (:user_id, :house_id)";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':house_id', $house_id);

    // Execute the insert statement
    if ($stmt->execute()) {
        header("Location: voorgesteldereizen.php"); // Redirect to the cart page
    } else {
        echo "Error adding to cart: " . $stmt->errorInfo()[2];
    }
}