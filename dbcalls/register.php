<?php
include('connect.php');

if (isset($_POST['register'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $stmt = $conn->prepare("SELECT user_id FROM users WHERE user_name = :username");
        $stmt->bindParam(':username', $firstname);
        $stmt->execute();
        $usernameExists = $stmt->fetch();

        $stmt = $conn->prepare("SELECT user_id FROM users WHERE user_email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $emailExists = $stmt->fetch();


        if ($usernameExists) {
            echo "Gebruikersnaam is al in gebruik.";
        } elseif ($emailExists) {
            echo "E-mailadres is al in gebruik.";
        } else {
            $stmt = $conn->prepare("INSERT INTO users (user_name, user_lastname, user_email, user_pass) VALUES (:firstname, :lastname,  :email, :password)");
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);

            $test = $stmt->execute();
            echo "Registratie succesvol!";
            var_dump($test);
            if ($test) {
            }
        }
    } catch (PDOException $e) {
        echo "Registratie mislukt: " . $e->getMessage();
    }
}



