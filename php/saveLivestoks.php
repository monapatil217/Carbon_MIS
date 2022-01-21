<?php
include 'conn.php';
//require "session.php";
$json = file_get_contents('php://input');
$data = json_decode($json);

//basic info table
$basicId = $data->basicId;
$ind_cat=$data->ind_cat;
$cross_cat = $data->cross_cat;
$buff = $data->buff;
$sheep = $data->sheep;
$goat = $data->goat;
$hors = $data->hors;
$donk = $data->donk;
$came = $data->came;
$pig = $data->pig;
$poul = $data->poul;

        $query2 = "SELECT * FROM live_data WHERE b_id='" . $basicId . "'";
        $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            $query = "INSERT INTO live_data(b_id,ind_cat,cross_cat,buff,sheep,goat,hors,donk,came,pig,poul)
            VALUES ($basicId,$ind_cat,$cross_cat,$buff,$sheep,$goat,$hors,$donk,$came,$pig,$poul)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }else{
            $query = "UPDATE  live_data set ind_cat=$ind_cat,cross_cat=$cross_cat,buff=$buff,sheep=$sheep,
                      goat=$goat,hors=$hors,donk=$donk,came=$came,pig=$pig,poul=$poul WHERE b_id='".$basicId."'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }
        
        echo  "success";
?>