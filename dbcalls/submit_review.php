<?php
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $score = $_POST['score'];
    $message = $_POST['message'];
    $house_id = $_POST['house_id'];

    try {
        $stmt = $conn->prepare("SELECT user_id FROM users WHERE user_email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user) {
            $user_id = $user['user_id'];

            $stmt = $conn->prepare("INSERT INTO reviews (rating, message, user_id, house_id) VALUES (:score, :message, :user_id, :house_id)");
            $stmt->bindParam(':score', $score);
            $stmt->bindParam(':message', $message);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':house_id', $house_id);
            $stmt->execute();

            echo "Review submitted successfully!";
        } else {
            echo "Error: User not found. Please ensure you have entered the correct email.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}