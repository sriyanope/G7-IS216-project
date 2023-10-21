<?php
    class GardenDAO {
       
        public function getGardens() {
            $sql = "select * from garden order by gardenName"; 

            $connMgr = new ConnectionManager();
            $pdo = $connMgr->getConnection();
            
            $stmt = $pdo->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $result = Array();
            $result['garden'] = [];
            
            while($row = $stmt->fetch()) {
                $result['garden'][] = array('gardenID' => $row["gardenID"], 'gardenName' => $row["gardenName"], 'Latitude' => $row["latitude"], 'Longitude' => $row["longitude"], 'Region' => $row["region"]);
            }
            
            $stmt = null;
            $pdo = null;
            return json_encode($result);
        }
}

?>