<?php
include('connect.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $persons = $_POST['persons'];
    $departure_date = $_POST['departure_date'];
    $return_date = $_POST['return_date'];
    $auto = isset($_POST['auto']) ? 1 : 0;
    $plane = isset($_POST['plane']) ? 1 : 0;
    $house_id = $_POST['house_id']; // Retrieve house_id from the form

    // Check if the email belongs to an existing user
    $stmt = $conn->prepare("SELECT user_id FROM users WHERE user_email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    var_dump($house_id);
    if ($user) {
        // If the user exists, get the user ID
        $user_id = $user['user_id'];
    } else {
        // If the user does not exist, set user_id to NULL
        $user_id = NULL;
    }

    // Prepare SQL statement to insert data into booked_flights table
    $sql = "INSERT INTO booked_flights (user_id, house_id, fname, lname, email, phone, persons, departure_date, return_date, auto, plane) 
            VALUES (:user_id, :house_id, :fname, :lname, :email, :phone, :persons, :departure_date, :return_date, :auto, :plane)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':house_id', $house_id);
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':persons',$persons);
    $stmt->bindParam(':departure_date', $departure_date);
    $stmt->bindParam(':return_date', $return_date);
    $stmt->bindParam(':auto', $auto);
    $stmt->bindParam(':plane', $plane);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: ../index.php");
    } else {
        echo "Error booking flight: " . $stmt->errorInfo()[2];
    }
}
