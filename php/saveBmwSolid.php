<?php
include 'conn.php';
//require "session.php";
$json = file_get_contents('php://input');
$data = json_decode($json);

//basic info table
$basicId = $data->basicId;
$bmw_gen = $data->bmw_gen;
$bmw_coll = $data->bmw_coll;
$bmw_treat = $data->bmw_treat;

        $query2 = "SELECT * FROM bmw_data WHERE b_id='" . $basicId . "'";
        $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            $query = "INSERT INTO bmw_data(b_id,bmw_gen,bmw_coll,bmw_treat)
            VALUES ($basicId,$bmw_gen,$bmw_coll,$bmw_treat)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }else{
            $query = "UPDATE  bmw_data set bmw_gen=$bmw_gen,bmw_coll=$bmw_coll,bmw_treat=$bmw_treat
               WHERE b_id='".$basicId."'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }
        echo  "success";
?>