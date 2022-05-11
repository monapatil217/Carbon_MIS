<?php
include 'conn.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$basicId = $data->basicId;
 
         $query2 = "SELECT * FROM crop_emi WHERE b_id='" . $basicId . "'";
  
          $dataArray = array();
          $result = mysqli_query($conn, $query2);
               
        while ($row = mysqli_fetch_array($result)) {
            $cropArray = array();
            $cropArray ['co2'] =  $row['carbonco2'];
            $cropArray ['ch4'] = $row['carbonch4'];
            $cropArray ['n2o'] = $row['carbonn2o'];
            array_push($dataArray, $cropArray);

        }
        
        ///Before emission 2030
        $t30=2030-date("Y");
        $cropBau2030=$carbonco2*(pow(1+(0.87/100)),$t30);
        ////After intervention emission 2030
        $cropint2030=0.9 * $cropBau2030;

        // Before BAU emission 2050
         $t50=2050-date("Y");
         $cropBau2050=$carbonco2*(pow(1+(0.87/100)),$t50);
        /// After intervention emission 2050
        $cropint2050=0.4 * $cropBau2050;

        // echo $cropBau2030;
        // echo $cropint2030;


         $dataArrayN = array();

             $inteArray = array();
            $inteArray ['ctcyear'] =  "2022";
            $inteArray ['bauemi'] = $carbonco2;
            $inteArray ['intervemi'] =0;
            array_push($dataArrayN, $inteArray);

            $inteArray = array();
            $inteArray ['ctcyear'] =  "2030";
            $inteArray ['bauemi'] = $cropBau2030;
            $inteArray ['intervemi'] =$cropint2030;
            array_push($dataArrayN, $inteArray);
           
            $inteArray = array();
            $inteArray ['ctcyear'] =  "2050";
            $inteArray ['bauemi'] = $cropBau2050;
            $inteArray ['intervemi'] =$cropint2050;
            array_push($dataArrayN, $inteArray);

          $sizeof = sizeof($dataArrayN);
           foreach ($dataArrayN as $row) {
          $ctcyear =  $row['ctcyear'];
          $bauemi =  $row['bauemi'];
          $intervemi =  $row['intervemi'];
   
          
          $query = "INSERT INTO bau(b_id,type,ctcyear,bauemi,intervemi)
            VALUES ($basicId,'".'Electricity'."',$ctcyear,$bauemi,$intervemi)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
           }
//     echo  json_encode($interdata);


///forest 
//    $query2 = "SELECT * FROM forest_emi WHERE b_id='" . $basicId . "'";
  
//             $dataArrayf = array();
//           $result = mysqli_query($conn, $query2);
               
//         while ($row = mysqli_fetch_array($result)) {
//        $forestArray = array();
//             $forestArray ['co2'] =  $row['carbonco2'];
//             $forestArray ['ch4'] = $row['carbonch4'];
//             $forestArray ['n2o'] = $row['carbonn2o'];
//             array_push($dataArrayf, $forestArray);

//         }
        
//          ///Before emission 2030
//         $t30=2030-date("Y");
//         $forestBau2030=$carbonco2*(pow(1+(0.66/100)),$t30);

//         ////After intervention emission 2030
//         $forestint2030=0.9 * $forestBau2030;
       
//         // Before BAU emission 2050
//          $t50=2050-date("Y");
//          $forestBau2050=$carbonco2*(pow(1+(0.66/100)),$t50);
         
//         /// After intervention emission 2050
//         $forestint2050=0.4 * $forestBau2050;



//          $dataArrayff = array();

//              $fArray = array();
//             $fArray ['ctcyear'] =  "2022";
//             $fArray ['bauemi'] = $carbonco2;
//             $fArray ['intervemi'] =0;
//             array_push($dataArrayff, $fArray);

                //  $fArray = array();
//             $fArray ['ctcyear'] =  "2030";
//             $fArray ['bauemi'] = $forestBau2030;
//             $fArray ['intervemi'] =$forestint2030;
//             array_push($dataArrayff, $fArray);
           
            //   $fArray = array();
//             $fArray ['ctcyear'] =  "2050";
//             $fArray ['bauemi'] = $forestBau2050;
//             $fArray ['intervemi'] =$forestint2050;
//             array_push($dataArrayff, $fArray);

//           $sizeof = sizeof($dataArrayff);
//            foreach ($dataArrayff as $row) {
//           $ctcyear =  $row['ctcyear'];
//           $bauemi =  $row['bauemi'];
//           $intervemi =  $row['intervemi'];
   
          
//           $query = "INSERT INTO bau(b_id,type,ctcyear,bauemi,intervemi)
//             VALUES ($basicId,'".'Electricity'."',$ctcyear,$bauemi,$intervemi)";
//             $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
//            }


/////livestock
//  $query2 = "SELECT * FROM live_emi WHERE b_id='" . $basicId . "'";
  
//             $dataArrayl = array();
//           $result = mysqli_query($conn, $query2);
               
//         while ($row = mysqli_fetch_array($result)) {
//        $liveArray = array();
//             $liveArray ['co2'] =  $row['carbonco2'];
//             $liveArray ['ch4'] = $row['carbonch4'];
//             $liveArray ['n2o'] = $row['carbonn2o'];
//             array_push($dataArrayl, $liveArray);

//         }
        
//          ////before emission
//         $t30=2030-date("Y");
//         $liveBau2030=$carbonch4*(pow(1-(1/100)),$t30);
//         ////After intervention emission 2030
//         $liveint2030=0.95 * $liveBau2030;
       
//         // Before BAU emission 2050
//          $t50=2050-date("Y");
//          $liveBau2050=$carbonch4*(pow(1-(1/100)),$t50);
//         /// After intervention emission 2050
//         $liveint2050=0.4 * $liveBau2050;


//          $dataArrayll = array();

//              $lArray = array();
//             $dataArrayll ['ctcyear'] =  "2022";
//             $dataArrayll ['bauemi'] = $carbonch4;
//             $dataArrayll ['intervemi'] =0;
//             array_push($dataArrayll, $lArray);

//              $lArray = array();
//             $dataArrayll ['ctcyear'] =  "2030";
//             $dataArrayll ['bauemi'] = $liveBau2030;
//             $dataArrayll ['intervemi'] =$liveint2030;
//             array_push($dataArrayll, $lArray);
           
//              $lArray = array();
//             $dataArrayll ['ctcyear'] =  "2050";
//             $dataArrayll ['bauemi'] = $liveBau2050;
//             $dataArrayll ['intervemi'] =$liveint2050;
//             array_push($dataArrayll, $lArray);

//           $sizeof = sizeof($dataArrayll);
//            foreach ($dataArrayll as $row) {
//           $ctcyear =  $row['ctcyear'];
//           $bauemi =  $row['bauemi'];
//           $intervemi =  $row['intervemi'];
   
          
//           $query = "INSERT INTO bau(b_id,type,ctcyear,bauemi,intervemi)
//             VALUES ($basicId,'".'Electricity'."',$ctcyear,$bauemi,$intervemi)";
//             $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
//            }

// ?>