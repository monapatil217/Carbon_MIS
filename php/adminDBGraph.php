<?php
include 'conn.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$type = $data->type;
$finalDataArray = [];
$tablearray = ["ele_data", "bmw_data", "crop_data", "forest_data", "hw_data", "indu_cem_data", "indu_chem_data", "fule_data", "indu_eng_data", "indu_other", "land_data", "live_data", "msw_data", "trans_data", "waste_data"];
$query2 = "SELECT  Distinct(name),id FROM city_name order by id";
$result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

while ($row = mysqli_fetch_array($result)) {
    $cityName = $row['name'];
    $id = $row['id'];
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
        if ($type == 'data') {
            for ($i = 0; $i < sizeof($tablearray); $i++) {
                $tableName = $tablearray[$i];
                $dataQuery = "SELECT * FROM $tableName WHERE b_id='" . $basicId . "'";
                $dataresult = mysqli_query($conn, $dataQuery)  or die(mysqli_error($conn));
                $rowcount = mysqli_num_rows($dataresult);
                if ($rowcount != 0) {
                    $value += 6.66;
                }
            }
        }
    }
    $mainData['category'] = $id;
    $mainData['value'] = $value;
    array_push($finalDataArray, $mainData);
}
echo  json_encode($finalDataArray);
