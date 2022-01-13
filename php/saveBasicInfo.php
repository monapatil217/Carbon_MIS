<?php
include 'conn.php';
require "session.php";
$json = file_get_contents('php://input');
$data = json_decode($json);

//basic info table
$popu = $data->popu;
$female = $data->female;
$male = $data->male;
$city = $data->city;
$gArea = $data->gArea;
$tArea = $data->tArea;
$lite = $data->lite;
$gdp = $data->gdp;
$edu = $data->edu;
$hospital = $data->hospital;

$basic_id = 0; $data = array();
$id = $_SESSION['cityName'];

$query = "INSERT INTO basic_info(popu,female,male,city,gArea,tArea,lite,gdp,hospital)
	VALUES ($popu,$female,$male,'" . $city . "',$gArea,$tArea,$lite,$gdp,$hospital)";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
     $last_id = mysqli_insert_id($conn);

     $_SESSION['basicId'] = $last_id;
    echo  "success";
?>