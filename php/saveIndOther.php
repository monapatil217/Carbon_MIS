<?php
include 'conn.php';
//require "session.php";
$json = file_get_contents('php://input');
$data = json_decode($json);

//basic info table
$basicId = $data->basicId;
$other_aluminium = $data->other_aluminium;
$other_lead = $data->other_lead;
$other_zinc = $data->other_zinc;

        $query2 = "SELECT * FROM indu_other WHERE b_id='" . $basicId . "'";
        $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            $query = "INSERT INTO indu_other(b_id,other_aluminium,other_lead,other_zinc)
            VALUES ($basicId,$other_aluminium,$other_lead,$other_zinc)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }else{
            $query = "UPDATE  indu_other set other_aluminium=$other_aluminium,other_lead=$other_lead,other_zinc=$other_zinc
               WHERE b_id='".$basicId."'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }
        echo  "success";
?>