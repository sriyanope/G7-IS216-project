<?php
    spl_autoload_register(
        function($class){
            require_once "$class.php";
        }
    );

    function retrieveUser($username) {
        $sql = "select username, password from user where username = :username;"; 

        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $result = "";

            while($row = $stmt->fetch()) {
                $result = $row["password"];
            }

            return $result;

    }

?>