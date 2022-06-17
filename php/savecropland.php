<?php
include 'conn.php';
//require "session.php";
$json = file_get_contents('php://input');
$data = json_decode($json);

//basic info table
$basicId = $data->basicId;
$perennial = $data->perennial;
$harwested = $data->harwested;
// $mineralS = $data->mineralS;
// $organicS = $data->organicS;
//calculation for cropland emi
$carbonco2=0;
$carbonch4=0;
$carbonn2o=0;

$finalArrayCrop = array();


//strart calaculation

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
    //2022 emission
   $carbonco2 =  abs(($peri-$hrsv)/1000000);
   $carbonco2=round($carbonco2,2);
//end calculation


//end calculation

$query2 = "SELECT * FROM crop_data WHERE b_id='" . $basicId . "'";
$result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

$rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            $query = "INSERT INTO crop_data(b_id,perennial,harwested)
                    VALUES ($basicId,$perennial,$harwested)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $cropId = mysqli_insert_id($conn);

            $query = "INSERT INTO crop_emi(b_id,c_id,co2,ch4,n2o)
                    VALUES ($basicId,$cropId,$carbonco2,$carbonch4,$carbonn2o)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        } else {
            $query = "UPDATE  crop_data set perennial=$perennial,harwested=$harwested
                            WHERE b_id='" . $basicId . "'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $query = "UPDATE  crop_emi set co2=$carbonco2,ch4=$carbonch4,n2o=$carbonn2o
                    WHERE b_id='" . $basicId . "'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }

        /////
        // ///Before emission 2030
        // $t30=2030-date("Y");
        // $cropBau2030=$carbonco2*(pow(1+(0.87/100)),$t30);
        // ////After intervention emission 2030
        // $cropint2030=0.9 * $cropBau2030;

        // // Before BAU emission 2050
        //  $t50=2050-date("Y");
        //  $cropBau2050=$carbonco2*(pow(1+(0.87/100)),$t50);
        // /// After intervention emission 2050
        // $cropint2050=0.4 * $cropBau2050;



echo  "success";
