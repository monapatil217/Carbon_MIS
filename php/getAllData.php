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

    $query2 = "SELECT * FROM forest_data WHERE b_id='" . $basicId . "'";

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

    $query2 = "SELECT * FROM crop_data WHERE b_id='" . $basicId . "'";

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
}else if ($type == "Transport") {

    $query2 = "SELECT * FROM trans_data WHERE b_id='" . $basicId . "'";

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
            $eleData['w2'] = $row['w2'];
            $eleData['w3'] = $row['w3'];
            $eleData['w4'] = $row['w4'];
            $eleData['bus'] = $row['bus'];
            $eleData['tempo'] = $row['tempo'];
            $eleData['truck'] = $row['truck'];
            $eleData['flight'] = $row['flight'];
            $eleData['train'] = $row['train'];
            array_push($deleData, $eleData);
            $mainArray['cData'] =   $deleData;
            array_push($finalArray, $mainArray);
        }
    }
}else if ($type == "Livestock") { // pending

    $query2 = "SELECT * FROM live_data WHERE b_id='" . $basicId . "'";

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
             $eleData['ind_cat'] = $row['ind_cat'];
            $eleData['cross_cat'] = $row['cross_cat'];
            $eleData['buff'] = $row['buff'];
            $eleData['sheep'] = $row['sheep'];
            $eleData['goat'] = $row['goat'];
            $eleData['hors'] = $row['hors'];
            $eleData['donk'] = $row['donk'];
            $eleData['came'] = $row['came'];
            $eleData['pig'] = $row['pig'];
            $eleData['poul'] = $row['poul'];
            array_push($deleData, $eleData);
            $mainArray['cData'] =   $deleData;
            array_push($finalArray, $mainArray);
        }
    }
}else if ($type == "LandUse") { // pending

    $query2 = "SELECT * FROM land_data WHERE b_id='" . $basicId . "'";

    $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
    $rowcount = mysqli_num_rows($result);
    if ($rowcount == 0) {
        $mainArray['check'] = "false";
        array_push($finalArray, $mainArray);
    } else {
        while ($row = mysqli_fetch_array($result)) {

            $mainArray['check'] = "true";
            $deleData = array();
            $cData = [];
            $cData['resi'] = $row['resi'];
            $cData['com'] = $row['com'];
            $cData['public'] = $row['public'];
            $cData['w_body'] = $row['w_body'];
            $cData['green_a'] = $row['green_a'];
            $cData['transport'] = $row['transport'];
            $cData['indu'] = $row['indu'];
            $cData['r_creational'] = $row['r_creational'];
            $cData['hills'] = $row['hills'];
            $cData['p_utility'] = $row['p_utility'];
            array_push($deleData, $cData);
            $mainArray['cData'] =   $deleData;
            array_push($finalArray, $mainArray);
        }
    }
}else if ($type == "SolidWaste") { // pending

    $query2 = "SELECT * FROM solid_data WHERE b_id='" . $basicId . "'";

    $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
    $rowcount = mysqli_num_rows($result);
    if ($rowcount == 0) {
        $mainArray['check'] = "false";
        array_push($finalArray, $mainArray);
    } else {
        while ($row = mysqli_fetch_array($result)) {

            $mainArray['check'] = "true";
            $deleData = array();
            $cData = [];
            $cData['sw_gen'] = $row['sw_gen'];
            $cData['sw_col'] = $row['sw_col'];
            $cData['sw_treat'] = $row['sw_treat'];
            $cData['n_yard'] = $row['n_yard'];
            array_push($deleData, $cData);
            $mainArray['cData'] =   $deleData;
            array_push($finalArray, $mainArray);
        }
    }
}else if ($type == "WasteWater") { // pending

    $query2 = "SELECT * FROM waste_data WHERE b_id='" . $basicId . "'";

    $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
    $rowcount = mysqli_num_rows($result);
    if ($rowcount == 0) {
        $mainArray['check'] = "false";
        array_push($finalArray, $mainArray);
    } else {
        while ($row = mysqli_fetch_array($result)) {

            $mainArray['check'] = "true";
            $deleData = array();
            $cData = [];
            $cData['w_cons'] = $row['w_cons'];
            $cData['w_gen'] = $row['w_gen'];
            $cData['w_coll'] = $row['w_coll'];
            $cData['q_treat'] = $row['q_treat'];
            $cData['n_stp'] = $row['n_stp'];
            array_push($deleData, $cData);
            $mainArray['cData'] =   $deleData;
            array_push($finalArray, $mainArray);
        }
    }
}else if ($type == "Energy") {

    $query2 = "SELECT * FROM indu_eng_data WHERE b_id='" . $basicId . "'";

    $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
    $rowcount = mysqli_num_rows($result);
    if ($rowcount == 0) {
        $mainArray['check'] = "false";
        array_push($finalArray, $mainArray);
    } else {
        while ($row = mysqli_fetch_array($result)) {

            $mainArray['check'] = "true";
            $deleData = array();
            $cData = [];
            $cData['coal'] = $row['coal'];
            $cData['png'] = $row['png'];
            $cData['fo'] = $row['fo'];
            $cData['ng'] = $row['ng'];
            $cData['ido'] = $row['ido'];
            $cData['briq'] = $row['briq'];
            $cData['hsd'] = $row['hsd'];
            array_push($deleData, $cData);
            $mainArray['cData'] =   $deleData;
            array_push($finalArray, $mainArray);
        }
    }
}
echo  json_encode($finalArray);
