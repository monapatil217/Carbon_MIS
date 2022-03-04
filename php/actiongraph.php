<?php
include 'conn.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$basicId = $data->basicId;
$finalDataArray = [];
$dataArray=[];
$tableEmiarray= array (
    array("ele_emi"),
    array("trans_emi"),
    array("crop_emi","forest_emi","land_emi","live_emi"),
    array("msw_emi","bmw_emi","hw_emi","waste_emi"),
    array("indu_eng_emi","indu_cem_emi","indu_chem_emi","indu_other_emi"),
   );
   // array("fule_emi"),add cokking data when rquired
   $category = ["Eletricity","Transport","AFOLU","Waste","Industry"];

    for($j = 0; $j<sizeof($tableEmiarray);$j++){
        $value = 0;
            $aray= $tableEmiarray[$j];
            for ($i = 0; $i < sizeof($aray); $i++) {
            $tableName= $aray[$i];
                $dataQuery = "SELECT ifnull(ch4, 0) + ifnull(n2o, 0) + ifnull(co2, 0) as ItemSum FROM $tableName WHERE b_id='" . $basicId . "'";
                $emiresult = mysqli_query($conn, $dataQuery)  or die(mysqli_error($conn));
                $rowcount = mysqli_num_rows($emiresult);
                if ($rowcount != 0) {
                    $row = mysqli_fetch_array($emiresult);
                    $value += $row['ItemSum'];
                }
                
            }
                $mainData['Sectore'] = $category[$j];
                $mainData['emission'] =round($value,2);
                $mainData['changeemi'] =round($value,2);
                array_push($dataArray, $mainData);

        }
        $mainArray["data"]=$dataArray;
        array_push($finalDataArray, $mainArray);
        echo  json_encode($finalDataArray);
?>