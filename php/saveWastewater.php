<?php
include 'conn.php';
//require "session.php";
$json = file_get_contents('php://input');
$data = json_decode($json);

//basic info table
$basicId = $data->basicId;
$w_cons = $data->w_cons;
$w_gen = $data->w_gen;
$w_coll = $data->w_coll;
$q_treat = $data->q_treat;
$n_stp = $data->n_stp;
$stpData = $data->stpData;
$last_id=0;
        $query2 = "SELECT * FROM waste_data WHERE b_id='" . $basicId . "'";
        $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
       
        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            $query = "INSERT INTO waste_data(b_id,w_cons,w_gen,w_coll,q_treat,n_stp)
            VALUES ($basicId,$w_cons,$w_gen,$w_coll,$q_treat,$n_stp)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $last_id = mysqli_insert_id($conn);
            for($i=0;$i<sizeof($stpData);$i++){
                   $cap = $stpData[$i]->cap;
                   $lat = $stpData[$i]->lat;
                   $long = $stpData[$i]->long;
                   $tech = $stpData[$i]->tech;
                   $recycle =$stpData[$i]->recycle;
                   $dispose=$stpData[$i]->dispose;
                $query = "INSERT INTO stp(b_id,w_id,cap,lat,loong,tech,recycle,dispose)
                VALUES ($basicId,$last_id,$cap,$lat,$long,$tech,$recycle,$dispose)";
                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            }
        }else{
            $row = mysqli_fetch_array($result);
            $last_id = $row['id'];
            $query = "UPDATE  waste_data set w_cons=$w_cons,w_gen=$w_gen,w_coll=$w_coll,
                       q_treat=$q_treat,n_stp=$n_stp WHERE b_id='".$basicId."'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            for($i=0;$i<sizeof($stpData);$i++){
                    $cap = $stpData[$i]->cap;
                    $lat = $stpData[$i]->lat;
                    $long = $stpData[$i]->long;
                    $tech = $stpData[$i]->tech;
                    $recycle =$stpData[$i]->recycle;
                   $dispose=$stpData[$i]->dispose;
                $query = "UPDATE stp set cap=$cap,lat=$lat,loong=$long,
                  tech=$tech,recycle=$recycle,dispose=$dispose WHERE b_id='".$basicId."' AND w_id=$last_id";
                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            }
        }
        echo  "success";
?>