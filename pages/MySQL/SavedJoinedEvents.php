<?php

    session_start();
    spl_autoload_register(
        function($class){
            require_once "$class.php";
        }
    );

    $type = $_GET['type'];
    $username = $_SESSION['username'];

    if($type == "joined"){
        $pastEvents = $_GET['pastEvents'];
        getJoinedEvents($username, $pastEvents);
    }else if($type == "saved"){
        $pastEvents = $_GET['pastEvents'];
        getSavedEvents($username, $pastEvents);
    }else if($type == "add"){
        $eventId = $_GET['eventId'];
        add($eventId, $username);
    }else if($type == "delete"){
        $eventId = $_GET['eventId'];
        delete($eventId, $username);
    }

    function getJoinedEvents($username, $pastEvents) {
        if($pastEvents == "1"){
            $p = "and eventDate < CURDATE()";
        }else{
            $p = "and eventDate >= CURDATE()";
        }
        $sql = "select * from userevent u join event e join garden g on u.eventId = e.eventId and e.gardenId = g.gardenId where u.username = :username $p;";

        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $result = Array();
        $result['event'] = [];
        
        while($row = $stmt->fetch()) {
            $result['event'][] = array('eventId' => $row["eventID"], 'eventTitle' => $row["eventTitle"], 'category' => $row["category"], 'eventDate' => $row["eventDate"], 'startTime' => $row["startTime"], 'endTime' => $row["endTime"], 'noOfSlots' => $row["noOfSlots"], 'filled' => $row["filled"], 'about' => $row["about"], 'photo' => $row["photo"], 'username' => $row["username"], 'gardenId' => $row["gardenID"], 'gardenName' => $row["gardenName"]);
        }
        
        $stmt = null;
        $pdo = null;
        echo json_encode($result);

    }

    function getSavedEvents($username, $pastEvents) {
        if($pastEvents == "1"){
            $p = "and eventDate < CURDATE()";
        }else{
            $p = "and eventDate >= CURDATE()";
        }
        $sql = "select * from usersaved u join event e join garden g on u.eventId = e.eventId and e.gardenId = g.gardenId where u.username = :username $p;";

        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $result = Array();
        $result['event'] = [];
        
        while($row = $stmt->fetch()) {
            $result['event'][] = array('eventId' => $row["eventID"], 'eventTitle' => $row["eventTitle"], 'category' => $row["category"], 'eventDate' => $row["eventDate"], 'startTime' => $row["startTime"], 'endTime' => $row["endTime"], 'noOfSlots' => $row["noOfSlots"], 'filled' => $row["filled"], 'about' => $row["about"], 'photo' => $row["photo"], 'username' => $row["username"], 'gardenId' => $row["gardenID"], 'gardenName' => $row["gardenName"]);
        }
        
        $stmt = null;
        $pdo = null;
        echo json_encode($result);
    }

    function add($eventId, $username){
        $sql = "insert into usersaved values (:eventId, :username);";

        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':eventId', $eventId, PDO::PARAM_INT);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $status = $stmt->execute();
        
        $stmt = null;
        $pdo = null;
    }

    function delete($eventId, $username){
        
        $sql = "delete from usersaved where eventId = :eventId and username = :username;";
        
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':eventId', $eventId, PDO::PARAM_INT);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $status = $stmt->execute();
        
        $stmt = null;
        $pdo = null;
    }


?>