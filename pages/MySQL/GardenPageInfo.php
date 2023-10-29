<?php

session_start();

spl_autoload_register(
    function ($class){
        require_once  "$class.php";
    }
);

$gardenId = $_GET['gardenId'];
$username = $_SESSION['username'];
$type = $_GET['type'];

if($type == "getGarden"){
    getGarden($gardenId);
}else if($type == "getNote"){
    getNote($username, $gardenId);
}else if($type == "updateNote"){
    $note = $_GET['note'];
    updateNote($username, $gardenId, $note);
}


function getGarden($gardenId){
    $sql = "select * from garden where gardenId = $gardenId"; 

    $connMgr = new ConnectionManager();
    $pdo = $connMgr->getConnection();
    
    $stmt = $pdo->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $result = Array();
    $result['garden'] = [];
    
    while($row = $stmt->fetch()) {
        $result['garden'][] = array('gardenId' => $row["gardenID"], 'gardenName' => $row["gardenName"], 'latitude' => $row["latitude"], 'longitude' => $row["longitude"], 'region' => $row["region"]);
    }
    
    $stmt = null;
    $pdo = null;
    echo json_encode($result);
}


function getNote($username, $gardenId){
    $sql = "select * from usergarden where gardenId = $gardenId";

    $connMgr = new ConnectionManager();
    $pdo = $connMgr->getConnection();
    
    $stmt = $pdo->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $check = $stmt->execute();
    $result = Array();
    $result['gardenNote'] = [];
    if($check){
        while($row = $stmt->fetch()) {
            $result['gardenNote'][] = array('gardenId' => $row["gardenID"], 'username' => $row["username"], 'note' => $row["note"]);
        }
    }else{
        $result['gardenNote'][] = array('note' => "");
    }

    
    $stmt = null;
    $pdo = null;
    echo json_encode($result);
}


function updateNote($username, $gardenId, $note){
    $connMgr = new ConnectionManager();
    $pdo = $connMgr->getConnection();

    try{
        $sql = "insert into usergarden value (:gardenId, :username, :note);";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':note', $note, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':gardenId', $gardenId, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
    } catch (PDOException $e) {
        $sql = "update usergarden set note = :note where username = :username and gardenId = :gardenId;";
    
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':note', $note, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':gardenId', $gardenId, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
    
        $stmt = null;
        $pdo = null;
    }

}



?>