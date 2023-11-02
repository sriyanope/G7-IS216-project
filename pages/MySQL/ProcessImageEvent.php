<?php
    session_start();
    spl_autoload_register(
        function ($class){
            require_once  "$class.php";
        }
    );
    
    $username = $_SESSION['username'];
    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];

        // Check if the file upload was successful and there are no errors
        if ($file['error'] === UPLOAD_ERR_OK) {
            // Specify the destination folder to save the uploaded image
            $targetDirectory = '../EventImage/';

            // Ensure the target directory exists, or create it if it doesn't
            if (!file_exists($targetDirectory)) {
                mkdir($targetDirectory, 0777, true);
            }

            $tempName = $file['tmp_name'];
            $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
            
            $destination = $targetDirectory . $username . "." . $fileExtension;



            $tempDestination = substr($destination, 3);
            $sql = "update users set profilePhoto = :tempDestination where username = :username;";

            $connMgr = new ConnectionManager();
            $pdo = $connMgr->getConnection();
            
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':tempDestination', $tempDestination, PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $status = $stmt->execute();
            
            $stmt = null;
            $pdo = null;


            // Move the uploaded file to the destination folder
            if (move_uploaded_file($tempName, $destination)) {
                echo 'Image uploaded successfully.';
            } else {
                echo 'Error uploading image.';
            }
        } else {
            echo 'Error during file upload: ' . $file['error'];
        }
    }
?>