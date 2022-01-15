<?php
include 'conn.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$type = $data->type;
$finalDataArray = [];
$tableEmiarray = ["ele_emi", "fc_land_emi", "fule_emi", "indu_eng_emi", "land_emi", "live_emi", "solid_emi", "trans_emi", "waste_emi"];
$tableName = "";
if ($type == 'Electricity') {
    $tableName  = 'ele_emi';
} else if ($type == 'Transport') {
    $tableName = 'trans_emi';
} else if ($type == 'LiveStok') {
    $tableName = 'live_emi';
} else if ($type == 'CropLand') {
    $tableName = 'crop_emi';
} else if ($type == 'Forest') {
    $tableName = 'forest_emi';
} else if ($type == 'LandUse') {
    $tableName = 'land_emi';
} else if ($type == 'Energy') {
    $tableName = 'indu_eng_emi';
} else if ($type == 'Product') {
    $tableName = 'trans_emi';
} else if ($type == 'SolidWaste') {
    $tableName = 'solid_emi';
} else if ($type == 'WasteWater') {
    $tableName = 'waste_emi';
} else if ($type == 'CookingFuel') {
    $tableName = 'fule_emi';
}

$query2 = "SELECT Distinct(name) FROM city_name";
$result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

while ($row = mysqli_fetch_array($result)) {
    $cityName = $row['name'];
    $basicIdquery = "SELECT id FROM basic_info WHERE city='" . $cityName . "'";
    $basicresult = mysqli_query($conn, $basicIdquery)  or die(mysqli_error($conn));
    $rowcount = mysqli_num_rows($basicresult);
    $mainData = array();
    $value = 0;
    if ($rowcount == 0) {
        $value = $value;
    } else {
        $row = mysqli_fetch_array($basicresult);
        $basicId = $row['id'];

        $dataQuery = "SELECT ifnull(ch4, 0) + ifnull(n2o, 0) + ifnull(co2, 0) as ItemSum FROM $tableName WHERE b_id='" . $basicId . "'";
        $emiresult = mysqli_query($conn, $dataQuery)  or die(mysqli_error($conn));
        $rowcount = mysqli_num_rows($emiresult);
        if ($rowcount != 0) {
            $row = mysqli_fetch_array($emiresult);
            $value += $row['ItemSum'];
        }
    }

    $mainData['country'] = $cityName;
    $mainData['value'] = $value;
    array_push($finalDataArray, $mainData);
}
echo  json_encode($finalDataArray);
