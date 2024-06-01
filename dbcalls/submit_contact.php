<?php
include('connect.php'); // Include your database connection script

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    try {
        // Prepare SQL query
        $stmt = $conn->prepare("INSERT INTO contact (firstname, lastname, number, email, message) VALUES (:firstname, :lastname, :number, :email, :message)");

        // Bind parameters and execute query
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':number', $number);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        $stmt->execute();

        // Redirect to a success page or display success message
        echo "Message submitted successfully.";

        // No need to exit here
    } catch (PDOException $e) {
        // Handle database errors
        echo "Error: " . $e->getMessage();
    }
}

