<?php
include('connect.php'); // Include your database connection script

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    // Retrieve user ID from session
//    if (isset($_SESSION['user_id'])) {
//        $user_id = $_SESSION['user_id'];
//    } else {
//        // Handle the case where user ID is not set in session
//        // Redirect to login page or display an error message
//        exit("User not logged in"); // Example error handling, modify as needed
//    }

    // Retrieve form data
    $subject = $_POST['subject'];
    $travel = $_POST['travel'];
    $complaint = $_POST['complaint'];
    $other = $_POST['other'];

    try {
        // Prepare SQL query
        $stmt = $conn->prepare("INSERT INTO complaints (user_id, subject, travel, complaint, other) VALUES (:user_id, :subject, :travel, :complaint, :other)");

        // Bind parameters and execute query
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':travel', $travel);
        $stmt->bindParam(':complaint', $complaint);
        $stmt->bindParam(':other', $other);
        $stmt->execute();

        // Return success message
        echo "Klacht verstuurd";

        // No need to exit here
    } catch (PDOException $e) {
        // Handle database errors
        echo "Error: " . $e->getMessage();
    }
}

