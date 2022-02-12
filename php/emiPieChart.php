<?php
include 'conn.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$basicId = $data->basicId;
$finalDataArray = [];
$tableEmiarray= array (
    array("ele_emi"),
    array("trans_emi"),
    array("crop_emi","forest_emi","land_emi","live_emi"),
    array("msw_emi","bmw_emi","hw_emi"),
    array( "waste_emi"),
    array("indu_eng_emi","indu_cem_emi","indu_chem_emi","indu_other_emi"),
    array("fule_emi"),
   );
$category = ["Eletricity","Transport","AFOLU","Solid Waste","Wastewater","Industry","Cooking Fule"];
$query2 = "SELECT Distinct(name) FROM city_name";
$result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

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
                $mainData['category'] = $category[$j];
                $mainData['value'] = $value;
                array_push($finalDataArray, $mainData);

        }
        echo  json_encode($finalDataArray);
                ?>