<?php
include 'conn.php';
//require "session.php";
$json = file_get_contents('php://input');
$data = json_decode($json);

//basic info table
$basicId = $data->basicId;
$cem_opc = $data->cem_opc;
$cem_ppc = $data->cem_ppc;
$cem_pbfs = $data->cem_pbfs;
$cem_src = $data->cem_src;
$cem_irst40 = $data->cem_irst40;

$carbonco2 = 0;
$carbonch4 = 0;
$carbonn2o = 0;

$carbonco2 += $cem_opc *0.537*0.95;
$carbonco2 += $cem_ppc *0.537*0.68;
$carbonco2 += $cem_pbfs *0.537*0.6;
$carbonco2 += $cem_src *0.537*0.95;
$carbonco2 += ($cem_irst40 *0.537*0.95)/1000000;

//end calculation


$query2 = "SELECT * FROM indu_cem_data WHERE b_id='" . $basicId . "'";
$result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

$rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            $query = "INSERT INTO indu_cem_data(b_id,cem_opc,cem_ppc,cem_pbfs,cem_src,cem_irst40)
                    VALUES ($basicId,$cem_opc,$cem_ppc,$cem_pbfs,$cem_src,$cem_irst40)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $cem_id = mysqli_insert_id($conn);

            $query = "INSERT INTO indu_cem_emi(b_id,cem_id,co2,ch4,n2o)
            VALUES ($basicId, $cem_id,$carbonco2,$carbonch4,$carbonn2o)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        } else {
            $query = "UPDATE  indu_cem_data set cem_opc=$cem_opc,cem_ppc=$cem_ppc,cem_pbfs=$cem_pbfs,
                    cem_src=$cem_src,cem_irst40=$cem_irst40 WHERE b_id='" . $basicId . "'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

            $query = "UPDATE  indu_cem_emi set co2=$carbonco2,ch4=$carbonch4,n2o=$carbonn2o
            WHERE b_id='" . $basicId . "'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }
echo  "success";