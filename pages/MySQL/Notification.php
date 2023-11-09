<?php

    session_start();
    spl_autoload_register(
        function($class){
            require_once "$class.php";
        }
    );

    $username = $_SESSION['username'];
    $type = $_GET['type'];

    if($type == "deletedEventNotification"){
        deletedEventNotification($username);
    }else if($type == "removeNotification"){
        removeNotification($username);
    }


    function deletedEventNotification($username) {
        $sql = "select * from deletedEvent where username = :username;";

        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $result = Array();
        $result['notification'] = [];
        
        while($row = $stmt->fetch()) {
            $result['notification'][] = array('eventId' => $row["eventID"], 'eventTitle' => $row["eventTitle"], 'reason' => $row["reason"]);
        }
        
        $stmt = null;
        $pdo = null;

        echo json_encode($result);

    }

    
    function removeNotification($username) {
        $sql = "delete from deletedEvent where username = :username;";

        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $stmt = null;
        $pdo = null;

    }



?>