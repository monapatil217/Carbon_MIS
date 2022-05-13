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

$carbonco22030 = 0;
$carbonch42030 = 0;
$carbonn2o2030 = 0;

$carboncoAfter22030 = 0;
$carbonch4After2030 = 0;
$carbonn2oAfter2030 = 0;

$carbonco2Before2050 = 0;
$carbonch4Before2050 = 0;
$carbonn2oBefore2050 = 0;

$carboncoAAfter22050 = 0;
$carbonch4After2050 = 0;
$carbonn2oAfter2050 = 0;

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
               $carbonco2 += ($value* $ncv * $co2*0.001*1)/1000;
               $carbonch4 += ($value* $ncv * $ch4 *0.001*1)/1000;
               $carbonn2o += ($value*$ncv * $n2o *0.001*1)/1000;
               //echo"<br> ".$name."==".$value."ch4==".$carbonch4."<br>ncv".$ncv."<br>ef".$ch4."<br>  ";
        }
}
//end calculation
//echo $carbonco2."<br>ch4".$carbonch4."<br>n2o".$carbonn2o;
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
        //intervention 
// Coal $coal;
        //BAU
        $coalQty2030 = $coal*(pow((1+(7.6/100)),8));
      
        // 2030 inter
        $coalQtyIt2030 = 0.75 * $coalQty2030;
        

        $coalQty2050 = $coalQtyIt2030*(pow((1+(7.6/100)),20));

        // 2050 inter
        $coalQtyIt2050 = 0.25 * $coalQty2050;

        // echo "\n\n coalQtyIt 2050-->".$coalQty2050;


//Fo $fo;
        //BAU
        $foQty2030 = $fo*(pow((1+(7.6/100)),8));
       

        // 2030 inter
        $foQtyIt2030 =  0 * $foQty2030;
        

        $foQty2050 = $foQtyIt2030*(pow((1+(7.6/100)),20));

        // 2050 inter
        $foQtyIt2050 =  0 * $foQty2050; 

//LDO $ido;
        //BAU
        $ldoQty2030 = $ido*(pow((1+(7.6/100)),8));
       

        // 2030 inter
        $ldoQtyIt2030 =  $ldoQty2030;
        

        $ldoQty2050 = $ldoQtyIt2030*(pow((1+(7.6/100)),20));

        // 2050 inter
        $ldoQtyIt2050 = 0.5 * $ldoQty2050; 

//Briquette $briq;
        //BAU
        $briqQty2030 = $briq*(pow((1+(7.6/100)),8));
       
        // 2030 inter
        // $briqQtyIt2030 =   $briqQty2030;
         
        $briqQty2050 = $briqQty2030*(pow((1+(7.6/100)),20));

        // 2050 inter
        $briqQtyIt2050 =  0 * $briqQty2050;
//HSD $hsd;
        //BAU
        $hsdQty2030 = $hsd*(pow((1+(7.6/100)),8));
      
        // 2030 inter
        $hsdQtyIt2030 =  $hsdQty2030;
         

        $hsdQty2050 = $hsdQtyIt2030*(pow((1+(7.6/100)),20));

        // 2050 inter
        $hsdQtyIt2050 = 0.5 * $hsdQty2050;

//Wood  $wood;
        //BAU
        $woodQty2030 = $wood*(pow((1+(7.6/100)),8));
        
        // 2030 inter
        $woodQtyIt2030 =  0;
         

        $woodQty2050 = $woodQtyIt2030*(pow((1+(7.6/100)),20));

        // 2050 inter
        $woodQtyIt2050 =  0 * $woodQty2050;

//NG $ng;
        //BAU
        $ngQty2030 = $ng*(pow((1+(7.6/100)),8));
        $ngQty2050 = $ng*(pow((1+(7.6/100)),28));
        // echo "\n\n BAU ngQty2030-->".$ngQty2030;

