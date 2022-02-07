<?php
include 'conn.php';
//require "session.php";
$json = file_get_contents('php://input');
$data = json_decode($json);

//basic info table
$basicId = $data->basicId;
$other_aluminium = $data->other_aluminium;
$other_lead = $data->other_lead;
$other_zinc = $data->other_zinc;

$carbonco2 = 0;
$carbonch4 = 0;
$carbonn2o = 0;


$finalArrayothr = array();

//strart calaculation
$othrArray = array();
$othrArray['name'] =  "other_aluminium";
$othrArray['value'] = $other_aluminium;
array_push($finalArrayothr, $othrArray);
$othrArray = array();
$othrArray['name'] =  "other_lead";
$othrArray['value'] = $other_lead;
array_push($finalArrayothr, $othrArray);
$othrArray = array();
$othrArray['name'] =  "other_zinc";
$othrArray['value'] = $other_zinc;
array_push($finalArrayothr, $othrArray);

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



$query2 = "SELECT * FROM indu_other WHERE b_id='" . $basicId . "'";
$result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

$rowcount = mysqli_num_rows($result);
if ($rowcount == 0) {
    $query = "INSERT INTO indu_other(b_id,other_aluminium,other_lead,other_zinc)
            VALUES ($basicId,$other_aluminium,$other_lead,$other_zinc)";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $other_id = mysqli_insert_id($conn);

    $query = "INSERT INTO indu_other_emi(b_id,other_id,co2,ch4,n2o)
    VALUES ($basicId, $other_id,$carbonco2,$carbonch4,$carbonn2o)";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
} else {
    $query = "UPDATE  indu_other set other_aluminium=$other_aluminium,other_lead=$other_lead,other_zinc=$other_zinc
               WHERE b_id='" . $basicId . "'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $query = "UPDATE  indu_other_emi set co2=$carbonco2,ch4=$carbonch4,n2o=$carbonn2o
    WHERE b_id='" . $basicId . "'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
}
echo  "success";