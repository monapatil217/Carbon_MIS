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
$cyanideC = $data->cyanideC;
$carbonB = $data->carbonB;

$carbonco2 = 0;
$carbonch4 = 0;
$carbonn2o = 0;

$finalArraychem = array();

//strart calaculation
$chemArray = array();
$chemArray['name'] =  "ammo";
$chemArray['value'] = $ammo;
array_push($finalArraychem, $chemArray);
$chemArray = array();
$chemArray['name'] =  "inorg_a";
$chemArray['value'] = $inorg_a;
array_push($finalArraychem, $chemArray);
$chemArray = array();
$chemArray['name'] =  "amides";
$chemArray['value'] = $amides;
array_push($finalArraychem, $chemArray);

$chemArray = array();
$chemArray['name'] =  "aldeh";
$chemArray['value'] = $aldeh;
array_push($finalArraychem, $chemArray);
$chemArray = array();
$chemArray['name'] =  "organic";
$chemArray['value'] = $organic;
array_push($finalArraychem, $chemArray);
$chemArray = array();
$chemArray['name'] =  "carb";
$chemArray['value'] = $carb;
array_push($finalArraychem, $chemArray);

$chemArray = array();
$chemArray['name'] =  "sodaa";
$chemArray['value'] = $sodaa;
array_push($finalArraychem, $chemArray);
$chemArray = array();
$chemArray['name'] =  "alco";
$chemArray['value'] = $alco;
array_push($finalArraychem, $chemArray);
$chemArray = array();
$chemArray['name'] =  "alke";
$chemArray['value'] = $alke;
array_push($finalArraychem, $chemArray);

$chemArray = array();
$chemArray['name'] =  "orgo_charo";
$chemArray['value'] = $orgo_charo;
array_push($finalArraychem, $chemArray);
$chemArray = array();
$chemArray['name'] =  "oxideC";
$chemArray['value'] = $oxideC;
array_push($finalArraychem, $chemArray);
$chemArray = array();
$chemArray['name'] =  "cyanideC";
$chemArray['value'] = $cyanideC;
array_push($finalArraychem, $chemArray);
$chemArray = array();
$chemArray['name'] =  "carbonB";
$chemArray['value'] = $carbonB;
array_push($finalArraychem, $chemArray);

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


$query2 = "SELECT * FROM indu_chem_data WHERE b_id='" . $basicId . "'";
$result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

$rowcount = mysqli_num_rows($result);
if ($rowcount == 0) {
    $query = "INSERT INTO indu_chem_data(b_id,ammo,inorg_a,amides,aldeh,organic,carb,sodaa,alco,alke,orgo_charo,oxideC,cyanideC,carbonB)
            VALUES ($basicId,$ammo,$inorg_a,$amides,$aldeh,$organic,$carb,$sodaa,$alco,$alke,$orgo_charo,$oxideC,$cyanideC,$carbonB)";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $chem_id = mysqli_insert_id($conn);

    $query = "INSERT INTO indu_chem_emi(b_id,chem_id,co2,ch4,n2o)
    VALUES ($basicId, $chem_id,$carbonco2,$carbonch4,$carbonn2o)";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
} else {
    $query = "UPDATE  indu_chem_data set ammo=$ammo,inorg_a=$inorg_a,amides=$amides,aldeh=$aldeh,organic=$organic,carb=$carb,sodaa=$sodaa,
               alco=$alco,alke=$alke,orgo_charo=$orgo_charo,oxideC=$oxideC,cyanideC=$cyanideC,carbonB=$carbonB WHERE b_id='" . $basicId . "'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $query = "UPDATE  indu_chem_emi set co2=$carbonco2,ch4=$carbonch4,n2o=$carbonn2o
    WHERE b_id='" . $basicId . "'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
}
echo  "success";