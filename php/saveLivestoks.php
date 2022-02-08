<?php
include 'conn.php';
//require "session.php";
$json = file_get_contents('php://input');
$data = json_decode($json);

//basic info table
$basicId = $data->basicId;
$ind_cat=$data->ind_cat;
$cross_cat = $data->cross_cat;
$buff = $data->buff;
$sheep = $data->sheep;
$goat = $data->goat;
$hors = $data->hors;
$donk = $data->donk;
$came = $data->came;
$pig = $data->pig;
$poul = $data->poul;
$cattle = $ind_cat+$cross_cat;
$finalArrayforest=array();
//start calculation
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
//print_r($finalArrayforest);

  $carbonco2=0;$carbonch4=0;$carbonn2o=0;
        foreach ($finalArrayforest as $row) {
            $name =  $row['name'];
            $value =  $row['value'];
            $query2 = "SELECT * FROM ef_fuel where fuel_name='".$name."'";
                $result = mysqli_query($conn, $query2);
                while ($row = mysqli_fetch_array($result)) {
                    $co2e =  $row['ncv'];
                    $carbonco2 +=  $co2e * $value;
                }
        }
        $carbonco2 = $carbonco2*21;
//end calculation


        $query2 = "SELECT * FROM live_data WHERE b_id='" . $basicId . "'";
        $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            $query = "INSERT INTO live_data(b_id,ind_cat,cross_cat,buff,sheep,goat,hors,donk,came,pig,poul)
            VALUES ($basicId,$ind_cat,$cross_cat,$buff,$sheep,$goat,$hors,$donk,$came,$pig,$poul)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $liveId = mysqli_insert_id($conn);
            $query = "INSERT INTO live_emi(b_id,live_id,co2,ch4,n2o)
            VALUES ($basicId,$liveId,$carbonco2,$carbonch4,$carbonn2o)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }else{
            $query = "UPDATE  live_data set ind_cat=$ind_cat,cross_cat=$cross_cat,buff=$buff,sheep=$sheep,
                      goat=$goat,hors=$hors,donk=$donk,came=$came,pig=$pig,poul=$poul WHERE b_id='".$basicId."'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $query = "UPDATE  live_emi set co2=$carbonco2,ch4=$carbonch4,n2o=$carbonn2o
            WHERE b_id='".$basicId."'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }
        
        echo  "success";
?>