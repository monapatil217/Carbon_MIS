<?php
include 'conn.php';
//require "session.php";
$json = file_get_contents('php://input');
$data = json_decode($json);

//basic info table
$basicId = $data->basicId;
$ammo = $data->ammo;
$inorg_a = $data->inorg_a;
$amides = $data->amides;
$aldeh = $data->aldeh;
$organic = $data->organic;
$carb = $data->carb;
$sodaa = $data->sodaa;
$alco = $data->alco;
$alke = $data->alke;
$orgo_charo = $data->orgo_charo;
$oxideC = $data->oxideC;
$cyanideC=$data->cyanideC;
$carbonB=$data->carbonB;

        $query2 = "SELECT * FROM indu_chem_data WHERE b_id='" . $basicId . "'";
        $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            $query = "INSERT INTO indu_chem_data(b_id,ammo,inorg_a,amides,aldeh,organic,carb,sodaa,alco,alke,orgo_charo,oxideC,cyanideC,carbonB)
            VALUES ($basicId,$ammo,$inorg_a,$amides,$aldeh,$organic,$carb,$sodaa,$alco,$alke,$orgo_charo,$oxideC,$cyanideC,$carbonB)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }else{
            $query = "UPDATE  indu_chem_data set ammo=$ammo,inorg_a=$inorg_a,amides=$amides,aldeh=$aldeh,organic=$organic,carb=$carb,sodaa=$sodaa,
               alco=$alco,alke=$alke,orgo_charo=$orgo_charo,oxideC=$oxideC,cyanideC=$cyanideC,carbonB=$carbonB WHERE b_id='".$basicId."'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }
        echo  "success";
?>