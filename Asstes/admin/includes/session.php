<?php

    session_start();
    include '../includes/conn.php';

    if (!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
        header('location: ../index.php');
        exit();
    }

    $conn = $pdo->open();

    $query = $conn->prepare("SELECT * FROM users WHERE id=:id");
    $query->execute(['id'=>$_SESSION['admin']]);
    $admin = $query->fetch();

    $pdo->close();

?>