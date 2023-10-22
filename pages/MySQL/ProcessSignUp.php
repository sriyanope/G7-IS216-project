<?php

    require_once "CreateUser.php";

    # Start session
    session_start();

    # Get parameters passed from register.php
    $username = $_POST["username1"];
    $fullName = $_POST["name1"];
    $gender = $_POST["gender1"];
    $age = $_POST["age1"];
    $email = $_POST["email1"];
    $password = $_POST["password1"];
    

    # Hash entered password
    $hashed = password_hash($password, PASSWORD_DEFAULT);

    $status = registerUser($username, $fullName, $gender, $age, $email, $hashed);
    if($status){

        $_SESSION["user"] = $username;
        header("location: ../LandingPage.html");
        exit;
    }
    else{
        $_SESSION['error'] = "Username has been taken, please input another username";
        header("location: ../SignUp.php");
    }
?>