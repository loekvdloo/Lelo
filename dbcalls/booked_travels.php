<?php
include('dbcalls/connect.php');

$table = 'booked_flights';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($table == 'booked_flights') {
        if (isset($_POST['update'])) {

            $flight_id = $_POST['flight_id'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $departure_date = $_POST['departure_date'];
            $return_date = $_POST['return_date'];
            $auto = isset($_POST['auto']) ? 1 : 0;
            $plane = isset($_POST['plane']) ? 1 : 0;
            $persons = $_POST['persons'];

            $stmt = $conn->prepare("UPDATE booked_flights SET 
                fname = :fname, 
                lname = :lname, 
                email = :email, 
                phone = :phone, 
                departure_date = :departure_date, 
                return_date = :return_date, 
                auto = :auto, 
                plane = :plane, 
                persons = :persons 
                WHERE flight_id = :flight_id");
            $stmt->bindParam(':flight_id', $flight_id);
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

            echo "Record updated successfully";
        } elseif (isset($_POST['delete'])) {

            $flight_id = $_POST['flight_id'];

            $stmt = $conn->prepare("DELETE FROM booked_flights WHERE flight_id = :flight_id");
            $stmt->bindParam(':flight_id', $flight_id);
            $stmt->execute();

            echo "Record deleted successfully";
        }
    }
}

$stmt = $conn->prepare("SELECT * FROM booked_flights");
$stmt->execute();
$records = $stmt->fetchAll();