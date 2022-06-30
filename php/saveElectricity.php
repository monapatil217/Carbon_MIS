<?php
include 'conn.php';
//require "session.php";
$json = file_get_contents('php://input');
$data = json_decode($json);

//basic info table
$basicId = $data->basicId;
$r_elec = $data->r_elec;
$c_elec = $data->c_elec;

$agree_elec = $data->agree_elec;
$indu_elec = $data->indu_elec;
$munc_elec = $data->munc_elec;

// $s_elec = $data->s_elec;
$sl_elec = $data->sl_elec;
 
$ele = $r_elec+$c_elec+$agree_elec+$indu_elec+$munc_elec+$sl_elec;
$emissionPerDay;
$carbonco2;$carbonch4;$carbonn2o;
$value = $ele * 700;
$value1 = $value * 0.64;
$totalfuel = $value1 / 1000000;
$query1 = "SELECT * FROM ef_fuel where fuel_name='NonCookingCoal'";
$result = mysqli_query($conn, $query1);
while ($row = mysqli_fetch_array($result)) {
    $ncv =  $row['ncv'];
    $co2 =  $row['co2'];
    $ch4 =  $row['ch4'];
    $n2o =  $row['n2o'];
    $carbonco2 = ($totalfuel * $ncv * $co2 * 12)/1000000;
    $carbonch4 = ($totalfuel * $ncv * $ch4 * 21 *12)/1000000;
    $carbonn2o = ($totalfuel * $n2o * 310 * $ncv * 12)/1000000;
}
$carbonco2=round($carbonco2,2);
$carbonch4=round($carbonch4,2);
$carbonn2o=round($carbonn2o,2);

///2022 before intervention
$emi2022=$carbonco2+$carbonch4+$carbonn2o;
$emi2022=round($emi2022,2);
// echo "\ 2022co2:", $carbonco2;
// echo "\ 2022ch4:", $carbonch4;
// echo "\ 2022n2o:", $carbonn2o;
// echo "\ 2022:", $emi2022;
        $query2 = "SELECT * FROM ele_data WHERE b_id='" . $basicId . "'";
        $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            $query = "INSERT INTO ele_data(b_id,r_elec,c_elec,agree_elec,indu_elec,munc_elec,sl_elec)
            VALUES ($basicId,$r_elec,$c_elec,$agree_elec,$indu_elec,$munc_elec,$sl_elec)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
             $eleid = mysqli_insert_id($conn);
             $query = "INSERT INTO ele_emi(b_id,e_id,co2,ch4,n2o)
            VALUES ($basicId,$eleid,$carbonco2,$carbonch4,$carbonn2o)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }else{
            $query = "UPDATE  ele_data set r_elec=$r_elec,c_elec=$c_elec,agree_elec=$agree_elec,indu_elec=$indu_elec,munc_elec=$munc_elec,
                      sl_elec=$sl_elec WHERE b_id='".$basicId."'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $query = "UPDATE  ele_emi set co2=$carbonco2,ch4=$carbonch4,n2o=$carbonn2o
                       WHERE b_id='".$basicId."'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }



        // Emission for 2030 AND 2050
        $t30=2030-date("Y");
        $eleUse30=pow((1+(5/100)),$t30);
        $eleUse2030=$ele*$eleUse30;
        //  echo $eleUse2030;

        // $t50=2050-date("Y");
        // $eleUse50=pow((1+(5/100)),$t50);
        // $eleUse2050=$ele*$eleUse50;

        $emissionYears = array();
        $emissionYears[] = $eleUse2030;
        // $emissionYears[] = $eleUse2050;       
        // $beforemi2030=0;
       
        $emissionYear = array();
        for($i=0;$i<sizeof($emissionYears);$i++){  
              $emissionPerDay;
            $electricity =  $emissionYears[$i];
            $carbonco2;$carbonch4;$carbonn2o;
            $value = $electricity * 700;
            $value1 = $value * 0.64;
            $totalfuel = $value1 / 1000000;
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
           
            //BEFORE intervention
         
          
            $beforemi2030 = $carbonco2 + $carbonch4 + $carbonn2o;  
            $emissionYear[$i=0]=$beforemi2030; 
        //    echo "\B2030:", $beforemi2030;
            //    $beforemi2050=$carbonco2 + $carbonch4 + $carbonn2o;
           //     $emissionYear[$i=1]=$beforemi2050;
                    
            // echo "\n mmmmm",$beforemi2030."</br>";
            // echo $beforemi2030;
            // echo $carbonco2;
            
            // echo "\n ",$beforemi2050."</br>";
            // echo $beforemi2050;
            //  $emissionYear[$i]=$beforemi2030;
            // $emissionYear[$i]=$beforemi2050;
 
            //  echo $beforemi2050;
       
            //  $beforemi2050=$carbonco2 + $carbonch4 + $carbonn2o;
            // $emissionYear[$i]=$beforemi2050;
    
        }
       
