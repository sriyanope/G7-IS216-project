<?php
    session_start();
    spl_autoload_register(
        function($class){
            require_once "$class.php";
        }
    );

    $type = $_GET['type'];
    $username = "1";


    if($type == "getUser"){
        getUser($username);
    }else if($type == "updateUser"){
        $fullName = $_GET['fullName'];
        $email = $_GET['email'];
        $age = $_GET['age'];
        $bio = $_GET['bio'];
        updateUser($username, $fullName, $email, $age, $bio);
    }

    function getUser($username) {
        $sql = "select * from user where username = :username;"; 

        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $result = Array();
        $result['user'] = [];
        
        while($row = $stmt->fetch()) {
            $result['user'][] = array('username' => $row["username"], 'fullName' => $row["fullName"], 'gender' => $row["gender"], 'age' => $row["age"], 'phoneNumber' => $row["phoneNumber"], 'email' => $row["email"], 'bio' => $row["bio"], 'pastEventsHosted' => $row["pastEventsHosted"], 'pastEventsAttended' => $row["pastEventsAttended"]);
        }
        
        $stmt = null;
        $pdo = null;
        echo json_encode($result);

    }


    function updateUser($username, $fullName, $email, $age, $bio) {
        $sql = "update user set fullName = :fullName, email = :email, age = :age, bio = :bio  where username = :username;"; 

        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':fullName', $fullName, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':age', $age, PDO::PARAM_INT);
        $stmt->bindParam(':bio', $bio, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        
        $stmt = null;
        $pdo = null;

    }

?>