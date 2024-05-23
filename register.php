<?php
include('dbcalls/connect.php');

if (isset($_POST['register'])) {
    // Gebruikersnaam, emailadres en wachtwoord van het formulier ophalen
    $firstname = $_POST['username'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        // Controleer eerst of de gebruikersnaam en email al bestaat
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $usernameExists = $stmt->fetch();

        $stmt = $conn->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $emailExists = $stmt->fetch();


        // Als de gebruikersnaam of het e-mailadres al in gebruik is, geef dan een foutmelding weer
        if ($usernameExists) {
            echo "Gebruikersnaam is al in gebruik.";
            //header
        } elseif ($emailExists) {
            echo "E-mailadres is al in gebruik.";
            //header
        } else {
            // Voer de registratie uit als zowel de gebruikersnaam als het e-mailadres uniek zijn
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);

            $test = $stmt->execute();
            echo "Registratie succesvol!";
            var_dump($test);
            if ($test) {
                //header
            }
        }
    } catch (PDOException $e) {
        echo "Registratie mislukt: " . $e->getMessage();
        //header
    }
}



