<?php
include 'conn.php';
//require "session.php";
$json = file_get_contents('php://input');
$data = json_decode($json);

//basic info table
$basicId = $data->basicId;
$bmw_gen = $data->bmw_gen;
$bmw_coll = $data->bmw_coll;
$bmw_treat = $data->bmw_treat;

$carbonco2 = 0;
$carbonch4 = 0;
$carbonn2o = 0;
$carbonco2 =(($bmw_treat/1000)*365)*0.24*44/12;
$carbonch4 = ((($bmw_treat/1000)*365)*0.2)/1000000;
$carbonn2o =((($bmw_treat/1000)*365)*57)/1000000;

$query2 = "SELECT * FROM bmw_data WHERE b_id='" . $basicId . "'";
$result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

$rowcount = mysqli_num_rows($result);
if ($rowcount == 0) {
    $query = "INSERT INTO bmw_data(b_id,bmw_gen,bmw_coll,bmw_treat)
            VALUES ($basicId,$bmw_gen,$bmw_coll,$bmw_treat)";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $last_id = mysqli_insert_id($conn);

    $query = "INSERT INTO bmw_emi(b_id,bmw_id,co2,ch4,n2o)
            VALUES ($basicId,$last_id,$carbonco2,$carbonch4,$carbonn2o)";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
} else {
    $query = "UPDATE  bmw_data set bmw_gen=$bmw_gen,bmw_coll=$bmw_coll,bmw_treat=$bmw_treat
               WHERE b_id='" . $basicId . "'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $query = "UPDATE  bmw_emi set co2=$carbonco2,ch4=$carbonch4,n2o=$carbonn2o
    WHERE b_id='" . $basicId . "'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
}
echo  "success";