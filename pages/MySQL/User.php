<?php

    session_start();
    spl_autoload_register(
        function($class){
            require_once "$class.php";
        }
    );

    $type = $_GET['type'];
    $username = $_GET['username'];


    if($type == "getUser"){
        getUser($username);
    }else if($type == "updateUser"){
        $fullName = $_GET['fullName'];
        $email = $_GET['email'];
        $dob = $_GET['dob'];
        $bio = $_GET['bio'];
        $instagram = $_GET['instagram'];
        $telegram = $_GET['telegram'];
        updateUser($username, $fullName, $email, $dob, $bio, $instagram, $telegram);
    }

    function getUser($username) {
        $sql = "select * from users where username = :username;"; 

        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $result = Array();
        $result['user'] = [];
        
        while($row = $stmt->fetch()) {
            $result['user'][] = array('username' => $row["username"], 'fullName' => $row["fullName"], 'gender' => $row["gender"], 'dob' => $row["dob"], 'email' => $row["email"], 'bio' => $row["bio"], 'pastEventsHosted' => $row["pastEventsHosted"], 'pastEventsAttended' => $row["pastEventsAttended"], 'instagram' => $row["instagram"], 'telegram' => $row["telegram"]);
        }
        
        $stmt = null;
        $pdo = null;
        echo json_encode($result);

    }


    function updateUser($username, $fullName, $email, $dob, $bio, $instagram, $telegram) {
        $sql = "update users set fullName = :fullName, email = :email, dob = :dob, bio = :bio, instagram = :instagram, telegram = :telegram  where username = :username;"; 

        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':fullName', $fullName, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':dob', $dob, PDO::PARAM_STR);
        $stmt->bindParam(':bio', $bio, PDO::PARAM_STR);
        $stmt->bindParam(':instagram', $instagram, PDO::PARAM_STR);
        $stmt->bindParam(':telegram', $telegram, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        
        $stmt = null;
        $pdo = null;

    }

?>