<?php
include 'conn.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$finalDataArray=[];
$tableEmiarray = array (
    array("ele_emi"),
    array("trans_emi"),
    array("crop_emi","forest_emi","land_emi","live_emi"),
    array("msw_emi","bmw_emi","hw_emi"),
    array( "waste_emi"),
    array("indu_eng_emi","indu_cem_emi","indu_chem_emi","indu_other_emi"),
    array("fule_emi"),
   );

$query2 = "SELECT Distinct(name) FROM city_name";
$result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

while ($row = mysqli_fetch_array($result)) {
    $cityName = $row['name'];
    $basicIdquery = "SELECT id FROM basic_info WHERE city='".$cityName."'";
    $basicresult = mysqli_query($conn, $basicIdquery)  or die(mysqli_error($conn));
    $rowcount = mysqli_num_rows($basicresult);
    $mainData = array();
    $tblOfSec="";
    if ($rowcount == 0) {
        for($i=0;$i<sizeof($tableEmiarray);$i++){
            $tbarray=$tableEmiarray[$i];
            for($j=0;$j<sizeof($tbarray);$j++){
                $tblOfSec = $tbarray[$j];
            }
             $mainData['country'] = $cityName;
             $mainData[$tblOfSec] = 0;
        }
    }else{
        $row = mysqli_fetch_array($basicresult);
        $basicId = $row['id'];
        for($i=0;$i<sizeof($tableEmiarray);$i++){
            $value = 0;
            $tbarray=$tableEmiarray[$i];

            for($j=0;$j<sizeof($tbarray);$j++){
                $tblOfSec = $tbarray[$j];
                $dataQuery = "SELECT ifnull(ch4, 0) + ifnull(n2o, 0) + ifnull(co2, 0) as ItemSum FROM $tblOfSec WHERE b_id='".$basicId."'";
                $emiresult = mysqli_query($conn, $dataQuery)  or die(mysqli_error($conn));
                $rowcount = mysqli_num_rows($emiresult);
                if ($rowcount != 0) {
                   $row = mysqli_fetch_array($emiresult);
                   $value += floatval($row['ItemSum']);
                }
            }
             $mainData['country'] = $cityName;
             $mainData[$tblOfSec] = round($value,1);
        }
       
    }
    array_push($finalDataArray,$mainData);
}
echo  json_encode($finalDataArray);
?>