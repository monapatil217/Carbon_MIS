<?php
include 'conn.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$basicId = $data->basicId;
// $type = $data->type;
// $city = $data->city;
$finalArray = array();
$arr=array(2022,2030,2050);
$list=array("Electricity","Transport","AFOLU","WasteWater","energy");
$mainArray = array();
$deleData = array();
for($i=0;$i<sizeof($arr);$i++){
    $eleData = [];
    // $eleData['year'] = $arr[$i];
    $eleData['year'] = (string) $arr[$i];
    for($j=0;$j<sizeof($list);$j++){
        $query2 = "SELECT * FROM bau WHERE b_id='" . $basicId . "' AND ctcyear='".$arr[$i]."' AND type='".$list[$j]."'";
        $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
        while ($row = mysqli_fetch_array($result)) {
            $eleData[$list[$j]] = floatval($row['intervemi']);
        }
    }
    array_push($deleData, $eleData);
}
// $mainArray['cData'] =   $deleData;
 $mainArray['data'] =   $deleData;
array_push($finalArray, $mainArray);
echo  json_encode($finalArray);