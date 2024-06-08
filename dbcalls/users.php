<?php
include('connect.php');

if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{


        if(isset($_POST['create_user']))
        {
            $is_admin = isset($_POST['is_admin']) ? 1 : 0;
            $user_name = isset($_POST['user_name']);
            $user_lastname = isset($_POST['user_lastname']);
            $user_pass = isset($_POST['user_pass']);
            $user_email = isset($_POST['user_email']);

            $stmt = $conn->prepare("INSERT INTO users( is_admin, user_name, user_lastname, user_pass, user_email )
                                    VALUES ( :is_admin, :user_name :user_lastname, :user_pass, :user_email )");

            $stmt->bindparam(':is_admin', $is_admin );
            $stmt->bindparam(':user_name', $user_name );
            $stmt->bindparam(':user_lastname', $user_lastname);
            $stmt->bindparam(':user_pass', $user_pass);
            $stmt->bindparam(':user_email', $user_email);
            $stmt->execute();
        }
        elseif(isset($_POST['update']))
        {
            $is_admin = isset($_POST['is_admin']) ? 1 : 0;
            $user_name = isset($_POST['user_name']);
            $user_lastname = isset($_POST['user_lastname']);
            $user_pass = isset($_POST['user_pass']);
            $user_email = isset($_POST['user_email']);

            $stmt = $conn->prepare("UPDATE users
                                    SET is_admin = :is_admin, user_name = :user_name, user_lastname = :user_lastname, user_pass = :user_pass, user_email = :user_email");

            $stmt->bindparam(':is_admin', $is_admin );
            $stmt->bindparam(':user_name', $user_name );
            $stmt->bindparam(':user_lastname', $user_lastname);
            $stmt->bindparam(':user_pass', $user_pass);
            $stmt->bindparam(':user_email', $user_email);
            $stmt->execute();
        }
    
}


$stmt = $conn->prepare("SELECT * FROM users");
$stmt->execute();
$users = $stmt->fetchAll();