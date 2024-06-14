<?php
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['create_user'])) {
        $is_admin = isset($_POST['is_admin']) ? 1 : 0;
        $user_name = $_POST['user_name'];
        $user_lastname = $_POST['user_lastname'];
        $user_pass = ($_POST['user_pass']);
        $user_email = $_POST['user_email'];

        $stmt = $conn->prepare("INSERT INTO users (is_admin, user_name, user_lastname, user_pass, user_email)
                                VALUES (:is_admin, :user_name, :user_lastname, :user_pass, :user_email)");
        $stmt->bindParam(':is_admin', $is_admin);
        $stmt->bindParam(':user_name', $user_name);
        $stmt->bindParam(':user_lastname', $user_lastname);
        $stmt->bindParam(':user_pass', $user_pass);
        $stmt->bindParam(':user_email', $user_email);
        $stmt->execute();
        header("Location: ../admin.php");
    } elseif (isset($_POST['edit_user'])) {
    } elseif (isset($_POST['update_user'])) {
        $user_id = $_POST['user_id'];
        $is_admin = isset($_POST['is_admin']) ? 1 : 0;
        $user_name = $_POST['user_name'];
        $user_lastname = $_POST['user_lastname'];
        $user_pass = ($_POST['user_pass']);
        $user_email = $_POST['user_email'];

        $stmt = $conn->prepare("UPDATE users
                                SET is_admin = :is_admin, user_name = :user_name, user_lastname = :user_lastname, user_pass = :user_pass, user_email = :user_email
                                WHERE user_id = :user_id");
        $stmt->bindParam(':is_admin', $is_admin);
        $stmt->bindParam(':user_name', $user_name);
        $stmt->bindParam(':user_lastname', $user_lastname);
        $stmt->bindParam(':user_pass', $user_pass);
        $stmt->bindParam(':user_email', $user_email);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        header("Location: ../admin.php");
    } elseif (isset($_POST['delete_user'])) {
        $user_id = $_POST['user_id'];

        $stmt = $conn->prepare("DELETE FROM users WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        header("Location: ../admin.php");
    }
}

$stmt = $conn->prepare("SELECT * FROM users");
$stmt->execute();
$users = $stmt->fetchAll();
