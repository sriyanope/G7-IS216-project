<?php

    spl_autoload_register(
        function ($class){
            require_once  "$class.php";
        }
    );

    $type = $_GET["type"];
    $username = $_GET['username'];

    if(isset($_GET['gardenId'])){
        $gardenId = $_GET['gardenId'];
    }

    if(isset($_GET['note'])){
        $note = $_GET['note'];
    }

    if($type == "show" and $username != "nonUser"){
        getSavedGarden($username);
    }else if($type == "add"){
        add($gardenId, $username);
    }else if($type == "update"){
        update($gardenId, $username, $note);
    }else if($type == "delete"){
        delete($gardenId, $username);
    }


    function getSavedGarden($username){
        $sql = "select * from usergarden u inner join garden g on u.gardenid = g.gardenid and username = :username;";

        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $status = $stmt->execute();
        $result = Array();
        $result['garden'] = [];
        
        while($row = $stmt->fetch()) {
            $result['garden'][] = array('gardenID' => $row["gardenID"], 'gardenName' => $row["gardenName"]);
        }

        $stmt = null;
        $pdo = null;
        echo json_encode($result);

    }
    

    function add($gardenId, $username){
        $sql = "insert into usergarden values (:gardenId, :username, '');";

        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':gardenId', $gardenId, PDO::PARAM_INT);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $status = $stmt->execute();
        
        $stmt = null;
        $pdo = null;
    }


    function update($gardenId, $username, $note){
        $sql = "update usergarden set note = :note where gardenId = :gardenId and username = :username;";

        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':gardenId', $gardenId, PDO::PARAM_INT);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':note', $note, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $status = $stmt->execute();
        
        $stmt = null;
        $pdo = null;
    }


    function delete($gardenId, $username){
        
        $sql = "delete from usergarden where gardenId = :gardenId and username = :username;";
        
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':gardenId', $gardenId, PDO::PARAM_INT);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $status = $stmt->execute();
        
        $stmt = null;
        $pdo = null;
    }

?>