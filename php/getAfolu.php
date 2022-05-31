<?php
include 'conn.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$basicId = $data->basicId;
$tablearray = ["crop_emi", "forest_data","live_data"];
$dataArrayN = array();



         $query2 = "SELECT ifnull(ch4, 0) + ifnull(n2o, 0) + ifnull(co2, 0) as ItemSum FROM crop_emi WHERE b_id='" . $basicId . "'";
         $emiresult = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
         $rowcount = mysqli_num_rows($emiresult);
         if ($rowcount != 0) {
             $row = mysqli_fetch_array($emiresult);
             $cropEmi = $row['ItemSum'];
         }
         $query2 = "SELECT ifnull(ch4, 0) + ifnull(n2o, 0) + ifnull(co2, 0) as ItemSum FROM forest_emi WHERE b_id='" . $basicId . "'";
         $emiresult = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
         $rowcount = mysqli_num_rows($emiresult);
         if ($rowcount != 0) {
             $row = mysqli_fetch_array($emiresult);
             $forestEmi = $row['ItemSum'];
         }
         $query2 = "SELECT ifnull(ch4, 0) + ifnull(n2o, 0) + ifnull(co2, 0) as ItemSum FROM live_emi WHERE b_id='" . $basicId . "'";
         $emiresult = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
         $rowcount = mysqli_num_rows($emiresult);
         if ($rowcount != 0) {
             $row = mysqli_fetch_array($emiresult);
             $liveEmi = $row['ItemSum'];
         }
         $cropEmi=round($cropEmi,2);
         $forestEmi=round($forestEmi,2);
         $liveEmi=round($liveEmi,2);
         $inteArray = array();
         $inteArray ['ctcyear'] =  "2022";
         $inteArray ['bauemi'] = $cropEmi+$liveEmi-$forestEmi;
         $inteArray ['intervemi'] =$cropEmi+$liveEmi-$forestEmi;
         array_push($dataArrayN, $inteArray);
               
                //  echo  $forestEmis;
                  

         ///Before emission 2030 Crop
         $t30=2030-date("Y");
         $cropBau2030 =$cropEmi * (pow((1+(0.87/100)),$t30));
          //  echo "\cropB2030", $cropBau2030;
         ////After intervention emission 2030
        $cropint2030 =0.9 * $cropBau2030;
            // echo "\cropint2030", $cropint2030;
        ///Before emission 2030 Forest
        $forBau2030 =$forestEmi * (pow((1+(0.66/100)),$t30));
          // echo "\ForB2030", $forBau2030;
        ////After intervention emission 2030
        $forint2030 = $forBau2030;
        //  echo "\Forint2030", $forint2030;

         ///Before emission 2030 Live
         $livBau2030 =$liveEmi * (pow((1-(1/100)),$t30));
          //  echo "\liveB2030", $livBau2030;
         ////After intervention emission 2030
         $livint2030 = 0.95 * $livBau2030;
          //  echo "\liveint030", $livint2030;

         $totalBauEmi = $cropBau2030+$livBau2030-$forBau2030;
         $totalIntEmi = $cropint2030+$livint2030-$forint2030;
                $totalBauEmi=round($totalBauEmi,2);
                $totalIntEmi=round($totalIntEmi,2);
         $inteArray = array();
         $inteArray ['ctcyear'] =  "2030";
         $inteArray ['bauemi'] = $totalBauEmi;
         $inteArray ['intervemi'] =$totalIntEmi;
         array_push($dataArrayN, $inteArray);
      
        ///Before emission 2050 Crop
        $t50=2050-date("Y");
        $cropBau2050 =$cropint2030 * (pow((1+(0.87/100)),20));
        // echo "\cropB2050", $cropBau2050;
        ////After intervention emission 2050
       $cropint2050 =0.4 * $cropBau2050;
        //  echo "\cropint2050", $cropint2050;
       ///Before emission 2050 Forest
       $forBau2050 =$forestEmi * (pow((1+(0.66/100)),$t50));
      //  echo "\ForB2050", $forBau2050;
       ////After intervention emission 2050
       $forint2050 =$forBau2050;
        // echo "\Forint2050", $forint2050;

        ///Before emission 2030 Live
        $livBau2050 =$livint2030 * (pow((1-(1/100)),20));
        // echo "\liveB2050", $livBau2050;
        ////After intervention emission 2050
        $livint2050 = 0.4 * $livBau2050;
        // echo "\liveint2050", $livint2050;
        
        $totalBauEmi50 = $cropBau2050+$livBau2050-$forBau2050;
        $totalIntEmi50 = $cropint2050+$livint2050-$forint2050;
           $totalBauEmi50=round($totalBauEmi50,2);
           $totalIntEmi50=round($totalIntEmi50,2);
        $inteArray = array();
        $inteArray ['ctcyear'] =  "2050";
        $inteArray ['bauemi'] = $totalBauEmi50;
        $inteArray ['intervemi'] =$totalIntEmi50;
        array_push($dataArrayN, $inteArray);

          $sizeof = sizeof($dataArrayN);
              foreach ($dataArrayN as $row) {
                $ctcyear =  $row['ctcyear'];
                $bauemi =  $row['bauemi'];
                $intervemi =  $row['intervemi'];
        
                // $query = "INSERT INTO bau(b_id,type,ctcyear,bauemi,intervemi)
                //   VALUES ($basicId,'".'AFOLU'."',$ctcyear,$bauemi,$intervemi)";
                //   $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

            $query2 = "SELECT * FROM bau WHERE b_id='" . $basicId . "' AND type='".'AFOLU'."' AND ctcyear='".$ctcyear."'";
            $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
            $rowcount = mysqli_num_rows($result);
            if ($rowcount == 0) {           
            $query = "INSERT INTO bau(b_id,type,ctcyear,bauemi,intervemi)
            VALUES ($basicId,'".'AFOLU'."',$ctcyear,$bauemi,$intervemi)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            }

            else
            {
            $query = "UPDATE  bau set bauemi=$bauemi,intervemi=$intervemi
            WHERE b_id='" . $basicId . "' AND type='".'AFOLU'."' AND ctcyear='".$ctcyear."' ";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            }

           }

           echo  "Success";
 ?>