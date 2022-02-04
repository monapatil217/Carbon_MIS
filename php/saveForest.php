<?php
include 'conn.php';
//require "session.php";
$json = file_get_contents('php://input');
$data = json_decode($json);

//basic info table
$basicId = $data->basicId;
$areaForest = $data->areaForest;
$roundWood = $data->roundWood;
$fuelWood = $data->fuelWood;
$disturbance = $data->disturbance;
// $organicSo = $data->organicSo;

        $query2 = "SELECT * FROM forest_data WHERE b_id='" . $basicId . "'";
        $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            $query = "INSERT INTO forest_data(b_id,areaForest,roundWood,fuelWood,disturbance)
            VALUES ($basicId,$areaForest,$roundWood,$fuelWood,$disturbance)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }else{
            $query = "UPDATE  forest_data set areaForest=$areaForest,roundWood=$roundWood,
                      fuelWood=$fuelWood,disturbance=$disturbance WHERE b_id='".$basicId."'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }
        echo  "success";
?>