<?php
include 'conn.php';
//require "session.php";
$json = file_get_contents('php://input');
$data = json_decode($json);

//basic info table
$basicId = $data->basicId;
$coal = $data->coal;
$png = $data->png;
$fo = $data->fo;
$ng = $data->ng;
$ido = $data->ido;
$briq = $data->briq;
$hsd = $data->hsd;
$wood = $data->wood;

        $query2 = "SELECT * FROM indu_eng_data WHERE b_id='" . $basicId . "'";
        $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            $query = "INSERT INTO indu_eng_data(b_id,coal,png,fo,ng,ido,briq,hsd,wood)
            VALUES ($basicId,$coal,$png,$fo,$ng,$ido,$briq,$hsd,$wood)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }else{
            $query = "UPDATE  indu_eng_data set coal=$coal,png=$png,fo=$fo,ng=$ng,ido=$ido,
                      briq=$briq,hsd=$hsd,wood=$wood WHERE b_id='".$basicId."'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }
        echo  "success";
?>