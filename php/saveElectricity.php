<?php
include 'conn.php';
//require "session.php";
$json = file_get_contents('php://input');
$data = json_decode($json);

//basic info table
$basicId = $data->basicId;
$r_elec = $data->r_elec;
$c_elec = $data->c_elec;
$s_elec = $data->s_elec;
$sl_elec = $data->sl_elec;
    



        $query2 = "SELECT * FROM ele_data WHERE b_id='" . $basicId . "'";
        $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            $query = "INSERT INTO ele_data(b_id,r_elec,c_elec,s_elec,sl_elec)
            VALUES ($basicId,$r_elec,$c_elec,$s_elec,$sl_elec)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }else{
            $query = "UPDATE  ele_data set r_elec=$r_elec,c_elec=$c_elec,s_elec=$s_elec,
                      sl_elec=$sl_elec WHERE b_id='".$basicId."'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }
        echo  "success";
?>