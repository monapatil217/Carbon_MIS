<?php
include 'conn.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$basicId = $data->basicId;
$type = $data->type;
$mainArray = array();
$finalArray = array();

if ($type == "Electricity") {

    $query2 = "SELECT * FROM ele_data WHERE b_id='" . $basicId . "'";

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
            $eleData['r_elec'] = $row['r_elec'];
            $eleData['c_elec'] = $row['c_elec'];
            $eleData['s_elec'] = $row['s_elec'];
            $eleData['sl_elec'] = $row['sl_elec'];
            array_push($deleData, $eleData);
            $mainArray['cData'] =   $deleData;
            array_push($finalArray, $mainArray);
        }
    }
}else if ($type == "Forest") {

    $query2 = "SELECT * FROM fc_land_data WHERE b_id='" . $basicId . "' AND  type='Forest'";

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
            $eleData['area'] = $row['area'];
            array_push($deleData, $eleData);
            $mainArray['cData'] =   $deleData;
            array_push($finalArray, $mainArray);
        }
    }
}else if ($type == "CropLand") {

    $query2 = "SELECT * FROM fc_land_data WHERE b_id='" . $basicId . "' AND  type='CropLand'";

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
            $eleData['area'] = $row['area'];
            array_push($deleData, $eleData);
            $mainArray['cData'] =   $deleData;
            array_push($finalArray, $mainArray);
        }
    }
}
echo  json_encode($finalArray);
