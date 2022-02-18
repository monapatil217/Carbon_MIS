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

$carbonco2 = 0;
$carbonch4 = 0;
$carbonn2o = 0;

$finalArrayEe = array();

//strart calaculation
$eeArray = array();
$eeArray['name'] =  "Coal";
$eeArray['value'] = $coal;
array_push($finalArrayEe, $eeArray);
$eeArray = array();
$eeArray['name'] =  "PNG";
$eeArray['value'] = $png;
array_push($finalArrayEe, $eeArray);
$eeArray = array();
$eeArray['name'] =  "FO";
$eeArray['value'] = $fo;
array_push($finalArrayEe, $eeArray);
$eeArray = array();
$eeArray['name'] =  "NG";
$eeArray['value'] = $ng;
array_push($finalArrayEe, $eeArray);
$eeArray = array();
$eeArray['name'] =  "LDO";
$eeArray['value'] = $ido;
array_push($finalArrayEe, $eeArray);
$eeArray = array();
$eeArray['name'] =  "BRI";
$eeArray['value'] = $briq;
array_push($finalArrayEe, $eeArray);
$eeArray = array();
$eeArray['name'] =  "HSD";
$eeArray['value'] = $hsd;
array_push($finalArrayEe, $eeArray);
$eeArray = array();
$eeArray['name'] =  "WOOD";
$eeArray['value'] = $wood;
array_push($finalArrayEe, $eeArray);

foreach ($finalArrayEe as $row) {
        $name =  $row['name'];
        $value =  $row['value'];
        $query2 = "SELECT * FROM ef_fuel where fuel_name='" . $name . "'";
        $result = mysqli_query($conn, $query2);
        while ($row = mysqli_fetch_array($result)) {
                $ncv =  $row['ncv'];
                $co2 =  $row['co2'];
                $ch4 =  $row['ch4'];
                $n2o =  $row['n2o'];
               $carbonco2 += ($value* $ncv * $co2*0.001*1)/1000000;
               $carbonch4 += ($value* $ncv * $ch4 *0.001*1)/1000000;
               $carbonn2o += ($value*$ncv * $n2o *0.001*1)/1000000;
        }
}
//end calculation

$query2 = "SELECT * FROM indu_eng_data WHERE b_id='" . $basicId . "'";
$result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

$rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            $query = "INSERT INTO indu_eng_data(b_id,coal,png,fo,ng,ido,briq,hsd,wood)
            VALUES ($basicId,$coal,$png,$fo,$ng,$ido,$briq,$hsd,$wood)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $indu_id = mysqli_insert_id($conn);

            $query = "INSERT INTO indu_eng_emi(b_id,indu_id,co2,ch4,n2o)
            VALUES ($basicId, $indu_id,$carbonco2,$carbonch4,$carbonn2o)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        } else {
            $query = "UPDATE  indu_eng_data set coal=$coal,png=$png,fo=$fo,ng=$ng,ido=$ido,
            briq=$briq,hsd=$hsd,wood=$wood WHERE b_id='" . $basicId . "'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

            $query = "UPDATE  indu_eng_emi set co2=$carbonco2,ch4=$carbonch4,n2o=$carbonn2o
            WHERE b_id='" . $basicId . "'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }
echo  "success";