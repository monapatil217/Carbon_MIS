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


        $query2 = "SELECT * FROM indu_cem_data WHERE b_id='" . $basicId . "'";
        $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            $query = "INSERT INTO indu_cem_data(b_id,cem_opc,cem_ppc,cem_pbfs,cem_src,cem_irst40)
            VALUES ($basicId,$cem_opc,$cem_ppc,$cem_pbfs,$cem_src,$cem_irst40)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }else{
            $query = "UPDATE  indu_cem_data set cem_opc=$cem_opc,cem_ppc=$cem_ppc,cem_pbfs=$cem_pbfs,
               cem_src=$cem_src,cem_irst40=$cem_irst40 WHERE b_id='".$basicId."'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }
        echo  "success";
?>