<?php
include 'conn.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$basicId = $data->basicId;
$finalDataArray = [];
$tablearray = ["ele_data", "bmw_data","crop_data","forest_data","hw_data","indu_cem_data","indu_chem_data","fule_data", "indu_eng_data","indu_other","land_data", "live_data", "msw_data", "trans_data", "waste_data"];
$value=0;

        for ($i = 0; $i < sizeof($tablearray); $i++) {
            $tableName = $tablearray[$i];
            $dataQuery = "SELECT * FROM $tableName WHERE b_id='" . $basicId . "'";
            $dataresult = mysqli_query($conn, $dataQuery)  or die(mysqli_error($conn));
            $rowcount = mysqli_num_rows($dataresult);
            if ($rowcount != 0) {
                $value += 6.66;
            }
        }

        $mainData['value'] = round($value,0);
        array_push($finalDataArray, $mainData);
       echo  json_encode($finalDataArray);
?>