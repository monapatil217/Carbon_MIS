<?php
include 'conn.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$basicId = $data->basicId;
$type = $data->type;
$mainArray = array();
$finalArray = array();

if ($type == "Electricity") {
    $query2 = "SELECT * FROM ele_emi WHERE b_id='" . $basicId . "'";

    $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
    $rowcount = mysqli_num_rows($result);
    if ($rowcount == 0) {
        $mainArray['check'] = "false";
        array_push($finalArray, $mainArray);
    } else {
        while ($row = mysqli_fetch_array($result)) {

            $mainArray['check'] = "true";
            $deleData = array();
            $eleData = [];
            $eleData['co2'] = $row['co2'];
            $eleData['ch4'] = $row['ch4'];
            $eleData['n2o'] = $row['n2o'];
            array_push($deleData, $eleData);
            $mainArray['cData'] =   $deleData;
            array_push($finalArray, $mainArray);
        }
    }
}
echo  json_encode($finalArray);
?>