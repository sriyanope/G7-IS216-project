<?php

    session_start();
    spl_autoload_register(
        function ($class){
            require_once  "$class.php";
        }
    );
    
    $username = $_SESSION['username'];
    $tempDestination = substr($destination, 3);
    $sql = "update users set profilePhoto = :tempDestination where username = :username;";

    $connMgr = new ConnectionManager();
    $pdo = $connMgr->getConnection();
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':tempDestination', $tempDestination, PDO::PARAM_STR);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $status = $stmt->execute();
    
    $stmt = null;
    $pdo = null;

?>