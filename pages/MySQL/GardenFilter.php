<?php

spl_autoload_register(
    function ($class){
        require_once  "$class.php";
    }
);

$key = $_GET['key'];

$regions = $_GET['regions'];
$r = "";
$regions = explode(",", $regions);
foreach($regions as $region){
    $r = $r . " Region = '$region' OR";
}
$r = substr($r, 0, -3);

$sql = "select * from garden where gardenName like :key and ($r) order by gardenName"; 

$connMgr = new ConnectionManager();
$pdo = $connMgr->getConnection();

$stmt = $pdo->prepare($sql);
$in = '%'.$key.'%';
$stmt->bindParam(':key', $in, PDO::PARAM_STR);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$result = Array();
$result['garden'] = [];

while($row = $stmt->fetch()) {
    $result['garden'][] = array('gardenID' => $row["gardenID"], 'gardenName' => $row["gardenName"], 'latitude' => $row["latitude"], 'longitude' => $row["longitude"], 'region' => $row["region"]);
}

$stmt = null;
$pdo = null;
echo json_encode($result);

?>