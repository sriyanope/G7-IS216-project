<?php
    session_start();
    spl_autoload_register(
        function($class){
            require_once "$class.php";
        }
    );


    function getEvents() {
        $key = $_GET['key'];
        $regions = $_GET['regions'];
        
        $r = "";
        $regions = explode(",", $regions);
        foreach($regions as $region){
            $r = $r . " region = '$region' OR";
        }
        $r = substr($r, 0, -3);

        $sql = "select * from event";
        $sql = "select * from event e join garden g on e.gardenID = g.gardenID where eventTitle like :key and $r;";

        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        
        $in = '%'.$key.'%';
        $stmt->bindParam(':key', $in, PDO::PARAM_STR);
        $stmt = $pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $result = Array();
        $result['event'] = [];
        
        while($row = $stmt->fetch()) {
            $result['event'][] = array('eventId' => $row["eventID"], 'eventTitle' => $row["eventTitle"], 'category' => $row["category"], 'eventDate' => $row["eventDate"], 'startTime' => $row["startTime"], 'endTime' => $row["endTime"], 'noOfSlots' => $row["noOfSlots"], 'filled' => $row["filled"], 'about' => $row["about"], 'image' => $row["image"], 'review' => $row["review"], 'comment' => $row["comment"], 'username' => $row["username"], 'gardenId' => $row["gardenID"]);
        }
        
        $stmt = null;
        $pdo = null;
        echo json_encode($result);
    }

    getEvents();

?>