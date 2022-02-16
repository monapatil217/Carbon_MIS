<?php
include 'conn.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$cityName = $data->city;
$allData = array();

$basicIdquery = "SELECT id FROM basic_info WHERE city='" . $cityName . "'";
$basicresult = mysqli_query($conn, $basicIdquery)  or die(mysqli_error($conn));
$rowcount = mysqli_num_rows($basicresult);
$mainData = array();
$value = 0;
if ($rowcount == 0) {
    $final = array();
} else {
    $row = mysqli_fetch_array($basicresult);
    $basicId = $row['id'];

    $query2 = "SELECT * FROM ele_data WHERE b_id='" . $basicId . "'";
    $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
    $rowcount = mysqli_num_rows($result);
    $mainArray = array();
    $finalArray = array();
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
    $allData['electricity'] =   $finalArray;


    $query2 = "SELECT * FROM trans_data WHERE b_id='" . $basicId . "'";
    $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
    $rowcount = mysqli_num_rows($result);
    $mainArray = array();
    $finalArray = array();
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
    $allData['transport'] =   $finalArray;

    $query2 = "SELECT * FROM crop_data WHERE b_id='" . $basicId . "'";
    $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
    $rowcount = mysqli_num_rows($result);
    $mainArray = array();
    $finalArray = array();
    if ($rowcount == 0) {
        $mainArray['check'] = "false";
        array_push($finalArray, $mainArray);
    } else {
        while ($row = mysqli_fetch_array($result)) {

            $mainArray['check'] = "true";
            $deleData = array();
            $eleData = [];
            $eleData['perennial'] = $row['perennial'];
            $eleData['harwested'] = $row['harwested'];
            array_push($deleData, $eleData);
            $mainArray['cData'] =   $deleData;
            array_push($finalArray, $mainArray);
        }
    }
    $allData['cropland'] =   $finalArray;

    $query2 = "SELECT * FROM live_data WHERE b_id='" . $basicId . "'";
    $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
    $rowcount = mysqli_num_rows($result);
    $mainArray = array();
    $finalArray = array();
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
    $allData['livestock'] =   $finalArray;

    $query2 = "SELECT * FROM forest_data WHERE b_id='" . $basicId . "'";
    $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
    $rowcount = mysqli_num_rows($result);
    $mainArray = array();
    $finalArray = array();
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
            array_push($deleData, $eleData);
            $mainArray['cData'] =   $deleData;
            array_push($finalArray, $mainArray);
        }
    }
    $allData['forest'] =   $finalArray;

    $query2 = "SELECT * FROM land_data WHERE b_id='" . $basicId . "'";
    $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
    $rowcount = mysqli_num_rows($result);
    $mainArray = array();
    $finalArray = array();
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
    $allData['landuse'] =   $finalArray;

    $query2 = "SELECT * FROM msw_data WHERE b_id='" . $basicId . "'";
    $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
    $rowcount = mysqli_num_rows($result);
    $mainArray = array();
    $finalArray = array();
    if ($rowcount == 0) {
        $mainArray['check'] = "false";
        array_push($finalArray, $mainArray);
    } else {
        while ($row = mysqli_fetch_array($result)) {

            $mainArray['check'] = "true";
            $deleData = array();
            $cData = [];
            $cData['msw_gen'] = $row['msw_gen'];
            $cData['msw_col'] = $row['msw_col'];
            $cData['t_comp'] = $row['t_comp'];
            $cData['t_disp'] = $row['t_disp'];
            $cData['t_incin'] = $row['t_incin'];
            $cData['n_yard'] = $row['n_yard'];
            array_push($deleData, $cData);
            $mainArray['cData'] =   $deleData;
            array_push($finalArray, $mainArray);
        }
    }
    $allData['solidwaste'] =   $finalArray;

    $query2 = "SELECT * FROM yard WHERE b_id='" . $basicId . "'";
    $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
    $rowcount = mysqli_num_rows($result);
    $mainArray = array();
    $finalArray = array();
    $deleData = array();
    if ($rowcount == 0) {
        $mainArray['check'] = "false";
        array_push($finalArray, $mainArray);
    } else {
        while ($row = mysqli_fetch_array($result)) {

            $cData = [];
            $cData['area'] = $row['area'];
            $cData['lat'] = $row['lat'];
            $cData['long'] = $row['loong'];
            $cData['app_waste'] = $row['app_waste'];
            array_push($deleData, $cData);
        }
        $mainArray['check'] = "true";
        $mainArray['cData'] =   $deleData;
        array_push($finalArray, $mainArray);
    }
    $allData['yard'] =   $finalArray;

    $query2 = "SELECT * FROM waste_data WHERE b_id='" . $basicId . "'";
    $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
    $rowcount = mysqli_num_rows($result);
    $mainArray = array();
    $finalArray = array();
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
           
            $cData['q_treat'] = $row['q_treat'];
            $cData['n_stp'] = $row['n_stp'];
            array_push($deleData, $cData);
            $mainArray['cData'] =   $deleData;
            array_push($finalArray, $mainArray);
        }
    }
    $allData['wastewater'] =   $finalArray;

    $query3 = "SELECT * FROM stp WHERE b_id='" . $basicId . "'";
    $result = mysqli_query($conn, $query3)  or die(mysqli_error($conn));
    $rowcount = mysqli_num_rows($result);
    $mainArray = array();
    $finalArray = array();
    $stpData = [];
    if ($rowcount == 0) {
        $mainArray['check'] = "false";
        array_push($finalArray, $mainArray);
    } else {

        while ($row = mysqli_fetch_array($result)) {

            $cData = [];
            $cData['cap'] = $row['cap'];
            $cData['lat'] = $row['lat'];
            $cData['long'] = $row['loong'];
            $cData['tech'] = $row['tech'];
            $cData['recycle'] = $row['recycle'];
            $cData['dispose'] = $row['dispose'];

            array_push($stpData, $cData);
        }
        $mainArray['check'] = "true";
        $mainArray['cData'] =   $stpData;
        array_push($finalArray, $mainArray);
    }
    $allData['stp'] =   $finalArray;


    $query2 = "SELECT * FROM hw_data WHERE b_id='" . $basicId . "'";
    $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
    $rowcount = mysqli_num_rows($result);
    $mainArray = array();
    $finalArray = array();
    if ($rowcount == 0) {
        $mainArray['check'] = "false";
        array_push($finalArray, $mainArray);
    } else {
        while ($row = mysqli_fetch_array($result)) {

            $mainArray['check'] = "true";
            $deleData = array();
            $cData = [];
            $cData['hw_gen'] = $row['hw_gen'];
            $cData['hw_coll'] = $row['hw_coll'];
            $cData['hw_treat'] = $row['hw_treat'];
            array_push($deleData, $cData);
            $mainArray['cData'] =   $deleData;
            array_push($finalArray, $mainArray);
        }
    }
    $allData['hazwaste'] =   $finalArray;

    $query2 = "SELECT * FROM bmw_data WHERE b_id='" . $basicId . "'";
    $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
    $rowcount = mysqli_num_rows($result);
    $mainArray = array();
    $finalArray = array();
    if ($rowcount == 0) {
        $mainArray['check'] = "false";
        array_push($finalArray, $mainArray);
    } else {
        while ($row = mysqli_fetch_array($result)) {

            $mainArray['check'] = "true";
            $deleData = array();
            $cData = [];
            $cData['bmw_gen'] = $row['bmw_gen'];
            $cData['bmw_coll'] = $row['bmw_coll'];
            $cData['bmw_treat'] = $row['bmw_treat'];
            array_push($deleData, $cData);
            $mainArray['cData'] =   $deleData;
            array_push($finalArray, $mainArray);
        }
    }
    $allData['biomwaste'] =   $finalArray;

    $query2 = "SELECT * FROM indu_eng_data WHERE b_id='" . $basicId . "'";
    $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
    $rowcount = mysqli_num_rows($result);
    $mainArray = array();
    $finalArray = array();
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
            $cData['wood'] = $row['wood'];
            array_push($deleData, $cData);
            $mainArray['cData'] =   $deleData;
            array_push($finalArray, $mainArray);
        }
    }
    $allData['energyindu'] =   $finalArray;

    $query2 = "SELECT * FROM indu_cem_data WHERE b_id='" . $basicId . "'";
    $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
    $rowcount = mysqli_num_rows($result);
    $mainArray = array();
    $finalArray = array();
    if ($rowcount == 0) {
        $mainArray['check'] = "false";
        array_push($finalArray, $mainArray);
    } else {
        while ($row = mysqli_fetch_array($result)) {

            $mainArray['check'] = "true";
            $deleData = array();
            $cData = [];
            $cData['cem_opc'] = $row['cem_opc'];
            $cData['cem_ppc'] = $row['cem_ppc'];
            $cData['cem_pbfs'] = $row['cem_pbfs'];
            $cData['cem_src'] = $row['cem_src'];
            $cData['cem_irst40'] = $row['cem_irst40'];
            array_push($deleData, $cData);
            $mainArray['cData'] =   $deleData;
            array_push($finalArray, $mainArray);
        }
    }
    $allData['ppcement'] =   $finalArray;

    $query2 = "SELECT * FROM indu_chem_data WHERE b_id='" . $basicId . "'";
    $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
    $rowcount = mysqli_num_rows($result);
    $mainArray = array();
    $finalArray = array();
    if ($rowcount == 0) {
        $mainArray['check'] = "false";
        array_push($finalArray, $mainArray);
    } else {
        while ($row = mysqli_fetch_array($result)) {

            $mainArray['check'] = "true";
            $deleData = array();
            $cData = [];
            $cData['chem_ammo'] = $row['ammo'];
            $cData['chem_inorg_a'] = $row['inorg_a'];
            $cData['chem_amides'] = $row['amides'];
            $cData['chem_aldeh'] = $row['aldeh'];
            $cData['chem_organic'] = $row['organic'];
            $cData['chem_carb'] = $row['carb'];
            $cData['chem_sodaa'] = $row['sodaa'];
            $cData['chem_alco'] = $row['alco'];
            $cData['chem_alke'] = $row['alke'];
            $cData['chem_orgo_charo'] = $row['orgo_charo'];
            $cData['chem_oxideC'] = $row['oxideC'];
            $cData['chem_cyanideC'] = $row['cyanideC'];
            $cData['chem_carbonB'] = $row['carbonB'];
            array_push($deleData, $cData);
            $mainArray['cData'] =   $deleData;
            array_push($finalArray, $mainArray);
        }
    }
    $allData['ppchemical'] =   $finalArray;

    $query2 = "SELECT * FROM indu_other WHERE b_id='" . $basicId . "'";
    $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
    $rowcount = mysqli_num_rows($result);
    $mainArray = array();
    $finalArray = array();
    if ($rowcount == 0) {
        $mainArray['check'] = "false";
        array_push($finalArray, $mainArray);
    } else {
        while ($row = mysqli_fetch_array($result)) {

            $mainArray['check'] = "true";
            $deleData = array();
            $cData = [];
            $cData['other_aluminium'] = $row['other_aluminium'];
            $cData['other_lead'] = $row['other_lead'];
            $cData['other_zinc'] = $row['other_zinc'];
            array_push($deleData, $cData);
            $mainArray['cData'] =   $deleData;
            array_push($finalArray, $mainArray);
        }
    }
    $allData['indu_other'] =   $finalArray;


    $query2 = "SELECT * FROM fule_data WHERE b_id='" . $basicId . "'";
    $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
    $rowcount = mysqli_num_rows($result);
    $mainArray = array();
    $finalArray = array();
    $deleData = array();
    if ($rowcount == 0) {
        $mainArray['check'] = "false";
        array_push($finalArray, $mainArray);
    } else {
        while ($row = mysqli_fetch_array($result)) {

            $cData = [];
            $cData['resi'] = $row['resi'];
            $cData['comm'] = $row['comm'];
            $cData['type'] = $row['fuletype'];
            array_push($deleData, $cData);
        }
        $mainArray['check'] = "true";
        $mainArray['cData'] =   $deleData;
        array_push($finalArray, $mainArray);
    }
    $allData['cooking'] =   $finalArray;

    $final = array();
    array_push($final, $allData);
}
echo  json_encode($final);