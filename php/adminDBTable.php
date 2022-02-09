<?php
include 'conn.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$type = $data->type;
$finalDataArray = [];
$tableEmiarray =  ["ele_emi", "bmw_emi", "crop_emi", "forest_emi", "hw_emi", "indu_cem_emi", "indu_chem_emi", "fule_emi", "indu_eng_emi", "indu_other_emi", "land_emi", "live_emi", "msw_emi", "trans_emi", "waste_emi"];
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
    $dvalue = 0;
    $emid = 0;
    if ($rowcount == 0) {
        $dvalue = $dvalue;
        $emid = $emid;
    } else {
        $row = mysqli_fetch_array($basicresult);
        $basicId = $row['id'];

        for ($i = 0; $i < sizeof($tablearray); $i++) {
            $tableName = $tablearray[$i];
            $dataQuery = "SELECT * FROM $tableName WHERE b_id='" . $basicId . "'";
            $dataresult = mysqli_query($conn, $dataQuery)  or die(mysqli_error($conn));
            $rowcount = mysqli_num_rows($dataresult);
            if ($rowcount != 0) {
                $dvalue += 6.66;
            }
        }

        for ($i = 0; $i < sizeof($tableEmiarray); $i++) {
            $tableName = $tableEmiarray[$i];
            $dataQuery = "SELECT ifnull(ch4, 0) + ifnull(n2o, 0) + ifnull(co2, 0) as ItemSum FROM $tableName WHERE b_id='" . $basicId . "'";
            $emiresult = mysqli_query($conn, $dataQuery)  or die(mysqli_error($conn));
            $rowcount = mysqli_num_rows($emiresult);
            if ($rowcount != 0) {
                $row = mysqli_fetch_array($emiresult);
                $emid += $row['ItemSum'];
            }
        }
    }

    $mainData['id'] = $id;
    $mainData['city'] = $cityName;
    $mainData['emission'] = round($emid, 2);
    $mainData['data'] = round($dvalue);
    array_push($finalDataArray, $mainData);
}
echo  json_encode($finalDataArray);
