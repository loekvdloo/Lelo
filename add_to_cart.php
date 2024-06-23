<?php
include('dbcalls/connect.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $house_id = $_POST['house_id'];

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        header("Location: login.php");
        exit();
    }

    $sql = "INSERT INTO cart (user_id, house_id) VALUES (:user_id, :house_id)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':house_id', $house_id);


    if ($stmt->execute()) {
        header("Location: voorgesteldereizen.php");
    } else {
        echo "Error adding to cart: " . $stmt->errorInfo()[2];
    }
}