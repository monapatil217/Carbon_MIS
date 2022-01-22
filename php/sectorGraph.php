<?php
include 'conn.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$cityName =  $data->city;
$finalDataArray = [];
$tableEmiarray = $tablearray = ["ele_emi", "bmw_emi", "crop_emi", "forest_emi", "hw_emi", "indu_cem_emi", "indu_chem_emi", "fule_emi", "indu_eng_emi", "indu_other", "land_emi", "live_emi", "msw_emi", "trans_emi", "waste_emi"];
$mtype = ["co2", "ch4", "n2o"];
$sectortype = ["Electricity", "Transport", "AFOLU", "Solidwaste", "Wastewater", "Industry", "CookingFuel"];
$sectortype1 = ["Electricity", "Transport", "Wastewater", "CookingFuel"];
$swtable = ["msw_emi", "bmw_emi", "hw_emi"];
$indutable = ["indu_eng_emi", "indu_cem_emi", "indu_chem_emi", "indu_other_emi"];
$afolutable = ["crop_emi", "forest_emi", "live_emi", "land_emi"];

$basicIdquery = "SELECT id FROM basic_info WHERE city='" . $cityName . "'";
$basicresult = mysqli_query($conn, $basicIdquery)  or die(mysqli_error($conn));
$rowcount = mysqli_num_rows($basicresult);

if ($rowcount == 0) {

    for ($i = 0; $i < sizeof($sectortype); $i++) {

        $mainData = array();
        $mainData['sector'] = $sectortype[$i];
        $mainData['co2'] = 0;
        $mainData['ch4'] = 0;
        $mainData['n2o'] = 0;

        array_push($finalDataArray, $mainData);
    }
} else {

    $row = mysqli_fetch_array($basicresult);
    $basicId = $row['id'];

    // .........................Electricity Transport Wastewater CookingFuel

    for ($i = 0; $i < sizeof($sectortype1); $i++) {

        $tableName = "";
        if ($sectortype1[$i] == 'Electricity') {
            $tableName  = 'ele_emi';
        } else if ($sectortype1[$i] == 'Transport') {
            $tableName = 'trans_emi';
        } else if ($sectortype1[$i] == 'Wastewater') {
            $tableName = 'waste_emi';
        } else if ($sectortype1[$i] == 'CookingFuel') {
            $tableName = 'fule_emi';
        }


        $mainData = array();
        $mainData['sector'] = $sectortype1[$i];

        $dataQuery = "SELECT * FROM $tableName  WHERE b_id='" . $basicId . "' ";
        $result = mysqli_query($conn, $dataQuery)  or die(mysqli_error($conn));
        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            $mainData['co2'] = 0;
            $mainData['ch4'] = 0;
            $mainData['n2o'] = 0;
        } else {
            while ($row = mysqli_fetch_array($result)) {
                $mainData['co2'] = $row['co2'];
                $mainData['ch4'] = $row['ch4'];
                $mainData['n2o'] = $row['n2o'];
            }
        }

        array_push($finalDataArray, $mainData);
    }


    // .........................AFOLU

    $aco2 = 0;
    $ach4 = 0;
    $an2o = 0;

    $mainData = array();
    $mainData['sector'] = "AFOLU";
    for ($a = 0; $a < sizeof($afolutable); $a++) {

        $dataQuery = "SELECT * FROM $afolutable[$a]  WHERE b_id='" . $basicId . "' ";
        $result = mysqli_query($conn, $dataQuery)  or die(mysqli_error($conn));
        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            $aco2 =  $aco2;
            $ach4 =  $ach4;
            $an2o =   $an2o;
        } else {
            while ($row = mysqli_fetch_array($result)) {
                $aco2 += $row['co2'];
                $ach4 += $row['ch4'];
                $an2o += $row['n2o'];
            }
        }
    }
    $mainData['co2'] =  $aco2;
    $mainData['ch4'] = $ach4;
    $mainData['n2o'] =  $an2o;
    array_push($finalDataArray, $mainData);



    //........................ solidwaste
    $swco2 = 0;
    $swch4 = 0;
    $swn2o = 0;

    $mainData = array();
    $mainData['sector'] = "Solidwaste";
    for ($s = 0; $s < sizeof($swtable); $s++) {

        $dataQuery = "SELECT * FROM $swtable[$s]  WHERE b_id='" . $basicId . "' ";
        $result = mysqli_query($conn, $dataQuery)  or die(mysqli_error($conn));
        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            $swco2 =  $swco2;
            $swch4 =  $swch4;
            $swn2o =   $swn2o;
        } else {
            while ($row = mysqli_fetch_array($result)) {
                $swco2 += $row['co2'];
                $swch4 += $row['ch4'];
                $swn2o += $row['n2o'];
            }
        }
    }
    $mainData['co2'] =  $swco2;
    $mainData['ch4'] = $swch4;
    $mainData['n2o'] =  $swn2o;
    array_push($finalDataArray, $mainData);


    // ......................Industry

    $inco2 = 0;
    $inch4 = 0;
    $inn2o = 0;

    $mainData = array();
    $mainData['sector'] = "Industry";
    for ($in = 0; $in < sizeof($indutable); $in++) {

        $dataQuery = "SELECT * FROM $indutable[$in]  WHERE b_id='" . $basicId . "' ";
        $result = mysqli_query($conn, $dataQuery)  or die(mysqli_error($conn));
        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            $inco2 =  $inco2;
            $inch4 =  $inch4;
            $inn2o =   $inn2o;
        } else {
            while ($row = mysqli_fetch_array($result)) {
                $inco2 += $row['co2'];
                $inch4 += $row['ch4'];
                $inn2o += $row['n2o'];
            }
        }
    }
    $mainData['co2'] =  $inco2;
    $mainData['ch4'] = $inch4;
    $mainData['n2o'] =  $inn2o;
    array_push($finalDataArray, $mainData);
}



echo  json_encode($finalDataArray);
