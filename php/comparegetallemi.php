<?php
include 'conn.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$basicId = $data->basicId;
$type = $data->type;
$finalArray = array();

$tableArray = array();
$tableName = "";
if ($type == 'electricity') {
    array_push($tableArray, "ele_emi");
} else if ($type == 'transport') {
    $tableName = 'trans_emi';
    array_push($tableArray, "trans_emi");
} else if ($type == 'liveStock') {
    array_push($tableArray, "live_emi");
} else if ($type == 'cropLand') {
    array_push($tableArray, "crop_emi");
} else if ($type == 'forest') {
    array_push($tableArray, "forest_emi");
} else if ($type == 'landUse') {
    array_push($tableArray, "land_emi");
} else if ($type == 'energy') {
    array_push($tableArray, "indu_eng_emi");
} else if ($type == 'product') {
    array_push($tableArray, "indu_cem_emi", "indu_chem_emi", "indu_other_emi");
} else if ($type == 'solidWaste') {
    array_push($tableArray, "msw_emi", "hw_emi", "bmw_emi");
} else if ($type == 'wasteWater') {
    array_push($tableArray, "waste_emi");
} else if ($type == 'cookingFuel') {
    array_push($tableArray, "fule_emi");
}
$mainArray = array();
$co2 = 0;
$ch4 = 0;
$n20 = 0;
for ($i = 0; $i < sizeof($tableArray); $i++) {
    $tableName = $tableArray[$i];
    $query2 = "SELECT * FROM $tableName WHERE b_id='" . $basicId . "'";
    $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
    $rowcount = mysqli_num_rows($result);
    if ($rowcount == 0 && $i == 0) {
        $mainArray['check'] = "false";
    } else {
        while ($row = mysqli_fetch_array($result)) {

            $mainArray['check'] = "true";
            $co2 += $row['co2'];
            $ch4 += $row['ch4'];
            $n20 += $row['n2o'];
        }
    }
}
$equivalco2=$co2 + ($ch4 * 21) +  ($n20 * 310);

$deleData = array();

$eleData = [];
$eleData['name'] = "City";
$eleData['value'] =1.33;
// $eleData['value'] = floatval($co2);

array_push($deleData, $eleData);
$eleData = [];
$eleData['name'] = "Maha";
// $eleData['value'] = 28850000; 
$eleData['value'] =0.58;

array_push($deleData, $eleData);
$eleData = [];
$eleData['name'] = "India";
// $eleData['value'] = 258100000;
$eleData['value'] = 0.18;
array_push($deleData, $eleData);

$mainArray['cData'] =   $deleData;
array_push($finalArray, $mainArray);


echo  json_encode($finalArray);
