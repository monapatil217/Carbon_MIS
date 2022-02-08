<?php
include 'conn.php';
//require "session.php";
$json = file_get_contents('php://input');
$data = json_decode($json);

//basic info table
// $basicId = $data->basicId;
// $msw_gen = $data->msw_gen;
// $msw_col = $data->msw_col;
 $t_comp = $data->t_comp;
 $t_disp = $data->t_disp;
// $n_yard = $data->n_yard;
$t_incin = $data->t_incin;
// $yardData = $data->yardData;
$last_id = 0;


$carbonco2 = 0;
$carbonch4 = 0;
$carbonn2o = 0;

//strart calaculation
// $finalArrayMsw = array();
// $mswArray = array();
// $mswArray['name'] =  "t_comp";
// $mswArray['value'] = $t_comp;
// array_push($finalArrayMsw, $mswArray);
// $mswArray = array();
// $mswArray['name'] =  "t_disp";
// $mswArray['value'] = $t_disp;
// array_push($finalArrayMsw, $mswArray);
// $mswArray = array();
// $mswArray['name'] =  "t_incin";
// $mswArray['value'] = $t_incin;
// array_push($finalArrayMsw, $mswArray);

//compost calculation
  $carbonch4=($t_comp*1000*4*21*365)/1000000;
  $carbonn2o=($t_comp*1000*0.24*365*310)/1000000;
//inenration calculation
  $carbonco2=$t_incin*0.001*0.5*0.3*0.36*3.66*1000*365;
  $carbonch4+=($t_incin*0.001*0.2*21*365)/1000;
  $carbonn2o+=($t_incin*0.001*50*310*365)/1000;
//landfiled
  $carbonch4+=$t_disp*0.001*0.18*0.25*0.6*(16/12)*1000*21*365;
  
//end calculation
$query2 = "SELECT * FROM msw_data WHERE b_id='" . $basicId . "'";
$result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

$rowcount = mysqli_num_rows($result);
    if ($rowcount == 0) {
        $query = "INSERT INTO msw_data(b_id,msw_gen,msw_col,t_comp,t_disp,t_incin,n_yard)
                VALUES ($basicId,$msw_gen,$msw_col,$t_comp,$t_disp,$t_incin,$n_yard)";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $last_id = mysqli_insert_id($conn);
        for ($i = 0; $i < sizeof($yardData); $i++) {
            $area = $yardData[$i]->area;
            $lat = $yardData[$i]->lat;
            $long = $yardData[$i]->long;
            $app_waste = $yardData[$i]->app_waste;
            $query = "INSERT INTO yard(b_id,msw_id,area,lat,loong,app_waste)
                    VALUES ($basicId,$last_id,$area,$lat,$long,$app_waste)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }

        $query = "INSERT INTO msw_emi(b_id,fc_id,co2,ch4,n2o)
        VALUES ($basicId,$last_id,$carbonco2,$carbonch4,$carbonn2o)";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    } else {
        $row = mysqli_fetch_array($result);
        $last_id = $row['id'];
        $query = "UPDATE  msw_data set msw_gen=$msw_gen,msw_col=$msw_col,t_comp=$t_comp,
                        t_disp=$t_disp,t_incin=$t_incin,n_yard=$n_yard WHERE b_id='" . $basicId . "'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        for ($i = 0; $i < sizeof($yardData); $i++) {
            $area = $yardData[$i]->area;
            $lat = $yardData[$i]->lat;
            $long = $yardData[$i]->long;
            $app_waste = $yardData[$i]->app_waste;
            $query = "UPDATE yard set area=$area,lat=$lat,loong=$long,
                    app_waste=$app_waste WHERE b_id='" . $basicId . "' AND msw_id=$last_id";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }

        $query = "UPDATE  msw_emi set co2=$carbonco2,ch4=$carbonch4,n2o=$carbonn2o
        WHERE b_id='" . $basicId . "'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    }
echo  "success";