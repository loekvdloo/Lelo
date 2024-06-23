<?php
session_start();
include('../dbcalls/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['status' => 'error', 'message' => 'User not logged in.']);
        exit;
    }
    
    $user_id = $_SESSION['user_id'];
    $house_id = $_POST['house_id']; // retrieve house_id from post
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

        $conn->beginTransaction();


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


        $stmt = $conn->prepare("SELECT * FROM cart WHERE user_id = :user_id AND house_id = :house_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':house_id', $house_id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = :user_id AND house_id = :house_id");
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':house_id', $house_id);
            if ($stmt->execute()) {
                $conn->commit();
                echo json_encode(['status' => 'success', 'message' => 'Successfully booked and removed from cart.']);
            } else {
                $conn->rollBack();
                echo json_encode(['status' => 'error', 'message' => 'Failed to remove from cart.']);
            }
        } else {
            $conn->rollBack();
            echo json_encode(['status' => 'error', 'message' => 'House not found in cart.']);
        }
    } catch (PDOException $e) {
        // Rollback transaction on error
        $conn->rollBack();
        echo json_encode(['status' => 'error', 'message' => 'Error booking the house: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}