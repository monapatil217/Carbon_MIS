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
} else if ($type == "Forest") {

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
           $eleData['areaForest'] = $row['areaForest'];
            $eleData['roundWood'] = $row['roundWood'];
            $eleData['fuelWood'] = $row['fuelWood'];
            $eleData['disturbance'] = $row['disturbance'];
            $eleData['organicSo'] = $row['organicSo'];
            array_push($deleData, $eleData);
            $mainArray['cData'] =   $deleData;
            array_push($finalArray, $mainArray);
        }
    }
} else if ($type == "CropLand") {

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
            $eleData['areaForest'] = $row['areaForest'];
            $eleData['roundWood'] = $row['roundWood'];
            $eleData['fuelWood'] = $row['fuelWood'];
            $eleData['disturbance'] = $row['disturbance'];
            $eleData['organicSo'] = $row['organicSo'];
            array_push($deleData, $eleData);
            $mainArray['cData'] =   $deleData;
            array_push($finalArray, $mainArray);
        }
    }
} else if ($type == "Transport") {

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
} else if ($type == "Livestock") { // pending

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
} else if ($type == "LandUse") { // pending

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
} else if ($type == "MSW") { // pending

    $query2 = "SELECT * FROM msw_data WHERE b_id='" . $basicId . "'";

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
            $mswid = $row['id'];
            $cData['msw_gen'] = $row['msw_gen'];
            $cData['msw_col'] = $row['msw_col'];
            $cData['t_comp'] = $row['t_comp'];
            $cData['t_disp'] = $row['t_disp'];
            $cData['t_incin'] = $row['t_incin'];
            $cData['n_yard'] = $row['n_yard'];
                $query2 = "SELECT * FROM yard WHERE b_id='" . $basicId . "' AND msw_id=$mswid";
                $YardList=array();
                $yard=[];
                $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
                while ($row = mysqli_fetch_array($result)) {
                    $yard['area'] = $row['area'];
                    $yard['lat'] = $row['lat'];
                    $yard['loong'] = $row['loong'];
                    $yard['app_waste'] = $row['app_waste'];
                    array_push($YardList, $yard);
                }
                $cData['YardData'] = $YardList;
            array_push($deleData, $cData);
            $mainArray['cData'] =   $deleData;
            array_push($finalArray, $mainArray);
        }
    }
}else if ($type == "BMW") { // pending

    $query2 = "SELECT * FROM bmw_data WHERE b_id='" . $basicId . "'";

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
            $mswid = $row['id'];
            $cData['bmw_gen'] = $row['bmw_gen'];
            $cData['bmw_coll'] = $row['bmw_coll'];
            $cData['bmw_treat'] = $row['bmw_treat'];
               
            array_push($deleData, $cData);
            $mainArray['cData'] =   $deleData;
            array_push($finalArray, $mainArray);
        }
    }
} else if ($type == "HW") { 

    $query2 = "SELECT * FROM hw_data WHERE b_id='" . $basicId . "'";

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
            $mswid = $row['id'];
            $cData['hw_gen'] = $row['hw_gen'];
            $cData['hw_coll'] = $row['hw_coll'];
            $cData['hw_treat'] = $row['hw_treat'];
               
            array_push($deleData, $cData);
            $mainArray['cData'] =   $deleData;
            array_push($finalArray, $mainArray);
        }
    }
}  else if ($type == "WasteWater") { // pending

    $query2 = "SELECT * FROM waste_data WHERE b_id='" . $basicId . "'";

    $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
    $rowcount = mysqli_num_rows($result);
    if ($rowcount == 0) {
        $mainArray['check'] = "false";
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
        }
    }

    $query3 = "SELECT * FROM stp WHERE b_id='" . $basicId . "'";
    $result = mysqli_query($conn, $query3)  or die(mysqli_error($conn));
    $rowcount = mysqli_num_rows($result);
    $stpData = [];
    if ($rowcount == 0) {
        $mainArray['stpData'] =   $stpData;
    } else {
        while ($row = mysqli_fetch_array($result)) {

            $cData = [];
            $cData['cap'] = $row['cap'];
            $cData['lat'] = $row['lat'];
            $cData['long'] = $row['long'];
            $cData['tech'] = $row['tech'];
            $cData['recycle'] = $row['recycle'];
            $cData['dispose'] = $row['dispose'];

            array_push($stpData, $cData);
        }
        $mainArray['stpData'] =   $stpData;
    }
    array_push($finalArray, $mainArray);
} else if ($type == "Energy") {

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
}else if ($type == "Cooking") { // pending
    $arrayfule =array();
    $fuelList = ["LPG","MNGL","KERO","WOOD"];
    for($i=0;$i<sizeOf($fuelList);$i++){
        $query2 = "SELECT * FROM fule_data WHERE b_id='" . $basicId . "' AND  type='". $fuelList[$i] ."'";
            // echo $fuelList[$i];
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
                $cData['comm'] = $row['comm'];
                $cData['type'] = $row['type'];

                 $deleData[$fuelList[$i]] = $cData;
                  array_push($arrayfule, $cData);
               
            }
        }
    }
     $mainArray['cData'] =   $arrayfule;
    array_push($finalArray, $mainArray);
    
}
echo  json_encode($finalArray);
