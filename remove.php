<?php
session_start();
include('dbcalls/connect.php'); // Adjust the path if necessary

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['house_id']) && !empty($_POST['house_id'])) {
        $house_id = $_POST['house_id'];
        $user_id = $_SESSION['user_id']; // Assuming user_id is stored in session

        try {
            // Delete the house from the cart for the logged-in user
            $stmt = $conn->prepare("DELETE FROM cart WHERE house_id = :house_id AND user_id = :user_id");
            $stmt->bindParam(':house_id', $house_id);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();

            // Redirect back to the cart page or any other appropriate page
            header("Location: /lelo/Lelo/cart.php");
            exit();
        } catch (PDOException $e) {
            echo "Error deleting house from cart: " . $e->getMessage();
        }
    } else {
        echo "Invalid request. House ID not provided.";
    }
} else {
    echo "Invalid request method.";
}
