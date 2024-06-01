<?php
include('connect.php');


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $stmt = $conn->prepare("SELECT user_id, user_name, user_pass, user_email, is_admin FROM users WHERE user_email = :email AND user_pass = :password");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $data = $stmt->fetch();

        if ($data) {
            $_SESSION['user_id'] = $data['user_id']; // Set user_id in session
            $_SESSION['firstname'] = $data['user_name'];
            $_SESSION['email'] = $data['user_email'];

            if ($data['is_admin'] == 1) {
                $_SESSION['is_admin'] = true;
                header("Location: ../admin.php");
            } else {
                header("Location: ../index.php");
            }
            exit();
        } else {
            echo "Invalid email or password.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
