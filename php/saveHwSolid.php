<?php
include 'conn.php';
//require "session.php";
$json = file_get_contents('php://input');
$data = json_decode($json);

//basic info table
$basicId = $data->basicId;
$hw_gen = $data->hw_gen;
$hw_coll = $data->hw_coll;
$hw_treat = $data->hw_treat;

$carbonco2 = 0;
$carbonch4 = 0;
$carbonn2o = 0;

$query2 = "SELECT * FROM hw_data WHERE b_id='" . $basicId . "'";
$result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

$rowcount = mysqli_num_rows($result);
if ($rowcount == 0) {
    $query = "INSERT INTO hw_data(b_id,hw_gen,hw_coll,hw_treat)
            VALUES ($basicId,$hw_gen,$hw_coll,$hw_treat)";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $last_id = mysqli_insert_id($conn);

    $query = "INSERT INTO hw_emi(b_id,hw_id,co2,ch4,n2o)
            VALUES ($basicId,$last_id,$carbonco2,$carbonch4,$carbonn2o)";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
} else {
    $query = "UPDATE  hw_data set hw_gen=$hw_gen,hw_coll=$hw_coll,hw_treat=$hw_treat
               WHERE b_id='" . $basicId . "'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $query = "UPDATE  hw_emi set co2=$carbonco2,ch4=$carbonch4,n2o=$carbonn2o
    WHERE b_id='" . $basicId . "'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
}
echo  "success";
