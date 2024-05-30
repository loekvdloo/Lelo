<?php
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    session_start();
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $stmt = $conn->prepare("SELECT user_id, user_name, user_pass, user_email, is_admin FROM users WHERE user_email = :email AND user_name = :firstname AND user_pass = :password");

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':password', $password);

        $stmt->execute();
        $data = $stmt->fetch();

        if ($data) {
            $_SESSION['logged_in'] = true;
            $_SESSION['firstname'] = $data['user_name'];
            $_SESSION['email'] = $data['user_email'];

            if ($data['is_admin'] == 1) {
                $_SESSION['is_admin'] = 'admin';
                header("Location: ../admin.php");
            } else {
                header("Location: ../index.php");
            }
            exit();
        } else {
            echo "Ongeldige email, gebruikersnaam of wachtwoord.";
        }
    } catch (PDOException $e) {
        echo "Fout bij het inloggen: " . $e->getMessage();
    }
}
