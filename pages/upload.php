<?php
if ($_FILES["profileImage"]["error"] == UPLOAD_ERR_OK) {
    $tempName = $_FILES["profileImage"]["tmp_name"];
    $newName = "profile.jpg"; // You can generate a unique name if needed
    move_uploaded_file($tempName, $newName);
    echo $newName; // Return the new image filename
} else {
    echo "Error uploading image.";
}
?>