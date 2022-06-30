<?php
include 'conn.php';
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    $basicId = $data->basicId;
    $sectore = $data->sectore;
    $myArray = $data->myArray;
    $finalDataArray = [];

    if($sectore == "Electricity"){
    $useEle = 2100;
    $carbonco2Ele=0;
    $carbonch4Ele=0;
    $carbonn2oEle=0;
    $pOne = 0;
    $pTwo = 0;
    $pThree = 0;
    $perYearEle = $useEle * 12;
    for($i = 0; $i < sizeof($myArray); $i++){
        $pOne =  $myArray[$i]->pOne;
        $pTwo =  $myArray[$i]->pTwo;
        $pThree =  $myArray[$i]->pThree;

    }

    //Start Policy Calculation
    // Policy 1 
    $policyOne = ($perYearEle * $pOne)/100;
    $pOneAmtOfEle =  $perYearEle - $policyOne;
    // echo "\n pOneAmtOfEle:", $pOneAmtOfEle;
    // Policy 1

    // Policy 2 
    $resEle = ($pOneAmtOfEle * 25)/100;
    $indEle = ($pOneAmtOfEle * 75)/100;

    $ele = ($resEle * $pTwo)/100;
    $pTwoAmtOfEle = $resEle - $ele + $indEle;
    // echo "\n pTwoAmtOfEle:", $pTwoAmtOfEle;

    // Policy 2

    $value = $pTwoAmtOfEle * 700;
    $value1 = $value * 0.64;
    $totalfuel = $value1 / 1000000;
    $query1 = "SELECT * FROM ef_fuel where fuel_name='NonCookingCoal'";
    $result = mysqli_query($conn, $query1);
    while ($row = mysqli_fetch_array($result)) {
        $ncv =  $row['ncv'];
        $co2 =  $row['co2'];
        $ch4 =  $row['ch4'];
        $n2o =  $row['n2o'];
        $carbonco2Ele = ($totalfuel * $ncv * $co2 * 12)/1000000;
        $carbonch4Ele = ($totalfuel * $ncv * $ch4 * 21 *12)/1000000;
        $carbonn2oEle = ($totalfuel * $n2o * 310 * $ncv * 12)/1000000;
    }
    $carbonco2Ele=round($carbonco2Ele,2);
    $carbonch4Ele=round($carbonch4Ele,5);
    $carbonn2oEle=round($carbonn2oEle,6);

    // Post intervention Electricity
    $postEmiEle=$carbonco2Ele + $carbonch4Ele + $carbonn2oEle;
    // echo "\n Post intervention Electricity:", $postEmiEle;

    // Policy 3 
     $rangebarIn = ($postEmiEle * $pThree)/100;
     $finalEmi = $postEmiEle - $rangebarIn ; 
    // Policy 3
    echo "\n final Emi Electricity:", $finalEmi;

    //End  Policy Calculation
}else if($sectore == "Transport"){
    $w2 = 0;
    $w3 = 0;
    $w4 = 727123;
    $bus = 0;
    $tempo = 0;
    $truck = 0;
    $flight = 0;
    $train = 0;
    
    $petrol4W = $w4*0.20;
    $desel4W = $w4*0.30;
    $cnj4W = $w4*0.50;
    $petrol3W = $w3*0.21;
    $desel3W = $w3*0.57;
    $cng3W = $w3*0.22;
    
    $carbonco2Tran = 0;
    $carbonch4Tran = 0;
    $carbonn2oTran = 0;
    $dataArray = array();

    $vehiArray = array();
    $vehiArray['fuleType'] =  "Petrol";
    $vehiArray['vehicleType'] = "2W";
    $vehiArray['km'] = $w2;
    array_push($dataArray, $vehiArray);

    $vehiArray = array();
    $vehiArray['fuleType'] =  "Petrol";
    $vehiArray['vehicleType'] = "3W";
    $vehiArray['km'] = $petrol3W;
    array_push($dataArray, $vehiArray);
    $vehiArray = array();
    $vehiArray['fuleType'] =  "Diesel";
    $vehiArray['vehicleType'] = "3W";
    $vehiArray['km'] = $desel3W;
    array_push($dataArray, $vehiArray);
    $vehiArray = array();
    $vehiArray['fuleType'] =  "CNG";
    $vehiArray['vehicleType'] = "3W";
    $vehiArray['km'] = $cng3W;
    array_push($dataArray, $vehiArray);

    $vehiArray = array();
    $vehiArray['fuleType'] =  "Petrol";
    $vehiArray['vehicleType'] = "4W";
    $vehiArray['km'] = $petrol4W;
    array_push($dataArray, $vehiArray);
    $vehiArray = array();
    $vehiArray['fuleType'] =  "Diesel";
    $vehiArray['vehicleType'] = "4W";
    $vehiArray['km'] = $desel4W;
    array_push($dataArray, $vehiArray);
    $vehiArray = array();
    $vehiArray['fuleType'] =  "CNG";
    $vehiArray['vehicleType'] = "4W";
    $vehiArray['km'] = $cnj4W;
    array_push($dataArray, $vehiArray);

    $vehiArray = array();
    $vehiArray['fuleType'] =  "CNG";
    $vehiArray['vehicleType'] = "bus";
    $vehiArray['km'] = $bus;
    array_push($dataArray, $vehiArray);
    $vehiArray = array();
    $vehiArray['fuleType'] =  "Diesel";
    $vehiArray['vehicleType'] = "tempo";
    $vehiArray['km'] = $tempo;
    array_push($dataArray, $vehiArray);
    $vehiArray = array();
    $vehiArray['fuleType'] =  "Diesel";
    $vehiArray['vehicleType'] = "truck";
    $vehiArray['km'] = $truck;
    array_push($dataArray, $vehiArray);
    $vehiArray = array();
    $vehiArray['fuleType'] =  "Coal";
    $vehiArray['vehicleType'] = "train";
    $vehiArray['km'] = $train;
    array_push($dataArray, $vehiArray);
    $vehiArray = array();
    $vehiArray['fuleType'] =  "ATF";
    $vehiArray['vehicleType'] = "flight";
    $vehiArray['km'] = $flight;
    array_push($dataArray, $vehiArray);


  
    $sizeof = sizeof($dataArray);
    foreach ($dataArray as $row) {
        $fule =  $row['fuleType'];
        $vehical =  $row['vehicleType'];
        $km1 =  $row['km'];
        
        $query1 = "SELECT * FROM travel_fuel WHERE type_of_vehicle = '$vehical' AND type_of_fuel='$fule'";
        $result = mysqli_query($conn, $query1);
        while ($row = mysqli_fetch_array($result)) {
            $approx_fuel = $row['approx_fuel'];
            $density = $row['density'];
            $vkt = $row['vkt'];
            $km1=($km1 *$vkt)/1000;
            $query2 = "SELECT * FROM ef_travel_fuel WHERE type_of_fuel='$fule'";
            $result = mysqli_query($conn, $query2);
            while ($row = mysqli_fetch_array($result)) {
                $ncv   = $row['ncv'];
                $co2ef = $row['co2ef'];
                $ch4ef = $row['ch4ef'];
                $n2oef = $row['n2oef'];
                $carbonco2Tran += ($km1 *  $approx_fuel * $density * $ncv * $co2ef *365)/1000;
                $carbonch4Tran += ($km1 *  $approx_fuel * $density * $ncv * $ch4ef *21*365)/1000;
                $carbonn2oTran += ($km1 *  $approx_fuel * $density * $ncv * $n2oef *310 *365)/1000;
    
            }
        }
    }
            $carbonco2Tran=round($carbonco2Tran,2);
            $carbonch4Tran =round($carbonch4Tran ,2);
            $carbonn2oTran=round($carbonn2oTran,2);
            
            //Post Intervantion
            $postEmi=$carbonco2Tran + $carbonch4Tran + $carbonn2oTran;
            $postEmi=round($postEmi,2);
            // echo "\n Post Intervantion Transport:", $postEmi;
            // echo "\n co2:", $carbonco2;
            // echo "\n ch4:", $carbonch4;
            // echo "\n n2o:", $carbonn2o;
 }else if($sectore == "AFOLU"){
    $postInteAFOLU = 0;

    $carbonco2ALiveStk=0;
    $carbonch4LiveStk=0;
    $carbonn2oLiveStk=0;

    $carbonco2Crop=0;
    $carbonch4Crop=0;
    $carbonn2oCrop=0;

    
    $carbonco2Crop=0;
    $carbonch4Crop=0;
    $carbonn2oCrop=0;


    // LiveStocks
    //basic info table
    $ind_cat= 0;
    $cross_cat = 0;
    $buff = 0;
    $sheep = 0;
    $goat = 0;
    $hors = 0;
    $donk = 0;
    $came = 0;
    $pig = 795221;
    $poul = 0;
    $cattle = 0;
    $finalArrayforest=array();
    $forestArray=array();
    $forestArray['name'] =  "buffalo";
    $forestArray['value'] =$buff;
    array_push($finalArrayforest,$forestArray);
    $forestArray=array();
    $forestArray['name'] =  "sheep";
    $forestArray['value'] =$sheep;
    array_push($finalArrayforest,$forestArray);
    $forestArray=array();
    $forestArray['name'] =  "goat";
    $forestArray['value'] =$goat;
    array_push($finalArrayforest,$forestArray);
    $forestArray=array();
    $forestArray['name'] =  "cattle";
    $forestArray['value'] =$cattle;
    array_push($finalArrayforest,$forestArray);
    $forestArray=array();
    $forestArray['name'] =  "pig";
    $forestArray['value'] =$pig;
    array_push($finalArrayforest,$forestArray);
    $forestArray=array();
    $forestArray['name'] =  "hors";
    $forestArray['value'] =$hors;
    array_push($finalArrayforest,$forestArray);
    $forestArray=array();
    $forestArray['name'] =  "donk";
    $forestArray['value'] =$donk;
    array_push($finalArrayforest,$forestArray);
    $forestArray=array();
    $forestArray['name'] =  "came";
    $forestArray['value'] =$came;
    array_push($finalArrayforest,$forestArray);
    //print_r($finalArrayforest);

            foreach ($finalArrayforest as $row) {
                $name =  $row['name'];
                $value =  $row['value'];
                $query2 = "SELECT * FROM ef_fuel where fuel_name='".$name."'";
                    $result = mysqli_query($conn, $query2);
                    while ($row = mysqli_fetch_array($result)) {
                        $co2e =  $row['ncv'];
                        $carbonch4LiveStk +=  $co2e * $value;
                    }
            }
            // $carbonch4AFOLU = round((($carbonch4AFOLU * 21)/1000000),2);
        // echo "\n Post Intervantion AFOLU:", $carbonch4AFOLU;
    // LiveStocks

    // CropLand
    $perennial = 1233;
    $harwested = 123;

    $finalArrayCrop = array();


   $query2 = "SELECT * FROM ef_fuel where fuel_name='perennial'";
    $result = mysqli_query($conn, $query2);
    while ($row = mysqli_fetch_array($result)) {
        $gain =  $row['ncv'];
        $peri = $gain * $perennial *100;
    }
    $query2 = "SELECT * FROM ef_fuel where fuel_name='harvested'";
    $result = mysqli_query($conn, $query2);
    while ($row = mysqli_fetch_array($result)) {
        $loss =  $row['ncv'];
        $hrsv = $loss * $harwested*100;
    }
   $carbonco2Crop =  abs(($peri-$hrsv)/1000000);
   $carbonco2Crop =round($carbonco2Crop,2);
//    echo "\n Post Intervantion crop Land:", $carbonco2Crop;
    // CropLand

    // Forest 
    $areaForest = 200050;
    $roundWood = 1500;
    $fuelWood = 200;
    $disturbance = 100;
    $carbonco2For=0;
    $carbonch4For=0;
    $carbonn2oFor=0;
    
    $areaforest = $areaForest*0.47*7.68;
    $carbonco2For += $roundWood*0.89*1.38*0.47;
    $carbonco2For += $fuelWood*0.89*1.28*0.47;
    $carbonco2For += $disturbance*130*1.28*0.47*0.3;
    $carbonco2For =  abs(($areaforest - $carbonco2For)/1000000);
    $carbonco2For=round($carbonco2For,2);
    // echo "\n Post Intervantion Forest:", $carbonco2For;

    $postInteAFOLU = $carbonch4LiveStk + $carbonco2Crop + $carbonco2For;
    // echo "\n carbon ch4 AFOLU:", $carbonch4LiveStk;
    // echo "\n carbonco2Crop:", $carbonco2Crop;
    // echo "\n carbonco2For:", $carbonco2For;

    // echo "\n Post Intervantion AFOLU:", $postInteAFOLU;
    // Forest 

}else if($sectore == "Waste"){
    // Waste
    // waste water 
    $wasteWater = 0;
    $w_cons = 123;
    $w_gen = 1;
    $q_treat = 1;
    $n_stp = 0;
    $stpData = 0;
    $last_id = 0;

    $carbonco2Waste = 0;
    $carbonch4Waste = 0;
    $carbonn2oWaste = 0;
    $query2 = "SELECT * FROM basic_info WHERE id='" . $basicId . "'";
    $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
    $row  = mysqli_fetch_array($result);
    $population = $row['popu'];
    $tow =  $population * 38 * 0.001 * 365;
    $towcollected = $tow * 1.25 * 0.378;
    $notcollected = $tow *  1 * 0.622;
    $fra_methane;
    $query1 = "SELECT * FROM methane where  f_name ='fraction'";
    $result = mysqli_query($conn, $query1) or die(mysqli_error($conn));
    while ($row = mysqli_fetch_array($result)) {
        $fra_methane =  $row['methane'];
    }
    $addMethane = 0;
    $query2 = "SELECT * FROM methane WHERE NOT f_name ='fraction'";
    $result = mysqli_query($conn, $query2) or die(mysqli_error($conn));
    while ($row = mysqli_fetch_array($result)) {
        $methane =  $row['methane'];
        $ef =  $row['ef'];
        $typevalue = $notcollected * $fra_methane * $methane * $ef;
        $addMethane += $typevalue;
    }
    $carbonch4 = ($addMethane / 1000000);
    $carbonch4=round($carbonch4,2);
    $preYearpop = $population-((3.20/100)*$population);

    $nitrogen = 1;
    $query3 = "SELECT * FROM nitrogen ";
    $result = mysqli_query($conn, $query3) or die(mysqli_error($conn));
    while ($row = mysqli_fetch_array($result)) {
        $fac_nitrogen =  $row['nitrogen'];
        $nitrogen = $nitrogen * $fac_nitrogen;
    }

    $carbonn2o = (($population *  $nitrogen) / 1000000);
    $carbonn2o =round($carbonn2o ,2);
    $totalemmition = ($carbonch4 + $carbonn2o);
    // echo "\n Post Intervantion waste:", $totalemmition;
    // waste water 

    // Solid waste
    // MSW 
    $msw_gen = 34;
    $msw_col = 34;
    $t_comp = 0;
    $t_disp = 0;
    $n_yard = 1;
    $t_incin = 0;
    $yardData = 0;
    $last_id = 0;


    $carbonco2 = 0;
    $carbonch4 = 0;
    $carbonn2o = 0;
    $compost = 0;
    $inenration = 0;    
    $landfiled = 0;

    //compost calculation
    $carbonch4 =((($t_comp*1000*4*365)/1000000))/1000000;
    $carbonn2o =(($t_comp*1000*0.24*365)/1000000)/1000000;

    $compost = $carbonch4 + $carbonn2o;
    
    
    //inenration calculation
    $carbonco2 =round(($t_incin*0.001*0.5*0.3*0.36*3.66*1000*365)/1000000,2);
    $carbonch4 +=(($t_incin*0.001*0.2*365)/1000)/1000000;
    $carbonn2o += ((($t_incin*0.001*50*365)/1000)/1000000);

    $inenration = $carbonco2 + $carbonch4 + $carbonn2o; 

    
    //landfiled
    $carbonch4 +=($t_disp*0.001*0.18*0.25*0.6*(16/12)*1000*365)/1000000;

    $carbonch4 =round($carbonch4,2);
    $carbonn2o =round($carbonn2o,2);

    $landfiled  = $carbonch4;

    // echo "\n compost:", $compost;
    // echo "\n inenration:", $inenration;
    // echo "\n landfiled:", $landfiled;

    $msw = $compost + $inenration + $landfiled;
    // echo "\n Post Intervantion waste:", $msw;
    // MSW
    //BMW
    $bmw_gen = 123;
    $bmw_coll = 1;
    $bmw_treat = 1;

    $carbonco2 = 0;
    $carbonch4 = 0;
    $carbonn2o = 0;

    $carbonco2 =(($bmw_treat/1000)*365)*0.24*44/12;
    $carbonch4 = ((($bmw_treat/1000)*365)*0.2)/1000000;
    $carbonn2o =((($bmw_treat/1000)*365)*57)/1000000;

    $carbonco2 = round($carbonco2,2);
    $carbonch4 = round($carbonch4 ,2);
    $carbonn2o = round($carbonn2o,2);
    $bmw = $carbonco2 + $carbonch4 + $carbonn2o; 

    // echo "\n Post Intervantion waste:", $bmw;
    //BMW

    $solidWaste = $msw + $bmw; 
    // echo "\n Post intervantion waste water:",$solidWaste;

    // solid Waste

    // waste calculation
    $waste = $wasteWater + $solidWaste;
    echo "\n Post Intervation Waste:", $waste;
// Waste

}
// else if($sectore == "Industry"){
// }
?>