<?php
    session_start();
    spl_autoload_register(
        function($class){
            require_once "$class.php";
        }
    );

    $eventId = $_GET['eventId'];

    function getParticipants($eventId) {
        $sql = "select * from userevent ue join users u where ue.username = u.username and eventId = :eventId;"; 

        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':eventId', $eventId, PDO::PARAM_INT);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $result = Array();
        $result['user'] = [];
        
        while($row = $stmt->fetch()) {
            $result['user'][] = array('username' => $row["username"], 'fullName' => $row["fullName"]);
        }
        
        $stmt = null;
        $pdo = null;
        echo json_encode($result);

    }

    getParticipants($eventId);

?>