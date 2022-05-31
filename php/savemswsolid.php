<?php
include 'conn.php';
//require "session.php";
$json = file_get_contents('php://input');
$data = json_decode($json);

//basic info table
$basicId = $data->basicId;
$msw_gen = $data->msw_gen;
$msw_col = $data->msw_col;
$t_comp = $data->t_comp;
$t_disp = $data->t_disp;
$n_yard = $data->n_yard;
$t_incin = $data->t_incin;
$yardData = $data->yardData;
$last_id = 0;


$carbonco2 = 0;
$carbonch4 = 0;
$carbonn2o = 0;

//strart calaculation

//compost calculation
  $carbonch4 =((($t_comp*1000*4*365)/1000000))/1000000;
  $carbonn2o =(($t_comp*1000*0.24*365)/1000000)/1000000;
  
 
//inenration calculation
  $carbonco2 =round(($t_incin*0.001*0.5*0.3*0.36*3.66*1000*365)/1000000,2);
  $carbonch4 +=(($t_incin*0.001*0.2*365)/1000)/1000000;
  $carbonn2o += ((($t_incin*0.001*50*365)/1000)/1000000);

  
//landfiled
  $carbonch4 +=($t_disp*0.001*0.18*0.25*0.6*(16/12)*1000*365)/1000000;

  $carbonch4 =round($carbonch4,2);
  $carbonn2o =round($carbonn2o,2);
 
  

   $dataArrayN = array();
         $inteArray = array();
         $inteArray ['ctcyear'] =  "2022";
         $inteArray ['bauemi'] = $carbonco2 + ($carbonch4 * 21) + ($carbonn2o * 310);
         $inteArray ['intervemi'] =$carbonco2 + ($carbonch4 * 21) + ($carbonn2o * 310);
         array_push($dataArrayN, $inteArray);

   
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

        $query = "INSERT INTO msw_emi(b_id,msw_id,co2,ch4,n2o)
        VALUES ($basicId,$last_id,$carbonco2,$carbonch4,$carbonn2o)";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    } else {
        $row = mysqli_fetch_array($result);
        $last_id = $row['id'];
        $query = "UPDATE  msw_data set msw_gen=$msw_gen,msw_col=$msw_col,t_comp=$t_comp,
                        t_disp=$t_disp,t_incin=$t_incin,n_yard=$n_yard WHERE b_id='" . $basicId . "'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $delquery = "DELETE FROM yard WHERE b_id='" . $basicId . "'";
        $result = mysqli_query($conn, $delquery) or die(mysqli_error($conn));
       // $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        for ($i = 0; $i < sizeof($yardData); $i++) {
            $area = $yardData[$i]->area;
            $lat = $yardData[$i]->lat;
            $long = $yardData[$i]->long;
            $app_waste = $yardData[$i]->app_waste;
            $query = "INSERT INTO yard(b_id,msw_id,area,lat,loong,app_waste)
            VALUES ($basicId,$last_id,$area,$lat,$long,$app_waste)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }

        $query = "UPDATE  msw_emi set co2=$carbonco2,ch4=$carbonch4,n2o=$carbonn2o
        WHERE b_id='" . $basicId . "'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    }

    //before composting and landfill value  
         ///Before emission 2030 MSW
         $t30=2030-date("Y");
         $mswBau2030 = $msw_gen * (pow((1+(1.3/100)),$t30));
         //landfill emission
         $mBAUlandf2030=$mswBau2030 * 0.59;
          //composting emission
          $mBAUcomp2030=$mswBau2030 * 0.05;
          //incenration emission
           $mBAUincen2030=$mswBau2030 * 0.09;


        // $totBau2030=$mBAUlandf2030 + $mBAUcomp2030;
        ///for emission purpose
         $finBau2030co2 = 0;
         $finBau2030ch4 = 0;
         $finBau2030n2o = 0;

        ///composting
          $finBau2030ch4 =((($mBAUcomp2030*1000*4*365)/1000000))/1000000;
          $finBau2030n2o =(($mBAUcomp2030*1000*0.24*365)/1000000)/1000000;
 
          ////incenration
          $finBau2030co2 =round(($mBAUincen2030*0.001*0.5*0.3*0.36*3.66*1000*365)/1000000,2);
          $finBau2030ch4 +=(($mBAUincen2030*0.001*0.2*365)/1000)/1000000;
          $finBau2030n2o += ((($mBAUincen2030*0.001*50*365)/1000)/1000000);

          /// ladfill
           $finBau2030ch4 +=($mBAUlandf2030*0.001*0.18*0.25*0.6*(16/12)*1000*365)/1000000;

         //final emission BAU 2030
        
        $totBau2030=$finBau2030co2 + ($finBau2030ch4 * 21) + ($finBau2030n2o * 310);
        $totBau2030=round($totBau2030,2);
        
         ////After intervention emission 2030
        $mIntland2030 =$mswBau2030 * 0.45;

        $mIntcomp2030=$mswBau2030 * 0.20;

          $mIntincen2030=$mswBau2030 * 0.09;

      
        $finInt2030co2 = 0;
         $finInt2030ch4 = 0;
         $finInt2030n2o = 0;

      ///composting 
          $finInt2030ch4 =((($mIntcomp2030*1000*4*365)/1000000))/1000000;
          $finInt2030n2o =(($mIntcomp2030*1000*0.24*365)/1000000)/1000000;
 
          ////incenration
          $finInt2030co2 =round(($mIntincen2030*0.001*0.5*0.3*0.36*3.66*1000*365)/1000000,2);
          $finInt2030ch4 +=(($mIntincen2030*0.001*0.2*365)/1000)/1000000;
          $finInt2030n2o += ((($mIntincen2030*0.001*50*365)/1000)/1000000);

          /// ladfill
           $finInt2030ch4 +=($mIntland2030*0.001*0.18*0.25*0.6*(16/12)*1000*365)/1000000;
           //final emission Intervention 2030
           $finInt2030ch4N=$finInt2030ch4 * 21;
           $finInt2030n2oN=$finInt2030n2o * 310;
          //  $totInt2030=$finInt2030co2 + $finInt2030ch4 + $finInt2030n2o;
            $totInt2030=$finInt2030co2 + $finInt2030ch4N + $finInt2030n2oN;
             $totInt2030=round($totInt2030,2);

         
         $inteArray = array();
         $inteArray ['ctcyear'] =  "2030";
         $inteArray ['bauemi'] = $totBau2030;
         $inteArray ['intervemi'] =$totInt2030;
         array_push($dataArrayN, $inteArray);
   
        ///2050
        ///before emission 2050 MSW
         $t50=2050-date("Y");
        $mswBau2050 = $msw_gen * (pow((1+(1.3/100)),$t50));
        //landfill emission
         $mBAUlandf2050=$mswBau2050 * 0.59;
         //composting emission
         $mBAUcomp2050=$mswBau2050 * 0.05;
         //incenration emission
          $mBAUincen2050=$mswBau2050 * 0.09;


         $finBau2050co2 = 0;
         $finBau2050ch4 = 0;
         $finBau2050n2o = 0;
         
        ///composting 
          $finBau2050ch4 =((($mBAUcomp2050*1000*4*365)/1000000))/1000000;
          $finBau2050n2o =(($mBAUcomp2050*1000*0.24*365)/1000000)/1000000;
 
          ////incenration
          $finBau2050co2 =round(($mBAUincen2050*0.001*0.5*0.3*0.36*3.66*1000*365)/1000000,2);
          $finBau2050ch4 +=(($mBAUincen2050*0.001*0.2*365)/1000)/1000000;
          $finBau2050n2o += ((($mBAUincen2050*0.001*50*365)/1000)/1000000);

          /// ladfill
           $finBau2050ch4 +=($mBAUlandf2050*0.001*0.18*0.25*0.6*(16/12)*1000*365)/1000000;
            //final emission BAU 2050
           $totBau2050=$finBau2050co2 + ($finBau2050ch4 * 21) + ($finBau2050n2o * 310);
            $totBau2050=round($totBau2050,2);


            ////After intervention emission 2030
           $mIntland2050 =$mswBau2050 * 0.18;
           $mIntcomp2050 =$mswBau2050 * 0.51;
           $mIntincen2050 =$mswBau2050 * 0.09;


        
         $finInt2050co2 = 0;
         $finInt2050ch4 = 0;
         $finInt2050n2o = 0;

      ///composting 
          $finInt2050ch4 =((($mIntcomp2050*1000*4*365)/1000000))/1000000;
          $finInt2050n2o =(($mIntcomp2050*1000*0.24*365)/1000000)/1000000;
 
          ////incenration
          $finInt2050co2 =round(($mIntincen2050*0.001*0.5*0.3*0.36*3.66*1000*365)/1000000,2);
          $finInt2050ch4 +=(($mIntincen2050*0.001*0.2*365)/1000)/1000000;
          $finInt2050n2o += ((($mIntincen2050*0.001*50*365)/1000)/1000000);

          /// ladfill
           $finInt2050ch4 +=($mIntland2050*0.001*0.18*0.25*0.6*(16/12)*1000*365)/1000000;
             //final emission Intervention 2050
           $totInt2050=$finInt2050co2 + ($finInt2050ch4 * 21) + ($finInt2050n2o * 310);
           $totInt2050=round($totInt2050,2);

         $inteArray = array();
         $inteArray ['ctcyear'] =  "2050";
         $inteArray ['bauemi'] = $totBau2050;
         $inteArray ['intervemi'] =$totInt2050;
         array_push($dataArrayN, $inteArray);


            $sizeof = sizeof($dataArrayN);
              foreach ($dataArrayN as $row) {
                $ctcyear =  $row['ctcyear'];
                $bauemi =  $row['bauemi'];
                $intervemi =  $row['intervemi'];
       
                // $query = "INSERT INTO bau(b_id,type,ctcyear,bauemi,intervemi)
                //   VALUES ($basicId,'".'Waste'."',$ctcyear,$bauemi,$intervemi)";
                //   $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $query2 = "SELECT * FROM bau WHERE b_id='" . $basicId . "' AND type='".'WasteWater'."' AND ctcyear='".$ctcyear."'";
            $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
            $rowcount = mysqli_num_rows($result);
            if ($rowcount == 0) {           
            $query = "INSERT INTO bau(b_id,type,ctcyear,bauemi,intervemi)
            VALUES ($basicId,'".'WasteWater'."',$ctcyear,$bauemi,$intervemi)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            }

            else
            {
            $query = "UPDATE  bau set bauemi=$bauemi,intervemi=$intervemi
            WHERE b_id='" . $basicId . "' AND type='".'WasteWater'."' AND ctcyear='".$ctcyear."' ";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            }
           }

echo  "success";