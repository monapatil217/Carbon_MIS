<?php
include 'conn.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$basicId = $data->basicId;
$finalDataArray = [];
// $tableArray = array();
$tableName = "";
$tableArray = array (
    array("ele_data"),
    array("trans_data"),
    // array("crop_emi","forest_emi","land_emi","live_emi"),
    array("crop_data"),
    array("live_data"),
    array("forest_data"),
    array("land_data"),
 
    array("msw_data","bmw_data","hw_data"),
    array( "waste_data"),
    // array("indu_eng_emi","indu_cem_emi","indu_chem_emi","indu_other_emi"),
    array("indu_eng_data"),
    array("indu_cem_data","indu_chem_data","indu_other"),
    array("fule_data")
   );
 $tablearraytype = ["Electricity","Transport","Crop Land","Live Stock","Forest","Land Use","Solid Waste","Waste Water","Energy","Process & Product","Cooking"];

         for($i = 0; $i < sizeof($tableArray); $i++) {
             $value=0;
              $tbarray = $tableArray[$i];
               $tableName="";

            //   print_r($tbarray);
           for ($j = 0; $j < sizeof($tbarray); $j++) {
            $tableName = $tbarray[$j];   
                              
            $dataQuery = "SELECT * FROM $tableName WHERE b_id='" . $basicId . "' ";
            $dataresult = mysqli_query($conn, $dataQuery)  or die(mysqli_error($conn));
            $rowcount = mysqli_num_rows($dataresult);
            if ($rowcount != 0) {
                $value = 100;
            }
            // $dataQuery="SELECT count(*) FROM columns WHERE table_name =$tableName";
            $dataQuery="SELECT COUNT(*) as colnumber FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'carbon_mis_2' AND TABLE_NAME = '".$tableName."'"; 
                              
                $result = mysqli_query($conn, $dataQuery) or die(mysqli_error($conn));              
                 $row = mysqli_fetch_array($result);
                    $columncount = $row['colnumber'];
                // echo "table name ".$tableName." col".$columncount."<br>";
                // echo  "count".$columncount;
                $columncount=$columncount-2;
                if ($columncount != 0) {               
                //  $value =$value/100;
                     $value1 = 100/$columncount;
                    }
 
        }
         $mainData=array();
          $mainData["type"] = $tablearraytype[$i];
             $mainData["value"] = round($value,0);
        array_push($finalDataArray, $mainData);
    }
    
       echo  json_encode($finalDataArray);
?>