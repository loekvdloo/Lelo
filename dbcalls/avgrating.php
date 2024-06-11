<?php
include ("connect.php");

$stmt = $conn->prepare("SELECT h.house_id, AVG(r.rating) FROM house h join reviews r on h.house_id = r.review_id GROUP by h.house_id");
        $stmt->execute();
        $data = $stmt->fetchAll();

?>