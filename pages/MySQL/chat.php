<?php

    session_start();
    spl_autoload_register(
        function($class){
            require_once "$class.php";
        }
    );

    $connMgr = new ConnectionManager();
    $pdo = $connMgr->getConnection();

    date_default_timezone_set('Asia/Hong_Kong');

    if (isset($_GET['text']) and strlen($_GET['text']) > 0) {
        $eventId = $_GET['eventId'];
        $username = $_GET['username'];
        $timestamp = date('d-m-Y H:i:s');
        $text = $_GET['text'];

        $sql = "insert into comments (eventID, username, timestamp, text) values (:eventId, :username, :timestamp, :text);"; 
    
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':eventId', $eventId, PDO::PARAM_INT);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':timestamp', $timestamp, PDO::PARAM_STR);
        $stmt->bindParam(':text', $text, PDO::PARAM_STR);
        
        $stmt->execute();
        
    

    }

    $eventId = $_GET['eventId'];

    $sql = "select * from comments where eventID = :eventId;";
    
    $connMgr = new ConnectionManager();
    $pdo = $connMgr->getConnection();
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':eventId', $eventId, PDO::PARAM_INT);

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $result = Array();
    $result['comment'] = [];
    
    while($row = $stmt->fetch()) {
        $result['comment'][] = array('eventId' => $row["eventID"], 'username' => $row["username"], 'timestamp' => $row["timestamp"], 'text' => $row["text"]);
    }
    
    $stmt = null;
    $pdo = null;

    echo json_encode($result);

?>