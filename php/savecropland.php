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
$carbonco2 = 0;
$carbonch4 = 0;
$carbonn2o = 0;

$finalArrayCrop = array();

//strart calaculation
$cropArray = array();
$cropArray['name'] =  "perennial";
$cropArray['value'] = $perennial;
array_push($finalArrayCrop, $cropArray);
$cropArray = array();
$cropArray['name'] =  "harwested";
$cropArray['value'] = $harwested;
array_push($finalArrayCrop, $cropArray);

foreach ($finalArrayforest as $row) {
        $name =  $row['name'];
        $value =  $row['value'];
        $query2 = "SELECT * FROM ef_fuel where fuel_name='" . $name . "'";
        $result = mysqli_query($conn, $query2);
        while ($row = mysqli_fetch_array($result)) {
                $co2G =  $row['ncv'];
        }
}
//end calculation


//end calculation

$query2 = "SELECT * FROM crop_data WHERE b_id='" . $basicId . "'";
$result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

$rowcount = mysqli_num_rows($result);
if ($rowcount == 0) {
        $query = "INSERT INTO crop_data(b_id,perennial,harwested)
            VALUES ($basicId,$perennial,$harwested)";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $c_id = mysqli_insert_id($conn);

        $query = "INSERT INTO crop_emi(b_id,c_id,co2,ch4,n2o)
            VALUES ($basicId, $c_id , $carbonco2,$carbonch4,$carbonn2o)";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
} else {
        $query = "UPDATE  crop_data set perennial=$perennial,harwested=$harwested
                       WHERE b_id='" . $basicId . "'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $query = "UPDATE  crop_emi set co2=$carbonco2,ch4=$carbonch4,n2o=$carbonn2o
            WHERE b_id='" . $basicId . "'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
}
echo  "success";