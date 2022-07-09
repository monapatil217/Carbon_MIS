<?php
include 'conn.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$basicId = $data->basicId;
$year = $data->year;
// $city = $data->city;
$finalArray = array();
$list=array("Electricity","Transport","AFOLU","WasteWater","energy");
$mainArray = array();
$deleData = array();
    for($j=0;$j<sizeof($list);$j++){
        $eleData = array();
        $query2 = "SELECT * FROM bau WHERE b_id='" . $basicId . "' AND ctcyear='".$year."' AND type='".$list[$j]."'";
        $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
        while ($row = mysqli_fetch_array($result)) {
            $eleData['Sectore']=  $list[$j];         
            $eleData['emission'] = floatval($row['bauemi']);
             $eleData['changeemi'] = floatval($row['bauemi']);
            array_push($deleData, $eleData);
        }
    
}
// $mainArray['cData'] =   $deleData;
 $mainArray['data'] =   $deleData;
array_push($finalArray, $mainArray);
echo  json_encode($finalArray);
?>