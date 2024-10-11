<?php
session_start();
require 'Database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conn=Database::getInstance();
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->getConnection()->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user&&password_verify($password, $user['password'])) {
        session_regenerate_id(true);
        $_SESSION['user_id'] = $user['user_id'];

        header('Location: index.php');
    } else {
        echo 'Invalid login';
    }
}