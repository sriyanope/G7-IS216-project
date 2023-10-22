<?php
    spl_autoload_register(
        function($class){
            require_once "$class.php";
        }
    );

    function registerUser($username, $fullName, $gender, $age, $email, $hashedPassword) {
        $sql = "insert into user (username, fullName, gender, age, email, password) values (:username, :fullName, :gender, :age, :email, :hashedPassword);"; 

        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();
        
        try{
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':fullName', $fullName, PDO::PARAM_STR);
            $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
            $stmt->bindParam(':age', $age, PDO::PARAM_INT);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':hashedPassword', $hashedPassword, PDO::PARAM_STR);
    
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->execute();
            return $result;
        } 
        catch (PDOException $e) {
            // Check if the exception is due to a duplicate key (username in this case)
            if ($e->errorInfo[1] === 1062) {
                return false; // Return a specific error code for duplicate username
                $_SESSION["error"] = "Username already existed";
            } else {
                // For other exceptions, you can log the error or handle them as needed
                error_log("Database Error: " . $e->getMessage());
                return false;
            }
        }

    }

?>