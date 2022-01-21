<?php
include 'conn.php';
//require "session.php";
$json = file_get_contents('php://input');
$data = json_decode($json);

//basic info table
$basicId = $data->basicId;
$fuleData = $data->fuleData;

    for($i=0;$i<sizeof($fuleData);$i++){
        $type = $fuleData[$i]->type;
        $resi = $fuleData[$i]->resi;
        $comm = $fuleData[$i]->comm;
        $query2 = "SELECT * FROM fule_data WHERE b_id='" . $basicId . "' AND fuletype='".$type."'";
        $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            $query = "INSERT INTO fule_data(b_id,resi,comm,fuletype)
            VALUES ($basicId,$resi,$comm,'".$type."')";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }else{
            $query = "UPDATE  fule_data set resi=$resi,comm=$comm
                    WHERE b_id='".$basicId."' AND fuletype='".$type."'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }
    }
       
        echo  "success";
?>