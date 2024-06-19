<?php
session_start();
include('dbcalls/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure user is logged in
    if (!isset($_SESSION['user_id'])) {
        echo "User not logged in.";
        exit;
    }
    
    $user_id = $_SESSION['user_id'];

    try {
        // Fetch all items from the cart for this user
        $stmt = $conn->prepare("
        SELECT 
            h.*, 
            c.house_id
        FROM 
            house h
        INNER JOIN 
            cart c ON h.house_id = c.house_id
        WHERE 
            c.user_id = :user_id
        ");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $houses = $stmt->fetchAll();

        if (empty($houses)) {
            echo "No houses in cart to book.";
            exit;
        }

        // Book each item one by one
        foreach ($houses as $house) {
            $house_id = $house['house_id'];
            $fname = 'John';  // Replace with actual user data or collect via a form
            $lname = 'Doe';   // Replace with actual user data or collect via a form
            $email = 'johndoe@example.com';  // Replace with actual user data or collect via a form
            $phone = '1234567890';   // Replace with actual user data or collect via a form
            $departure_date = '2024-06-20';  // Replace with actual user data or collect via a form
            $return_date = '2024-06-30';  // Replace with actual user data or collect via a form
            $auto = 1;  // Replace with actual user data or collect via a form
            $plane = 1;  // Replace with actual user data or collect via a form
            $persons = 2;  // Replace with actual user data or collect via a form

            // Begin transaction
            $conn->beginTransaction();

            // Insert booking data into booked_flights
            $stmt = $conn->prepare("
                INSERT INTO booked_flights (user_id, house_id, fname, lname, email, phone, departure_date, return_date, auto, plane, persons)
                VALUES (:user_id, :house_id, :fname, :lname, :email, :phone, :departure_date, :return_date, :auto, :plane, :persons)
            ");
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':house_id', $house_id);
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

            // Remove the booked house from the cart
            $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = :user_id AND house_id = :house_id");
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':house_id', $house_id);
            $stmt->execute();

            // Commit transaction
            $conn->commit();
        }

        // Redirect to a success page or show a success message
        header('Location: my_booked_flights.php');
        exit();
    } catch (PDOException $e) {
        // Rollback transaction on error
        $conn->rollBack();
        echo "Error booking the house: " . $e->getMessage();
    }
} else {
    echo "Invalid request method.";
}