//PNG $png;
        //BAU
        $pngQty2030 = $png*(pow((1+(7.6/100)),8));
     
        // echo "\n\n BAU pngQty2030-->".$pngQty2030;


        //Inter 2030 PNG = pngQty 
        $pngQty2030Coal = $coalQty2030 * 0.25 * 1000 * 4300 * 0.76 / ( 1000* 8500);
        $pngQty2030Fo = $foQty2030 * 1 * 1000 * 10500 * 0.76 / ( 1000* 8500);
        $pngQty2030Wood = $woodQty2030 * 1 * 1000 * 5000 * 0.76 / ( 1000* 8500);

        $totalPngIt2030 = $pngQty2030 + $pngQty2030Coal + $pngQty2030Fo + $pngQty2030Wood;

        $pngQty2050 = $totalPngIt2030*(pow((1+(7.6/100)),20));
       


        //Inter 2050 PNG = pngQty 
        $pngQty2050Coal = $coalQty2050 * 0.75 * 1000 * 4300 * 0.76 / ( 1000 * 8500);
        $pngQty2050Fo = $foQty2050 * 1 * 1000 * 10500 * 0.76 / ( 1000 * 8500);
        $pngQty2050Wood = $woodQty2050 * 1 * 1000 * 5000 * 0.76 / ( 1000 * 8500);
        $pngQty2050Briq = $briqQty2050 * 1 * 1000 * 4214 * 0.76 / ( 1000 * 8500);
        $pngQty2050HSD = $hsdQty2050 * 0.5 * 1000 * 10800 * 0.76 / ( 1000 * 8500);
        $pngQty2050Ldo = $ldoQty2050 * 0.5 * 1000 * 10400 * 0.76 / ( 1000 * 8500);

        $totalPngIt2050 = $pngQty2050 + $pngQty2050Coal + $pngQty2050Fo  + $pngQty2050Wood + $pngQty2050Briq +  $pngQty2050HSD + $pngQty2050Ldo;
        // echo "\n\n total Png It 2050 pngQty2050-->".$pngQty2050;
        // echo "\n\n pngQty2050Coal-->". $pngQty2050Coal."\n\n pngQty2050Fo-->". $pngQty2050Fo."\n\n pngQty2050Wood-->".$pngQty2050Wood."\n\n pngQty2050Briq-->".$pngQty2050Briq."\n\n pngQty2050HSD-->".$pngQty2050HSD."\n\n pngQty2050Ldo-->".$pngQty2050Ldo;


 //end intervention 

