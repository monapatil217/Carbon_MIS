<?php
include 'conn.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$type = $data->type;
$finalDataArray = [];
$tablearray = ["ele_data", "bmw_data", "crop_data", "forest_data", "hw_data", "indu_cem_data", "indu_chem_data", "fule_data", "indu_eng_data", "indu_other", "land_data", "live_data", "msw_data", "trans_data", "waste_data"];
$tableEmiarray =  ["ele_emi", "bmw_emi", "crop_emi", "forest_emi", "hw_emi", "indu_cem_emi", "indu_chem_emi", "fule_emi", "indu_eng_emi", "indu_other_emi", "land_emi", "live_emi", "msw_emi", "trans_emi", "waste_emi"];
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
        } else if ($type == 'emission') {
            for ($i = 0; $i < sizeof($tableEmiarray); $i++) {
                $tableName = $tableEmiarray[$i];
                $dataQuery = "SELECT ifnull(ch4, 0) + ifnull(n2o, 0) + ifnull(co2, 0) as ItemSum FROM $tableName WHERE b_id='" . $basicId . "'";
                $emiresult = mysqli_query($conn, $dataQuery)  or die(mysqli_error($conn));
                $rowcount = mysqli_num_rows($emiresult);
                if ($rowcount != 0) {
                    $row = mysqli_fetch_array($emiresult);
                    $value += $row['ItemSum'];
                }
            }
        } else if ($type == 'pollutant') {
            $mtype = $data->polluType;
            for ($i = 0; $i < sizeof($tableEmiarray); $i++) {
                $tableName = $tableEmiarray[$i];
                $dataQuery = "SELECT ifnull($mtype, 0) as ItemSum FROM $tableName WHERE b_id='" . $basicId . "'";
                $emiresult = mysqli_query($conn, $dataQuery)  or die(mysqli_error($conn));
                $rowcount = mysqli_num_rows($emiresult);
                if ($rowcount != 0) {
                    $row = mysqli_fetch_array($emiresult);
                    $value += $row['ItemSum'];
                }
            }
        }
    }

    $mainData['country'] = $cityName;
    $mainData['value'] = $value;
    array_push($finalDataArray, $mainData);
}
echo  json_encode($finalDataArray);
