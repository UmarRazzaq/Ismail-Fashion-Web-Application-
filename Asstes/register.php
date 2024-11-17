<?php

include "includes/conn.php";

    if (isset($_POST['signup'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmation = $_POST['confirmation'];

        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['email'] = $email;

        if ($password != $confirmation){
            $_SESSION['error'] = "Password did not match";
            header('location: signup.php');
        }else{
            $conn = $pdo->open();

            $query = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
            $query->execute(['email'=>$email]);
            $row = $query->fetch();
            if ($row['numrows']>0){
                $_SESSION['error'] = "Email is already taken";
                header('location: signup.php');
            }else{
                $now = date('Y-m-d');
                $password = password_hash($password, PASSWORD_DEFAULT);

//            $set ='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//            $code =substr(str_shuffle($set), 0, 12);

                try {
                    $query = $conn->prepare("INSERT INTO users(email, password, firstname, lastname, created_on) VALUES (:email, :password, :firstname, :lastname, :now)");
                    $query->execute(['email'=>$email, 'password'=>$password, 'firstname'=>$firstname, 'lastname'=>$lastname, 'now'=>$now]);
                    $userid = $conn->lastInsertId();

                }catch (PDOException $e){
                    $_SESSION['error'] = $e->getMessage();
                    header('location: register.php');
                }

                $pdo->close();

            }

        }

    }else{
        $_SESSION['error'] = 'Fill up sign up form first';
        header('location: signup.php');
    }

    header('location: login.php');

?>