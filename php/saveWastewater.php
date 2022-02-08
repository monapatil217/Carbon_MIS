<?php
include 'conn.php';
//require "session.php";
$json = file_get_contents('php://input');
$data = json_decode($json);

//basic info table
$basicId = $data->basicId;
$w_cons = $data->w_cons;
$w_gen = $data->w_gen;
$q_treat = $data->q_treat;
$n_stp = $data->n_stp;
$stpData = $data->stpData;
$last_id = 0;

$carbonco2 = 0;
$carbonch4 = 0;
$carbonn2o = 0;
$query2 = "SELECT * FROM basic_info WHERE id='" . $basicId . "'";
$result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
$row  = mysqli_fetch_array($result);
if (is_array($row)){
    $population = $row['popu'];
}
    $tow =  $population * 38 * 0.001 * 365;
    $towcollected = $tow * 1.25 * 0.378;
    $notcollected = $tow *  1 * 0.622;
    $fra_methane;
    $query1 = "SELECT * FROM methane where  f_name ='fraction'";
     $result = mysqli_query($conn, $query1) or die(mysqli_error($conn));
     while ($row = mysqli_fetch_array($result)) {
          $fra_methane =  $row['methane'];
     }
     $addMethane = 0;
     $query2 = "SELECT * FROM methane WHERE NOT f_name ='fraction'";
     $result = mysqli_query($conn, $query2) or die(mysqli_error($conn));
     while ($row = mysqli_fetch_array($result)) {
          $methane =  $row['methane'];
          $ef =  $row['ef'];
          $typevalue = $notcollected * $fra_methane * $methane * $ef;
          $addMethane += $typevalue;
     }
     $wateremission = ($addMethane / 1000) * 21;
     $preYearpop = $population-((3.20/100)*$population);

     $nitrogen = 1;
     $query3 = "SELECT * FROM nitrogen ";
     $result = mysqli_query($conn, $query3) or die(mysqli_error($conn));
     while ($row = mysqli_fetch_array($result)) {
          $fac_nitrogen =  $row['nitrogen'];
          $nitrogen = $nitrogen * $fac_nitrogen;
     }

     $eff = (($population *  $nitrogen) / 1000) * 310;
     $totalemmition = ($wateremission + $eff) / 365;

$query2 = "SELECT * FROM waste_data WHERE b_id='" . $basicId . "'";
$result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

$rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            $query = "INSERT INTO waste_data(b_id,w_cons,w_gen,q_treat,n_stp)
                    VALUES ($basicId,$w_cons,$w_gen,$q_treat,$n_stp)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $last_id = mysqli_insert_id($conn);
            for ($i = 0; $i < sizeof($stpData); $i++) {
                $cap = $stpData[$i]->cap;
                $lat = $stpData[$i]->lat;
                $long = $stpData[$i]->long;
                $tech = $stpData[$i]->tech;
                $recycle = $stpData[$i]->recycle;
                $dispose = $stpData[$i]->dispose;
                $query = "INSERT INTO stp(b_id,w_id,cap,lat,loong,tech,recycle,dispose)
                VALUES ($basicId,$last_id,$cap,$lat,$long,$tech,$recycle,$dispose)";
                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            }

            $query = "INSERT INTO waste_emi(b_id,w_id,co2,ch4,n2o)
            VALUES ($basicId,$last_id,$carbonco2,$carbonch4,$carbonn2o)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        } else {
            $row = mysqli_fetch_array($result);
            $last_id = $row['id'];
            $query = "UPDATE  waste_data set w_cons=$w_cons,w_gen=$w_gen,
                            q_treat=$q_treat,n_stp=$n_stp WHERE b_id='" . $basicId . "'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            for ($i = 0; $i < sizeof($stpData); $i++) {
                $cap = $stpData[$i]->cap;
                $lat = $stpData[$i]->lat;
                $long = $stpData[$i]->long;
                $tech = $stpData[$i]->tech;
                $recycle = $stpData[$i]->recycle;
                $dispose = $stpData[$i]->dispose;
                $query = "UPDATE stp set cap=$cap,lat=$lat,loong=$long,
                        tech=$tech,recycle=$recycle,dispose=$dispose WHERE b_id='" . $basicId . "' AND w_id=$last_id";
                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            }
            $query = "UPDATE  waste_emi set co2=$carbonco2,ch4=$carbonch4,n2o=$carbonn2o
            WHERE b_id='" . $basicId . "'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }
echo  "success";
