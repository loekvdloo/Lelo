<?php
include('connect.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    try {
        $stmt = $conn->prepare("SELECT user_id FROM users WHERE user_email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user) {
            $stmt = $conn->prepare("UPDATE users SET is_admin = 1 WHERE user_email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            echo "User assigned as admin successfully.";
        } else {
            echo "Error: User not found.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
