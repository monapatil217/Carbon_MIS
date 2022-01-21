<?php
include 'conn.php';
//require "session.php";
$json = file_get_contents('php://input');
$data = json_decode($json);

//basic info table
$basicId = $data->basicId;
$w2 = $data->w2;
$w3 = $data->w3;
$w4 = $data->w4;
$bus = $data->bus;
$tempo = $data->tempo;
$truck = $data->truck;
$flight = $data->flight;
$train = $data->train;

        $query2 = "SELECT * FROM trans_data WHERE b_id='" . $basicId . "'";
        $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            $query = "INSERT INTO trans_data(b_id,w2,w3,w4,bus,tempo,truck,flight,train)
            VALUES ($basicId,$w2,$w3,$w4,$bus,$tempo,$truck,$flight,$train)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }else{
            $query = "UPDATE  trans_data set w2=$w2,w3=$w3,w4=$w4,bus=$bus,
                      tempo=$tempo,truck=$truck,flight=$flight,train=$train WHERE b_id='".$basicId."'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }
        echo  "success";
?>