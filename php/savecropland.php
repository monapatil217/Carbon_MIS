<?php
include 'conn.php';
//require "session.php";
$json = file_get_contents('php://input');
$data = json_decode($json);

//basic info table
$basicId = $data->basicId;
$perennial = $data->perennial;
$harwested = $data->harwested;
$mineralS = $data->mineralS;
$organicS = $data->organicS;

        $query2 = "SELECT * FROM crop_data WHERE b_id='" . $basicId . "'";
        $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            $query = "INSERT INTO crop_data(b_id,perennial,harwested,mineralS,organicS)
            VALUES ($basicId,$perennial,$harwested,$mineralS$organicS)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }else{
            $query = "UPDATE  crop_data set perennial=$perennial,harwested=$harwested
                      mineralS=$mineralS,organicS=$organicS WHERE b_id='".$basicId."'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }
        echo  "success";
?>