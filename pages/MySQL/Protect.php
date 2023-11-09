<?php

    session_start();
    // No session variable "user" => no login
    if ( !isset($_SESSION["username"]) ) {
         // redirect to login page
        header("Location: LogIn.php"); 
        exit;
    }

?>