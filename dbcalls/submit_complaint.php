<?php
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
    }

    $subject = $_POST['subject'];
    $travel = $_POST['travel'];
    $complaint = $_POST['complaint'];
    $other = $_POST['other'];

    try {
        $stmt = $conn->prepare("INSERT INTO complaints (user_id, subject, travel, complaint, other) VALUES (:user_id, :subject, :travel, :complaint, :other)");

        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':travel', $travel);
        $stmt->bindParam(':complaint', $complaint);
        $stmt->bindParam(':other', $other);
        $stmt->execute();

        echo "Klacht verstuurd";

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

