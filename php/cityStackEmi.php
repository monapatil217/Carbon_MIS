<?php
include 'conn.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$finalDataArray=[];
$tableEmiarray = ["ele_emi","crop_emi","forest_emi","fule_emi","indu_eng_emi","land_emi","live_emi","solid_emi","trans_emi","waste_emi"];
$query2 = "SELECT Distinct(name) FROM city_name";
$result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

while ($row = mysqli_fetch_array($result)) {
    $cityName = $row['name'];
    $basicIdquery = "SELECT id FROM basic_info WHERE city='".$cityName."'";
    $basicresult = mysqli_query($conn, $basicIdquery)  or die(mysqli_error($conn));
    $rowcount = mysqli_num_rows($basicresult);
    $mainData = array();
    if ($rowcount == 0) {
        for($i=0;$i<sizeof($tableEmiarray);$i++){
            $tableName = $tableEmiarray[$i];
             $mainData['country'] = $cityName;
             $mainData[$tableName] = 0;
        }
    }else{
        $row = mysqli_fetch_array($basicresult);
        $basicId = $row['id'];
        for($i=0;$i<sizeof($tableEmiarray);$i++){
            $value = 0;
            $tableName = $tableEmiarray[$i];
             $dataQuery = "SELECT ifnull(ch4, 0) + ifnull(n2o, 0) + ifnull(co2, 0) as ItemSum FROM $tableName WHERE b_id='".$basicId."'";
             $emiresult = mysqli_query($conn, $dataQuery)  or die(mysqli_error($conn));
             $rowcount = mysqli_num_rows($emiresult);
             if ($rowcount != 0) {
                $row = mysqli_fetch_array($emiresult);
                $value = $row['ItemSum'];
             }
             $mainData['country'] = $cityName;
             $mainData[$tableName] = $value;
        }
       
    }
    array_push($finalDataArray,$mainData);
}
echo  json_encode($finalDataArray);
?>