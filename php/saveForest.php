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
$finalArrayforest =array();
// $organicSo = $data->organicSo;
$carbonco2=0;$carbonch4=0;$carbonn2o=0;
//strart calaculation
$forestArray=array();
$forestArray['name'] =  "areaForest";
$forestArray['value'] =$areaForest;
array_push($finalArrayforest,$forestArray);
$forestArray=array();
$forestArray['name'] =  "roundWood";
$forestArray['value'] =$roundWood;
array_push($finalArrayforest,$forestArray);
$forestArray=array();
$forestArray['name'] =  "fuelWood";
$forestArray['value'] =$fuelWood;
array_push($finalArrayforest,$forestArray);
$forestArray=array();
$forestArray['name'] =  "disturbance";
$forestArray['value'] =$disturbance;
array_push($finalArrayforest,$forestArray);

        for($i=0;$i<=sizeof($finalArrayforest);$i++){

        }

//end calculation

        $query2 = "SELECT * FROM forest_data WHERE b_id='" . $basicId . "'";
        $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            $query = "INSERT INTO forest_data(b_id,areaForest,roundWood,fuelWood,disturbance)
            VALUES ($basicId,$areaForest,$roundWood,$fuelWood,$disturbance)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $fc_id = mysqli_insert_id($conn);
            $query = "INSERT INTO forest_emi(b_id,fc_id,co2,ch4,n2o)
            VALUES ($basicId,$fc_id,$carbonco2,$carbonch4,$carbonn2o)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }else{
            $query = "UPDATE  forest_data set areaForest=$areaForest,roundWood=$roundWood,
                      fuelWood=$fuelWood,disturbance=$disturbance WHERE b_id='".$basicId."'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $query = "UPDATE  forest_emi set co2=$carbonco2,ch4=$carbonch4,n2o=$carbonn2o
            WHERE b_id='".$basicId."'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }
        echo  "success";
?>