//  Before 2030
        $finalArrayEeBefore2030 = array();
        //strart calaculation
        $eeArrayCoalBefore2030 = array();
        $eeArrayCoalBefore2030['name'] =  "Coal";
        $eeArrayCoalBefore2030['value'] = $coalQty2030;
        array_push($finalArrayEeBefore2030, $eeArrayCoalBefore2030);
        $eeArrayPNGBefore2030 = array();
        $eeArrayPNGBefore2030['name'] =  "PNG";
        $eeArrayPNGBefore2030['value'] = $pngQty2030;
        array_push($finalArrayEeBefore2030, $eeArrayPNGBefore2030);
        $eeArrayFOBefore2030 = array();
        $eeArrayFOBefore2030['name'] =  "FO";
        $eeArrayFOBefore2030['value'] = $foQty2030;
        array_push($finalArrayEeBefore2030, $eeArrayFOBefore2030);
        $eeArrayNGBefore2030 = array();
        $eeArrayNGBefore2030['name'] =  "NG";
        $eeArrayNGBefore2030['value'] = $ngQty2030;
        array_push($finalArrayEeBefore2030, $eeArrayNGBefore2030);
        $eeArrayLDOBefore2030 = array();
        $eeArrayLDOBefore2030['name'] =  "LDO";
        $eeArrayLDOBefore2030['value'] = $ldoQty2030;
        array_push($finalArrayEeBefore2030, $eeArrayLDOBefore2030);
        $eeArrayBRIBefore2030 = array();
        $eeArrayBRIBefore2030['name'] =  "BRI";
        $eeArrayBRIBefore2030['value'] = $briqQty2030;
        array_push($finalArrayEeBefore2030, $eeArrayBRIBefore2030);
        $eeArrayHSDBefore2030 = array();
        $eeArrayHSDBefore2030['name'] =  "HSD";
        $eeArrayHSDBefore2030['value'] = $hsdQty2030;
        array_push($finalArrayEeBefore2030, $eeArrayHSDBefore2030);
        $eeArrayWOODBefore2030 = array();
        $eeArrayWOODBefore2030['name'] =  "WOOD";
        $eeArrayWOODBefore2030['value'] = $woodQty2030;
        array_push($finalArrayEeBefore2030, $eeArrayWOODBefore2030);
        foreach ($finalArrayEeBefore2030 as $row) {
                $name =  $row['name'];
                $value =  $row['value'];
                $query2 = "SELECT * FROM ef_fuel where fuel_name='" . $name . "'";
                $result = mysqli_query($conn, $query2);
                while ($row = mysqli_fetch_array($result)) {
                        $ncv =  $row['ncv'];
                        $co2 =  $row['co2'];
                        $ch4 =  $row['ch4'];
                        $n2o =  $row['n2o'];
                        // echo "\n\n total It Emi Before 2030 type-->".$name."  value".$value;
                       $carbonco22030 += ($value* $ncv * $co2*0.001*1*365)/1000000;
                       $carbonch42030 += ($value* $ncv * $ch4 *21*0.001*1*365)/1000000;
                       $carbonn2o2030 += ($value*$ncv * $n2o *310*0.001*1*365)/1000000;

                       //echo"<br> ".$name."==".$value."ch4==".$carbonch4."<br>ncv".$ncv."<br>ef".$ch4."<br>  ";
                }
        }
        $totalItEmiBefore2030 = $carbonco22030  + $carbonch42030 + $carbonn2o2030;
        echo "\n\n total It Emi Before 2030 -->".$totalItEmiBefore2030;
        // end Before 2030

        //  After 2030
        $finalArrayEeAfter2030 = array();
        //strart calaculation
        $eeArrayCoalAfter2030 = array();
        $eeArrayCoalAfter2030['name'] =  "Coal";
        $eeArrayCoalAfter2030['value'] = $coalQtyIt2030;
        array_push($finalArrayEeAfter2030, $eeArrayCoalAfter2030);
        $eeArrayPNGAfter2030 = array();
        $eeArrayPNGAfter2030['name'] =  "PNG";
        $eeArrayPNGAfter2030['value'] = $totalPngIt2030;
        array_push($finalArrayEeAfter2030, $eeArrayPNGAfter2030);
        $eeArrayFOAfter2030 = array();
        $eeArrayFOAfter2030['name'] =  "FO";
        $eeArrayFOAfter2030['value'] = $foQtyIt2050;
        array_push($finalArrayEeAfter2030, $eeArrayFOAfter2030);
        $eeArrayNGAfter2030 = array();
        $eeArrayNGAfter2030['name'] =  "NG";
        $eeArrayNGAfter2030['value'] = $ng;
        array_push($finalArrayEeAfter2030, $eeArrayNGAfter2030);
        $eeArrayLDOAfter2030 = array();
        $eeArrayLDOAfter2030['name'] =  "LDO";
        $eeArrayLDOAfter2030['value'] = $ldoQty2030;
        array_push($finalArrayEeAfter2030, $eeArrayLDOAfter2030);
        $eeArrayBRIAfter2030 = array();
        $eeArrayBRIAfter2030['name'] =  "BRI";
        $eeArrayBRIAfter2030['value'] = $briqQty2030;
        array_push($finalArrayEeAfter2030, $eeArrayBRIAfter2030);
        $eeArrayHSDAfter2030 = array();
        $eeArrayHSDAfter2030['name'] =  "HSD";
        $eeArrayHSDAfter2030['value'] = $hsdQty2030;
        array_push($finalArrayEeAfter2030, $eeArrayHSDAfter2030);
        $eeArrayWOODAfter2030 = array();
        $eeArrayWOODAfter2030['name'] =  "WOOD";
        $eeArrayWOODAfter2030['value'] = $woodQtyIt2030;
        array_push($finalArrayEeAfter2030, $eeArrayWOODAfter2030);
        foreach ($finalArrayEeAfter2030 as $row) {
                $name =  $row['name'];
                $value =  $row['value'];
                $query2 = "SELECT * FROM ef_fuel where fuel_name='" . $name . "'";
                $result = mysqli_query($conn, $query2);
                while ($row = mysqli_fetch_array($result)) {
                        $ncv =  $row['ncv'];
                        $co2 =  $row['co2'];
                        $ch4 =  $row['ch4'];
                        $n2o =  $row['n2o'];
                        // echo "\n\n total It Emi After 2030 type-->".$name."  value".$value;
                       $carboncoAfter22030 += ($value* $ncv * $co2*0.001*1*365)/1000000;
                       $carbonch4After2030 += ($value* $ncv * $ch4 *21*0.001*1*365)/1000000;
                       $carbonn2oAfter2030 += ($value*$ncv * $n2o *310*0.001*1*365)/1000000;
                       //echo"<br> ".$name."==".$value."ch4==".$carbonch4."<br>ncv".$ncv."<br>ef".$ch4."<br>  ";
                }
        }
        $totalItEmiAfter2050 = ($carboncoAfter22030) + $carbonch4After2030 + $carbonn2oAfter2030;
        echo "\n\n total It Emi After 2030 -->".$totalItEmiAfter2050;
        // end After 2030


        //  Before 2050
        $finalArrayEeBefore2050 = array();
        //strart calaculation
        $eeArrayCoalBefore2050 = array();
        $eeArrayCoalBefore2050['name'] =  "Coal";
        $eeArrayCoalBefore2050['value'] = $coalQty2050;
        array_push($finalArrayEeBefore2050, $eeArrayCoalBefore2050);
        $eeArrayPNGBefore2050 = array();
        $eeArrayPNGBefore2050['name'] =  "PNG";
        $eeArrayPNGBefore2050['value'] = $pngQty2050;
        array_push($finalArrayEeBefore2050, $eeArrayPNGBefore2050);
        $eeArrayFOBefore2050 = array();
        $eeArrayFOBefore2050['name'] =  "FO";
        $eeArrayFOBefore2050['value'] = $foQty2050;
        array_push($finalArrayEeBefore2050, $eeArrayFOBefore2050);
        $eeArrayNGBefore2050 = array();
        $eeArrayNGBefore2050['name'] =  "NG";
        $eeArrayNGBefore2050['value'] = $ngQty2050;
        array_push($finalArrayEeBefore2050, $eeArrayNGBefore2050);
        $eeArrayLDOBefore2050 = array();
        $eeArrayLDOBefore2050['name'] =  "LDO";
        $eeArrayLDOBefore2050['value'] = $ldoQty2050;
        array_push($finalArrayEeBefore2050, $eeArrayLDOBefore2050);
        $eeArrayBRIBefore2050 = array();
        $eeArrayBRIBefore2050['name'] =  "BRI";
        $eeArrayBRIBefore2050['value'] = $briqQty2050;
        array_push($finalArrayEeBefore2050, $eeArrayBRIBefore2050);
        $eeArrayHSDBefore2050 = array();
        $eeArrayHSDBefore2050['name'] =  "HSD";
        $eeArrayHSDBefore2050['value'] = $hsdQty2050;
        array_push($finalArrayEeBefore2050, $eeArrayHSDBefore2050);
        $eeArrayWOODBefore2050 = array();
        $eeArrayWOODBefore2050['name'] =  "WOOD";
        $eeArrayWOODBefore2050['value'] = $woodQty2050;
        array_push($finalArrayEeBefore2050, $eeArrayWOODBefore2050);
        foreach ($finalArrayEeBefore2050 as $row) {
                $name =  $row['name'];
                $value =  $row['value'];
                $query2 = "SELECT * FROM ef_fuel where fuel_name='" . $name . "'";
                $result = mysqli_query($conn, $query2);
                while ($row = mysqli_fetch_array($result)) {
                        $ncv =  $row['ncv'];
                        $co2 =  $row['co2'];
                        $ch4 =  $row['ch4'];
                        $n2o =  $row['n2o'];
                        // echo "\n\n total It Emi Before 2050 type-->".$name."  value".$value;
                       $carbonco2Before2050 += ($value* $ncv * $co2*0.001*1*365)/1000000;
                       $carbonch4Before2050 += ($value* $ncv * $ch4 *21*0.001*1*365)/1000000;
                       $carbonn2oBefore2050 += ($value*$ncv * $n2o *310*0.001*1*365)/1000000;
                       //echo"<br> ".$name."==".$value."ch4==".$carbonch4."<br>ncv".$ncv."<br>ef".$ch4."<br>  ";
                }
        }
        $totalItEmiBefore2050 = ($carbonco2Before2050) + $carbonch4Before2050 + $carbonn2oBefore2050;
        echo "\n\n total It Emi Before 2050 -->".$totalItEmiBefore2050;
        // end Before 2050

        //  After 2050
        $finalArrayEeAfter2050 = array();
        //strart calaculation
        $eeArrayCoalAfter2050 = array();
        $eeArrayCoalAfter2050['name'] =  "Coal";
        $eeArrayCoalAfter2050['value'] = $pngQty2050Coal;
        array_push($finalArrayEeAfter2050, $eeArrayCoalAfter2050);
        $eeArrayPNGAfter2050 = array();
        $eeArrayPNGAfter2050['name'] =  "PNG";
        $eeArrayPNGAfter2050['value'] = $pngQty2050;
        array_push($finalArrayEeAfter2050, $eeArrayPNGAfter2050);
        $eeArrayFOAfter2050 = array();
        $eeArrayFOAfter2050['name'] =  "FO";
        $eeArrayFOAfter2050['value'] = $pngQty2050Fo;
        array_push($finalArrayEeAfter2050, $eeArrayFOAfter2050);
        $eeArrayNGAfter2050 = array();
        $eeArrayNGAfter2050['name'] =  "NG";
        $eeArrayNGAfter2050['value'] = $ngQty2050;
        array_push($finalArrayEeAfter2050, $eeArrayNGAfter2050);
        $eeArrayLDOAfter2050 = array();
        $eeArrayLDOAfter2050['name'] =  "LDO";
        $eeArrayLDOAfter2050['value'] = $ldoQty2050;
        array_push($finalArrayEeAfter2050, $eeArrayLDOAfter2050);
        $eeArrayBRIAfter2050 = array();
        $eeArrayBRIAfter2050['name'] =  "BRI";
        $eeArrayBRIAfter2050['value'] = $briqQty2050;
        array_push($finalArrayEeAfter2050, $eeArrayBRIAfter2050);
        $eeArrayHSDAfter2050 = array();
        $eeArrayHSDAfter2050['name'] =  "HSD";
        $eeArrayHSDAfter2050['value'] = $hsdQty2050;
        array_push($finalArrayEeAfter2050, $eeArrayHSDAfter2050);
        $eeArrayWOODAfter2050 = array();
        $eeArrayWOODAfter2050['name'] =  "WOOD";
        $eeArrayWOODAfter2050['value'] = $pngQty2050Wood;
        array_push($finalArrayEeAfter2050, $eeArrayWOODAfter2050);
        foreach ($finalArrayEeAfter2050 as $row) {
                $name =  $row['name'];
                $value =  $row['value'];
                $query2 = "SELECT * FROM ef_fuel where fuel_name='" . $name . "'";
                $result = mysqli_query($conn, $query2);
                while ($row = mysqli_fetch_array($result)) {
                        $ncv =  $row['ncv'];
                        $co2 =  $row['co2'];
                        $ch4 =  $row['ch4'];
                        $n2o =  $row['n2o'];
                       $carboncoAAfter22050 += ($value* $ncv * $co2*0.001*1*365)/1000000;
                       $carbonch4After2050 += ($value* $ncv * $ch4 *21*0.001*1*365)/1000000;
                       $carbonn2oAfter2050 += ($value*$ncv * $n2o *310*0.001*1*365)/1000000;
                       //echo"<br> ".$name."==".$value."ch4==".$carbonch4."<br>ncv".$ncv."<br>ef".$ch4."<br>  ";
                }
        }
        $totalItEmiAfter2050 = ($carboncoAAfter22050* 0.25) + $carbonch4After2050 + $carbonn2oAfter2050;
        echo "\n\n total It Emi After 2050 -->".$totalItEmiAfter2050;
        // end After 2050
        