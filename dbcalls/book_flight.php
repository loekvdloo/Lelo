<?php
session_start();
include('../dbcalls/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure user is logged in
    if (!isset($_SESSION['user_id'])) {
        echo "User not logged in.";
        exit;
    }
    
    $user_id = $_SESSION['user_id'];
    $house_id = $_POST['house_id']; // Retrieve house_id from POST data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $departure_date = $_POST['departure_date'];
    $return_date = $_POST['return_date'];
    $auto = isset($_POST['auto']) ? 1 : 0;
    $plane = isset($_POST['plane']) ? 1 : 0;
    $persons = $_POST['persons'];

    try {
        // Begin transaction
        $conn->beginTransaction();

        // Insert booking data into booked_flights
        $stmt = $conn->prepare("
            INSERT INTO booked_flights (user_id, house_id, fname, lname, email, phone, departure_date, return_date, auto, plane, persons)
            VALUES (:user_id, :house_id, :fname, :lname, :email, :phone, :departure_date, :return_date, :auto, :plane, :persons)
        ");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':house_id', $house_id); // Bind house_id
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':departure_date', $departure_date);
        $stmt->bindParam(':return_date', $return_date);
        $stmt->bindParam(':auto', $auto);
        $stmt->bindParam(':plane', $plane);
        $stmt->bindParam(':persons', $persons);
        $stmt->execute();

        // Check if the house is in the cart and delete it if it is
        $stmt = $conn->prepare("SELECT * FROM cart WHERE user_id = :user_id AND house_id = :house_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':house_id', $house_id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = :user_id AND house_id = :house_id");
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':house_id', $house_id);
            if ($stmt->execute()) {
                echo "Successfully removed from cart.";
            } else {
                echo "Failed to remove from cart.";
            }
        } else {
            echo "House not found in cart.";
        }

        // Commit transaction
        $conn->commit();

        // Redirect to a success page
        header('Location: ../booked_travels.php');
        exit();
    } catch (PDOException $e) {
        // Rollback transaction on error
        $conn->rollBack();
        echo "Error booking the house: " . $e->getMessage();
    }
} else {
    echo "Invalid request method.";
}