//         // mmmmmmmmm
 $t50=2050-date("Y");
        $eleUse50=pow((1+(5/100)),$t50);
        $eleUse2050=$ele*$eleUse50;

        $emissionYears = array();
        // $emissionYears[] = $eleUse2030;
        $emissionYears[] = $eleUse2050;       
        // $beforemi2030=0;
        $emissionYear = array();
        for($i=0;$i<sizeof($emissionYears);$i++){

            $emissionPerDay;
            $electricity =  $emissionYears[$i];
            $carbonco2;$carbonch4;$carbonn2o;
            $value = $electricity * 700;
            $value1 = $value * 0.64;
            $totalfuel = $value1 / 1000000;
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
           
            //BEFORE intervention
            // $beforemi2030 = $carbonco2 + $carbonch4 + $carbonn2o;           
            // echo "\n mmmmm",$beforemi2030."</br>";
            // echo $beforemi2030;
            // echo $carbonco2;
             $beforemi2050=$carbonco2 + $carbonch4 + $carbonn2o;
            // echo "\n ",$beforemi2050."</br>";
            // echo $beforemi2050;
            $emissionYear[$i]=$beforemi2050;
            // $emissionYear[$i]=$beforemi2030;
            //   echo "\B2050:", $beforemi2050;
            //  echo $beforemi2050;
        }
      
