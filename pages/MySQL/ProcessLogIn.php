<?php
require_once "GetUser.php";

# Start session
session_start();

# Get parameters passed from register.php
$username = $_POST["username1"];
$password = $_POST["password1"];

$hashedPassword = retrieveUser($username);

if ($hashedPassword !== null) {
    if (password_verify($password, $hashedPassword)) {
        $_SESSION['user'] = $username;
        header("location: ../LandingPage.html");
    } else {
        $_SESSION['error'] = "Wrong Username or Password, please try again.";
        header("location: ../LogIn.php");
    }
}
?>
