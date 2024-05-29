<?php
include('dbcalls/connect.php');

$table = isset($_GET['table']) ? $_GET['table'] : 'house';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($table == 'house') {

        if (isset($_POST['create'])) {
            $name = $_POST['name'];
            $house_image = $_FILES['house_image']['name'];
            $rooms = $_POST['rooms'];
            $pool = isset($_POST['pool']) ? 1 : 0;
            $backyard = isset($_POST['backyard']) ? 1 : 0;
            $airco = isset($_POST['airco']) ? 1 : 0;
            $sauna = isset($_POST['sauna']) ? 1 : 0;


            $target_dir = "assets/img/";
            $target_file = $target_dir . basename($_FILES["house_image"]["name"]);
            move_uploaded_file($_FILES["house_image"]["tmp_name"], $target_file);
            $house_image = $target_file;

            
            $stmt = $conn->prepare("INSERT INTO house (name, house_image, rooms, pool, backyard, airco, sauna) VALUES (:name, :house_image, :rooms, :pool, :backyard, :airco, :sauna)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':house_image', $house_image);
            $stmt->bindParam(':rooms', $rooms);
            $stmt->bindParam(':pool', $pool);
            $stmt->bindParam(':backyard', $backyard);
            $stmt->bindParam(':airco', $airco);
            $stmt->bindParam(':sauna', $sauna);
            $stmt->execute();
        } elseif (isset($_POST['update'])) {
            $house_id = $_POST['house_id'];
            $name = $_POST['name'];
            $rooms = $_POST['rooms'];
            $pool = isset($_POST['pool']) ? 1 : 0;
            $backyard = isset($_POST['backyard']) ? 1 : 0;
            $airco = isset($_POST['airco']) ? 1 : 0;
            $sauna = isset($_POST['sauna']) ? 1 : 0;

            $stmt = $conn->prepare("UPDATE house SET name = :name, rooms = :rooms, pool = :pool, backyard = :backyard, airco = :airco, sauna = :sauna WHERE house_id = :house_id");
            $stmt->bindParam(':house_id', $house_id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':rooms', $rooms);
            $stmt->bindParam(':pool', $pool);
            $stmt->bindParam(':backyard', $backyard);
            $stmt->bindParam(':airco', $airco);
            $stmt->bindParam(':sauna', $sauna);
            $stmt->execute();
        }
    }
}

if ($table == 'house') {
    $stmt = $conn->prepare("SELECT * FROM house");
} else {
    $stmt = $conn->prepare("SELECT * FROM locations");
}
$stmt->execute();
$records = $stmt->fetchAll();

