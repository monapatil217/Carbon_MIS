<?php
include 'conn.php';
//require "session.php";
$json = file_get_contents('php://input');
$data = json_decode($json);

//basic info table
$basicId = $data->basicId;
$w2 = $data->w2;
$w3 = $data->w3;
$w4 = $data->w4;
$bus = $data->bus;
$tempo = $data->tempo;
$truck = $data->truck;
$flight = $data->flight;
$train = $data->train;

$petrol4W = $w4*0.20;
$desel4W = $w4*0.30;
$cnj4W = $w4*0.50;
$petrol3W = $w3*0.21;
$desel3W = $w3*0.57;
$cng3W = $w3*0.22;

$carbonco2 = 0;
$carbonch4 = 0;
$carbonn2o = 0;

$ef = 0;
$emission = 0;
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


//strart calaculation
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
            $carbonco2 += ($km1 *  $approx_fuel * $density * $ncv * $co2ef *365)/1000;
            $carbonch4 += ($km1 *  $approx_fuel * $density * $ncv * $ch4ef *365)/1000;
            $carbonn2o += ($km1 *  $approx_fuel * $density * $ncv * $n2oef *365)/1000;
        }
    }
}
//end calculation

        $query2 = "SELECT * FROM trans_data WHERE b_id='" . $basicId . "'";
        $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            $query = "INSERT INTO trans_data(b_id,w2,w3,w4,bus,tempo,truck,flight,train)
            VALUES ($basicId,$w2,$w3,$w4,$bus,$tempo,$truck,$flight,$train)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $t_id = mysqli_insert_id($conn);

            $query = "INSERT INTO trans_emi(b_id,t_id,co2,ch4,n2o)
            VALUES ($basicId,$t_id,$carbonco2,$carbonch4,$carbonn2o)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        } else {
            $query = "UPDATE  trans_data set w2=$w2,w3=$w3,w4=$w4,bus=$bus,
            tempo=$tempo,truck=$truck,flight=$flight,train=$train WHERE b_id='" . $basicId . "'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

            $query = "UPDATE  trans_emi set co2=$carbonco2,ch4=$carbonch4,n2o=$carbonn2o
            WHERE b_id='" . $basicId . "'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }
echo  "success";