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
 
$ele = $r_elec+$c_elec+$s_elec+$sl_elec;
$emissionPerDay;
$carbonco2;$carbonch4;$carbonn2o;
$value = $ele * 700;
$value1 = $value * 0.64;
$totalfuel = $value1 / 1000;
$query1 = "SELECT * FROM ef_fuel where fuel_name='NonCookingCoal'";
$result = mysqli_query($conn, $query1);
while ($row = mysqli_fetch_array($result)) {
    $ncv =  $row['ncv'];
    $co2 =  $row['co2'];
    $ch4 =  $row['ch4'];
    $n2o =  $row['n2o'];
    $carbonco2 = ($totalfuel * $ncv * $co2 * 12)/1000000;
    $carbonch4 = ($totalfuel * $ncv * $ch4  *12)/1000000;
    $carbonn2o = ($totalfuel * $n2o * $ncv * 12)/1000000;
}
$carbonco2=round($carbonco2,2);
$carbonch4=round($carbonch4,5);
$carbonn2o=round($carbonn2o,6);
        $query2 = "SELECT * FROM ele_data WHERE b_id='" . $basicId . "'";
        $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            $query = "INSERT INTO ele_data(b_id,r_elec,c_elec,s_elec,sl_elec)
            VALUES ($basicId,$r_elec,$c_elec,$s_elec,$sl_elec)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
             $eleid = mysqli_insert_id($conn);
             $query = "INSERT INTO ele_emi(b_id,e_id,co2,ch4,n2o)
            VALUES ($basicId,$eleid,$carbonco2,$carbonch4,$carbonn2o)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }else{
            $query = "UPDATE  ele_data set r_elec=$r_elec,c_elec=$c_elec,s_elec=$s_elec,
                      sl_elec=$sl_elec WHERE b_id='".$basicId."'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $query = "UPDATE  ele_emi set co2=$carbonco2,ch4=$carbonch4,n2o=$carbonn2o
                       WHERE b_id='".$basicId."'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }
        echo  "success";
?>