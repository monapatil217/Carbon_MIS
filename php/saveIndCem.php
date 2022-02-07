<?php
include 'conn.php';
//require "session.php";
$json = file_get_contents('php://input');
$data = json_decode($json);

//basic info table
$basicId = $data->basicId;
$cem_opc = $data->cem_opc;
$cem_ppc = $data->cem_ppc;
$cem_pbfs = $data->cem_pbfs;
$cem_src = $data->cem_src;
$cem_irst40 = $data->cem_irst40;

$carbonco2 = 0;
$carbonch4 = 0;
$carbonn2o = 0;


$finalArraycem = array();

//strart calaculation
$cemArray = array();
$cemArray['name'] =  "cem_opc";
$cemArray['value'] = $cem_opc;
array_push($finalArraycem, $cemArray);
$cemArray = array();
$cemArray['name'] =  "cem_ppc";
$cemArray['value'] = $cem_ppc;
array_push($finalArraycem, $cemArray);
$cemArray = array();
$cemArray['name'] =  "cem_pbfs";
$cemArray['value'] = $cem_pbfs;
array_push($finalArraycem, $cemArray);
$cemArray['name'] =  "cem_src";
$cemArray['value'] = $cem_src;
array_push($finalArraycem, $cemArray);
$cemArray = array();
$cemArray['name'] =  "cem_irst40";
$cemArray['value'] = $cem_irst40;
array_push($finalArraycem, $cemArray);

foreach ($finalArrayforest as $row) {
        $name =  $row['name'];
        $value =  $row['value'];
        $query2 = "SELECT * FROM ef_fuel where fuel_name='" . $name . "'";
        $result = mysqli_query($conn, $query2);
        while ($row = mysqli_fetch_array($result)) {
                $co2G =  $row['ncv'];
        }
}
//end calculation


$query2 = "SELECT * FROM indu_cem_data WHERE b_id='" . $basicId . "'";
$result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

$rowcount = mysqli_num_rows($result);
if ($rowcount == 0) {
    $query = "INSERT INTO indu_cem_data(b_id,cem_opc,cem_ppc,cem_pbfs,cem_src,cem_irst40)
            VALUES ($basicId,$cem_opc,$cem_ppc,$cem_pbfs,$cem_src,$cem_irst40)";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $cem_id = mysqli_insert_id($conn);

    $query = "INSERT INTO indu_cem_emi(b_id,cem_id,co2,ch4,n2o)
    VALUES ($basicId, $cem_id,$carbonco2,$carbonch4,$carbonn2o)";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
} else {
    $query = "UPDATE  indu_cem_data set cem_opc=$cem_opc,cem_ppc=$cem_ppc,cem_pbfs=$cem_pbfs,
               cem_src=$cem_src,cem_irst40=$cem_irst40 WHERE b_id='" . $basicId . "'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $query = "UPDATE  indu_cem_emi set co2=$carbonco2,ch4=$carbonch4,n2o=$carbonn2o
    WHERE b_id='" . $basicId . "'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
}
echo  "success";