//         // mmmmmmmm
        // echo "\n ",$beforemi2030."</br>";

        // Kw into Coal 2030 and 2050
        $kwConvert2030=($eleUse2030*700*0.64)/1000000;
        $kwConvert2050=($eleUse2050*700*0.64)/1000000;
       // Kw into Coal 2030 and 2050

       //Coal Policy One 2030
        $coalPolicyOne = $kwConvert2030*0.75;
            $query1 = "SELECT * FROM ef_fuel where fuel_name='NonCookingCoal'";
            $result = mysqli_query($conn, $query1);
            while ($row = mysqli_fetch_array($result)) {
                $ncv =  $row['ncv'];
                $co2 =  $row['co2'];
                $ch4 =  $row['ch4'];
                $n2o =  $row['n2o'];
                $carbonco2030 = ($coalPolicyOne * $ncv * $co2 * 12)/1000000;
                // echo  "\n\n your after intervention 2030 CO2 --> ".$carbonco2030."end</br>";
                $carbonch2030 = ($coalPolicyOne * $ncv * $ch4  *12)/1000000;
                $carbonn2030 = ($coalPolicyOne * $n2o * $ncv * 12)/1000000;
            }
            $carbonco2030=round($carbonco2030,2);
            $carbonch2030=round($carbonch2030,5);
            $carbonn2030=round($carbonn2030,6);

            ///AFTER intervention
            // echo  "\n\n your after intervention 2030 Policy One --> ".$carbonco2030+$carbonch2030+$carbonn2030."";
           // echo "\n Electricity Coal Policy Use in 2030->",$coalPolicyOne;
            //Coal Policy One 2030

        //Coal Policy Two 2030
        $coalPolicyTwo = $carbonco2030*0.75;
        $carbonCoT2030=$coalPolicyTwo;
        // echo  "\n your after intervention 2030 Policy Two --> ".$coalPolicyTwo."";

        //Coal Policy Two 2030

        //Coal Policy Three 2030
        $coalPolicyCoTh2030 = $carbonCoT2030*0.052;
        $coalPolicyChTh2030 = $carbonch2030*0.052;
        $coalPolicyNTh2030 = $carbonn2030*0.052;
        // echo  "\n your after intervention 2030 Policy Three --> ".$coalPolicyThree."";
        $emiPThr2030 = $coalPolicyCoTh2030+$coalPolicyChTh2030 +$coalPolicyNTh2030;
        // echo  "\n your intervention 2030 --> ".$emiPThr2030."";
        $finalEmi2030 = $carbonCoT2030 - $emiPThr2030;
         $finalEmi2030=round( $finalEmi2030,2);
        // echo  "\n your Final intervention 2030 --> ".$finalEmi2030."";
        //Coal Policy Three 2030
            //  echo "\I2030:", $finalEmi2030;
        //Coal Policy One 2050
        $coalPolicyOne = $kwConvert2050*0.25;
            $query1 = "SELECT * FROM ef_fuel where fuel_name='NonCookingCoal'";
            $result = mysqli_query($conn, $query1);
            while ($row = mysqli_fetch_array($result)) {
                $ncv =  $row['ncv'];
                $co2 =  $row['co2'];
                $ch4 =  $row['ch4'];
                $n2o =  $row['n2o'];
                $carbonco2050 = ($coalPolicyOne * $ncv * $co2 * 12)/1000000;
                // echo  "\n\n your after intervention 2030 CO2 --> ".$carbonco2030."end</br>";
                $carbonch2050 = ($coalPolicyOne * $ncv * $ch4  *12)/1000000;
                $carbonn2050 = ($coalPolicyOne * $n2o * $ncv * 12)/1000000;
            }
            $carbonco2050=round($carbonco2050,2);
            $carbonch2050=round($carbonch2050,5);
            $carbonn2050=round($carbonn2050,6);

            // echo  "\n\n your after intervention 2050 Policy One --> ".$carbonco2050+$carbonch2050+$carbonn2050."";
            // echo "\n Electricity Coal Policy Use in 2030->",$coalPolicyOne;
            

            //Coal Policy One 2050


        //Coal Policy Two 2050
         $carboncoPT2050 = $carbonco2050*0.25;
         //$carbonCoT2050=$carboncoPT2050;
        // echo  "\n your after intervention 2050 Policy Two --> ".$carboncoPT2050."";
        //Coal Policy Two 2050
            // $beforemi2050=0;
        //Coal Policy Three 2050
        $carbonCoT2050 = $carboncoPT2050*0.13;
        $coalPolicyChTh2050 = $carbonch2050*0.13;
        $coalPolicyNTh2050 = $carbonn2050*0.13;
        // echo  "\n your after intervention 2030 Policy Three --> ".$coalPolicyThree."";
        $emiPThr2050 = $carbonCoT2050+$coalPolicyChTh2050 +$coalPolicyNTh2050;
        // echo  "\n your intervention 2050 --> ".$emiPThr2050."";
        ////after emission 2050
        $finalEmi2050 = $carboncoPT2050 - $emiPThr2050;
        $finalEmi2050=round($finalEmi2050,2);
        // echo  "\n your Final intervention 2050 --> ".$finalEmi2050."";
        //Coal Policy Three 2050

        // echo "\n\n\n Electricity Use in 2030->",$eleUse2030.'<br>';
        // echo "\n Electricity Use in 2050->",$eleUse2050.'<br>';
        // echo '<pre>'; print_r($emissionYear); echo '</pre>';
            // echo "\I2050:", $finalEmi2050;
        
        // Emission for 2030 AND 2050
      ///////////M///////
            $dataArray = array();

             $inteArray = array();
            $inteArray ['ctcyear'] =  "2022";
            $inteArray ['bauemi'] = $emi2022;
            $inteArray ['intervemi'] =$emi2022;
            array_push($dataArray, $inteArray);

            $inteArray = array();
            $inteArray ['ctcyear'] =  "2030";
            $inteArray ['bauemi'] = $beforemi2030;
            $inteArray ['intervemi'] =$finalEmi2030;
            array_push($dataArray, $inteArray);
           
            $inteArray = array();
            $inteArray ['ctcyear'] =  "2050";
            $inteArray ['bauemi'] = $beforemi2050;
            $inteArray ['intervemi'] =$finalEmi2050;
            array_push($dataArray, $inteArray);

        
          $sizeof = sizeof($dataArray);
           foreach ($dataArray as $row) {
           $ctcyear =  $row['ctcyear'];
           $bauemi =  $row['bauemi'];
           $intervemi =  $row['intervemi'];
   
           
            $query2 = "SELECT * FROM bau WHERE b_id='" . $basicId . "' AND type='".'Electricity'."' AND ctcyear='".$ctcyear."'";
            $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
            $rowcount = mysqli_num_rows($result);
            if ($rowcount == 0) {           
            $query = "INSERT INTO bau(b_id,type,ctcyear,bauemi,intervemi)
            VALUES ($basicId,'".'Electricity'."',$ctcyear,$bauemi,$intervemi)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            }

            else
            {
            $query = "UPDATE  bau set bauemi=$bauemi,intervemi=$intervemi
            WHERE b_id='" . $basicId . "' AND type='".'Electricity'."' AND ctcyear='".$ctcyear."' ";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            }
             
           }  
              echo  "success";
?>