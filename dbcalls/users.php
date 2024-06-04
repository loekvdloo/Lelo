<?php
include('connect.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['create_user'])) {
        $is_admin = isset($_POST['is_admin']) ? 1 : 0;
        $user_name = $_POST['user_name'];
        $user_lastname = $_POST['user_lastname'];
        $user_pass = ($_POST['user_pass']);
        $user_email = $_POST['user_email'];
        
        $sql = "INSERT INTO users (is_admin, user_name, user_lastname, user_pass, user_email) 
                VALUES (:is_admin, :user_name, :user_lastname, :user_pass, :user_email)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':is_admin' => $is_admin,
            ':user_name' => $user_name,
            ':user_lastname' => $user_lastname,
            ':user_pass' => $user_pass,
            ':user_email' => $user_email
        ]);
    } elseif (isset($_POST['update_user'])) {
        $user_id = $_POST['user_id'];
        $is_admin = isset($_POST['is_admin']) ? 1 : 0;
        $user_name = $_POST['user_name'];
        $user_lastname = $_POST['user_lastname'];
        $user_pass =($_POST['user_pass']);
        $user_email = $_POST['user_email'];
        
        $sql = "UPDATE users SET 
                is_admin = :is_admin, 
                user_name = :user_name, 
                user_lastname = :user_lastname, 
                user_pass = :user_pass, 
                user_email = :user_email 
                WHERE user_id = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':is_admin' => $is_admin,
            ':user_name' => $user_name,
            ':user_lastname' => $user_lastname,
            ':user_pass' => $user_pass,
            ':user_email' => $user_email,
            ':user_id' => $user_id
        ]);
    } elseif (isset($_POST['delete_user'])) {
        $user_id = $_POST['user_id'];
        
        $sql = "DELETE FROM users WHERE user_id = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':user_id' => $user_id]);
    }
}

$stmt = $pdo->query("SELECT * FROM users");
$allUsers = $stmt->fetchAll();