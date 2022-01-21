<?php
include 'conn.php';
//require "session.php";
$json = file_get_contents('php://input');
$data = json_decode($json);

//basic info table
$basicId = $data->basicId;
$resi=$data->resi;
$public = $data->public;
$com = $data->com;
$p_utility = $data->p_utility;
$w_body = $data->w_body;
$green_a = $data->green_a;
$transport = $data->transport;
$indu = $data->indu;
$r_creational = $data->r_creational;
$hills = $data->hills;

        $query2 = "SELECT * FROM land_data WHERE b_id='" . $basicId . "'";
        $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            $query = "INSERT INTO land_data(b_id,resi,public,com,p_utility,w_body,green_a,transport,indu,r_creational,hills)
            VALUES ($basicId,$resi,$public,$com,$p_utility,$w_body,$green_a,$transport,$indu,$r_creational,$hills)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }else{
            $query = "UPDATE  land_data set resi=$resi,public=$public,com=$com,p_utility=$p_utility,
                      w_body=$w_body,green_a=$green_a,transport=$transport,indu=$indu,r_creational=$r_creational,hills=$hills WHERE b_id='".$basicId."'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }
        
        echo  "success";
?>