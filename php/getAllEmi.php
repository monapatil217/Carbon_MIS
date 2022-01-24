<?php
include 'conn.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$basicId = $data->basicId;
$type = $data->type;
$finalArray = array();


$tableName = "";
if ($type == 'electricity') {
    $tableName  = 'ele_emi';
} else if ($type == 'transport') {
    $tableName = 'trans_emi';
} else if ($type == 'liveStock') {
    $tableName = 'live_emi';
} else if ($type == 'cropLand') {
    $tableName = 'crop_emi';
} else if ($type == 'forest') {
    $tableName = 'forest_emi';
} else if ($type == 'landUse') {
    $tableName = 'land_emi';
} else if ($type == 'energy') {
    $tableName = 'indu_eng_emi';
} else if ($type == 'product') {
    $tableName = 'trans_emi';
} else if ($type == 'solidWaste') {
    $tableName = 'solid_emi';
} else if ($type == 'wasteWater') {
    $tableName = 'waste_emi';
} else if ($type == 'cookingFuel') {
    $tableName = 'fule_emi';
}

$query2 = "SELECT * FROM $tableName WHERE b_id='" . $basicId . "'";
$result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
$rowcount = mysqli_num_rows($result);
if ($rowcount == 0) {
    $mainArray = array();
    $mainArray['check'] = "false";
    array_push($finalArray, $mainArray);
} else {
    while ($row = mysqli_fetch_array($result)) {

        $mainArray = array();
        $mainArray['check'] = "true";

        $deleData = array();

        $eleData = [];
        $eleData['name'] = "CO2";
        $eleData['value'] = floatval($row['co2']);
        array_push($deleData, $eleData);
        $eleData = [];
        $eleData['name'] = "CH4";
        $eleData['value'] = floatval($row['ch4']);
        array_push($deleData, $eleData);
        $eleData = [];
        $eleData['name'] = "N2O";
        $eleData['value'] = floatval($row['n2o']);
        array_push($deleData, $eleData);



        $mainArray['cData'] =   $deleData;
        array_push($finalArray, $mainArray);
    }
}

echo  json_encode($finalArray);
