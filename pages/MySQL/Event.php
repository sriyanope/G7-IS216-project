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
     }
    else if($type == "updateEvent"){
    //     $eventTitle = $_GET['eventTitle'];
    //     $category = $_GET['category'];
    //     $eventDate = $_GET['eventDate'];
    //     $startTime = $_GET['startTime'];
    //     $endTime = $_GET['endTime'];
    //     $noOfSlots = $_GET['noOfSlots'];
    //     $about = $_GET['about'];
    //     $eventId = $_GET['eventId'];
    //     updateEvent($eventTitle, $category, $eventDate, $startTime, $endTime, $noOfSlots, $about, $eventId);
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

        $sql = "select * from event e join garden g on e.gardenID = g.gardenID where eventTitle like :key and ($r);";

        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':key', $key, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $result = Array();
        $result['event'] = [];
        
        while($row = $stmt->fetch()) {
            $result['event'][] = array('eventId' => $row["eventID"], 'eventTitle' => $row["eventTitle"], 'category' => $row["category"], 'eventDate' => $row["eventDate"], 'startTime' => $row["startTime"], 'endTime' => $row["endTime"], 'noOfSlots' => $row["noOfSlots"], 'filled' => $row["filled"], 'about' => $row["about"], 'image' => $row["image"], 'review' => $row["review"], 'comment' => $row["comment"], 'username' => $row["username"], 'gardenId' => $row["gardenID"], 'gardenName' => $row["gardenName"]);
        }
        
        $stmt = null;
        $pdo = null;
        echo json_encode($result);
    }


    function myEvents($username1) {
        $sql = "select * from event e join garden g on e.gardenID = g.gardenID where username = :username;";

        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':username', $username1, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $result = Array();
        $result['event'] = [];
        
        while($row = $stmt->fetch()) {
            $result['event'][] = array('eventId' => $row["eventID"], 'eventTitle' => $row["eventTitle"], 'category' => $row["category"], 'eventDate' => $row["eventDate"], 'startTime' => $row["startTime"], 'endTime' => $row["endTime"], 'noOfSlots' => $row["noOfSlots"], 'filled' => $row["filled"], 'about' => $row["about"], 'image' => $row["image"], 'review' => $row["review"], 'comment' => $row["comment"], 'username' => $row["username"], 'gardenId' => $row["gardenID"], 'gardenName' => $row["gardenName"]);
        }
        
        $stmt = null;
        $pdo = null;
        echo json_encode($result);
    }

    function getEventByEventId($eventId1) {
        $sql = "select * from event e join garden g on e.gardenID = g.gardenID where eventId = :eventId1;";

        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':eventId1', $eventId1, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $result = Array();
        $result['event'] = [];
        
        while($row = $stmt->fetch()) {
            $result['event'][] = array('eventId' => $row["eventID"], 'eventTitle' => $row["eventTitle"], 'category' => $row["category"], 'eventDate' => $row["eventDate"], 'startTime' => $row["startTime"], 'endTime' => $row["endTime"], 'noOfSlots' => $row["noOfSlots"], 'filled' => $row["filled"], 'about' => $row["about"], 'image' => $row["image"], 'review' => $row["review"], 'comment' => $row["comment"], 'username' => $row["username"], 'gardenId' => $row["gardenID"], 'gardenName' => $row["gardenName"]);
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

?>