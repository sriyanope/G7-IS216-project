<?php

    session_start();
    spl_autoload_register(
        function($class){
            require_once "$class.php";
        }
    );

    $type = $_GET['type'];
    $username = $_SESSION['username'];

    if($type == "getAllEvents"){
        getAllEvents();
    }else if($type == "myEvents"){
        myEvents($username);
    }else if($type == "getEventByEventId"){
        $eventId = $_GET['eventId'];
        getEventByEventId($eventId);
     }else if($type == "joinEvent"){
        $eventId = $_GET['eventId'];
        joinEvent($eventId, $username);
     }else if($type == "deleteEvent"){
        $eventId = $_GET['eventId'];
        $deleteReason = $_GET['deleteReason'];
        deleteEvent($eventId, $deleteReason);
     }else if($type == "leaveEvent"){
        $eventId = $_GET['eventId'];
        leaveEvent($eventId, $username);
     }else if($type == "checkJoinedEvent"){
        $eventId = $_GET['eventId'];
        checkJoinedEvent($eventId, $username);
     }else if($type == "getFilled"){
        $eventId = $_GET['eventId'];
        getFilled($eventId);
     }

    function getAllEvents() {
        $key = '%'.$_GET['key'].'%';
        $regions = $_GET['regions'];
        
        $r = "";
        $regions = explode(",", $regions);
        foreach($regions as $region){
            $r = $r . " region = '$region' OR";
        }
        $r = substr($r, 0, -3);

        $sql = "select * from event e join garden g on e.gardenID = g.gardenID where eventTitle like :key and ($r) order by createdDate desc;";

        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':key', $key, PDO::PARAM_STR);
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


    function myEvents($username1) {
        $sql = "select * from event e join garden g on e.gardenID = g.gardenID where username = :username order by createdDate desc;";

        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':username', $username1, PDO::PARAM_STR);
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

    function getEventByEventId($eventId1) {
        $sql = "select * from users u join event e join garden g on e.gardenID = g.gardenID where eventId = :eventId1;";

        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':eventId1', $eventId1, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $result = Array();
        $result['event'] = [];
        
        while($row = $stmt->fetch()) {
            $result['event'][] = array('eventId' => $row["eventID"], 'eventTitle' => $row["eventTitle"], 'category' => $row["category"], 'eventDate' => $row["eventDate"], 'startTime' => $row["startTime"], 'endTime' => $row["endTime"], 'noOfSlots' => $row["noOfSlots"], 'filled' => $row["filled"], 'about' => $row["about"], 'photo' => $row["photo"], 'username' => $row["username"], 'gardenId' => $row["gardenID"], 'gardenName' => $row["gardenName"], 'fullName' => $row["fullName"], 'latitude' => $row["latitude"], 'longitude' => $row["longitude"]);
        }
        
        $stmt = null;
        $pdo = null;
        echo json_encode($result);
    }

    function updateEvent($eventTitle, $category, $eventDate, $startTime, $endTime, $noOfSlots, $about, $eventId) {
        $sql = "update event set eventTitle = :eventTitle, category = :category, eventDate = :eventDate, startTime = :startTime, endTime = :endTime, noOfSlots = :noOfSlots, gardenId = :gardenId, about = :about where eventId = eventId;";

        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':eventTitle', $eventTitle, PDO::PARAM_STR);
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->bindParam(':eventDate', $eventDate, PDO::PARAM_STR);
        $stmt->bindParam(':startTime', $startTime, PDO::PARAM_STR);
        $stmt->bindParam(':endTime', $endTime, PDO::PARAM_STR);
        $stmt->bindParam(':noOfSlots', $noOfSlots, PDO::PARAM_INT);
        $stmt->bindParam(':about', $about, PDO::PARAM_STR);
        $stmt->bindParam(':eventId', $eventId, PDO::PARAM_INT);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $stmt = null;
        $pdo = null;
        
    }

    function checkJoinedEvent($eventId, $username){
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();

        $sql = "select * from userevent where eventId = :eventId and username = :username;";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':eventId', $eventId, PDO::PARAM_INT);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $result = Array();
        $result['event'] = [];

        while($row = $stmt->fetch()) {
            $result['event'][] = array('eventId' => $row["eventID"]);
        }

        $stmt = null;
        $pdo = null;

        echo json_encode($result);
    }

    function joinEvent($eventId, $username){
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();

        $sql = "insert into userevent values (:eventId, :username, '');";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':eventId', $eventId, PDO::PARAM_INT);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();


        $sql = "update event set filled = filled + 1 where eventId = :eventId;";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':eventId', $eventId, PDO::PARAM_INT);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $stmt = null;
        $pdo = null;
    }

    function deleteEvent($eventId, $reason){
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();

        $sql = "select * from userevent where eventId = :eventId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':eventId', $eventId, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        while($row = $stmt->fetch()) {
            $username = $row["username"];
            deletedEventParticipants($eventId, $username, $reason);
        }

        $sql = "delete from usersaved where eventId = :eventId;";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':eventId', $eventId, PDO::PARAM_INT);
        $stmt->execute();

        $sql = "delete from userevent where eventId = :eventId;";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':eventId', $eventId, PDO::PARAM_INT);
        $stmt->execute();
        
        $sql = "delete from event where eventId = :eventId;";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':eventId', $eventId, PDO::PARAM_INT);
        $stmt->execute();

        $stmt = null;
        $pdo = null;
    }

    function deletedEventParticipants($eventId, $username, $reason){
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();

        $sql = "select * from event where eventId = :eventId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':eventId', $eventId, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        while($row = $stmt->fetch()) {
            $eventTitle = $row["eventTitle"];
        }
        
        $sql = "INSERT INTO deletedEvent (eventID, username, eventTitle, reason) VALUES (:eventId, :username, :eventTitle, :reason);";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':eventId', $eventId, PDO::PARAM_INT);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':eventTitle', $eventTitle, PDO::PARAM_STR);
        $stmt->bindParam(':reason', $reason, PDO::PARAM_STR);
        $stmt->execute();

        $stmt = null;
        $pdo = null;
    }

    function leaveEvent($eventId, $username){
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();

        $sql = "delete from userevent where eventId = :eventId and username = :username;";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':eventId', $eventId, PDO::PARAM_INT);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();


        $sql = "update event set filled = filled - 1 where eventId = :eventId;";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':eventId', $eventId, PDO::PARAM_INT);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $stmt = null;
        $pdo = null;
    }

    function getFilled($eventId) {
        $sql = "select * from event where eventId = :eventId;";

        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':eventId', $eventId, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $result = Array();
        $result['event'] = [];
        
        while($row = $stmt->fetch()) {
            $result['event'][] = array('filled' => $row["filled"], 'noOfSlots' => $row["noOfSlots"]);
        }
        
        $stmt = null;
        $pdo = null;
        echo json_encode($result);
    }

?>