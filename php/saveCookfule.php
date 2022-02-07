<?php
include 'conn.php';
//require "session.php";
$json = file_get_contents('php://input');
$data = json_decode($json);

//basic info table
$basicId = $data->basicId;
$fuleData = $data->fuleData;

$carbonco2 = 0;
$carbonch4 = 0;
$carbonn2o = 0;

foreach ($finalArrayforest as $row) {
        $name =  $row['name'];
        $value =  $row['value'];
        $query2 = "SELECT * FROM ef_fuel where fuel_name='" . $name . "'";
        $result = mysqli_query($conn, $query2);
        while ($row = mysqli_fetch_array($result)) {
                $co2G =  $row['ncv'];
        }
}


for ($i = 0; $i < sizeof($fuleData); $i++) {
    $type = $fuleData[$i]->type;
    $resi = $fuleData[$i]->resi;
    $comm = $fuleData[$i]->comm;
    $query2 = "SELECT * FROM fule_data WHERE b_id='" . $basicId . "' AND fuletype='" . $type . "'";
    $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

    $rowcount = mysqli_num_rows($result);
    if ($rowcount == 0) {
        $query = "INSERT INTO fule_data(b_id,resi,comm,fuletype)
            VALUES ($basicId,$resi,$comm,'" . $type . "')";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $f_id = mysqli_insert_id($conn);

        $query = "INSERT INTO fule_emi(b_id,f_id,co2,ch4,n2o)
        VALUES ($basicId, $f_id,$carbonco2,$carbonch4,$carbonn2o)";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    } else {
        $query = "UPDATE  fule_data set resi=$resi,comm=$comm
                    WHERE b_id='" . $basicId . "' AND fuletype='" . $type . "'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $query = "UPDATE  fule_emi set co2=$carbonco2,ch4=$carbonch4,n2o=$carbonn2o
        WHERE b_id='" . $basicId . "'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    }
}

echo  "success";