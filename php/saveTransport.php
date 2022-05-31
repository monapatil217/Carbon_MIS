<?php
include 'conn.php';
//require "session.php";
$json = file_get_contents('php://input');
$data = json_decode($json);

//basic info table
$basicId = $data->basicId;
$w2 = $data->w2;
$w3 = $data->w3;
$w4 = $data->w4;
$bus = $data->bus;
$tempo = $data->tempo;
$truck = $data->truck;
$flight = $data->flight;
$train = $data->train;

$petrol4W = $w4*0.20;
$desel4W = $w4*0.30;
$cnj4W = $w4*0.50;
$petrol3W = $w3*0.21;
$desel3W = $w3*0.57;
$cng3W = $w3*0.22;

$carbonco2 = 0;
$carbonch4 = 0;
$carbonn2o = 0;

$carbonco2beforeEmi2030 = 0;
$carbonch4beforeEmi2030 = 0;
$carbonn2obeforeEmi2030 = 0; 


$carbonco2afterEmi2030 = 0;
$carbonch4afterEmi2030 = 0;
$carbonn2oafterEmi2030 = 0;


$carbonco2beforEmi2050 = 0;
$carbonch4beforEmi2050 = 0;
$carbonn2obeforEmi2050 = 0;


$carbonco2afterEmi2050 = 0;
$carbonch4afterEmi2050 = 0;
$carbonn2oafterEmi2050 = 0;


$ef = 0;
$emission = 0;
$dataArray = array();

$vehiArray = array();
$vehiArray['fuleType'] =  "Petrol";
$vehiArray['vehicleType'] = "2W";
$vehiArray['km'] = $w2;
array_push($dataArray, $vehiArray);

$vehiArray = array();
$vehiArray['fuleType'] =  "Petrol";
$vehiArray['vehicleType'] = "3W";
$vehiArray['km'] = $petrol3W;
array_push($dataArray, $vehiArray);
$vehiArray = array();
$vehiArray['fuleType'] =  "Diesel";
$vehiArray['vehicleType'] = "3W";
$vehiArray['km'] = $desel3W;
array_push($dataArray, $vehiArray);
$vehiArray = array();
$vehiArray['fuleType'] =  "CNG";
$vehiArray['vehicleType'] = "3W";
$vehiArray['km'] = $cng3W;
array_push($dataArray, $vehiArray);

$vehiArray = array();
$vehiArray['fuleType'] =  "Petrol";
$vehiArray['vehicleType'] = "4W";
$vehiArray['km'] = $petrol4W;
array_push($dataArray, $vehiArray);
$vehiArray = array();
$vehiArray['fuleType'] =  "Diesel";
$vehiArray['vehicleType'] = "4W";
$vehiArray['km'] = $desel4W;
array_push($dataArray, $vehiArray);
$vehiArray = array();
$vehiArray['fuleType'] =  "CNG";
$vehiArray['vehicleType'] = "4W";
$vehiArray['km'] = $cnj4W;
array_push($dataArray, $vehiArray);

$vehiArray = array();
$vehiArray['fuleType'] =  "CNG";
$vehiArray['vehicleType'] = "bus";
$vehiArray['km'] = $bus;
array_push($dataArray, $vehiArray);
$vehiArray = array();
$vehiArray['fuleType'] =  "Diesel";
$vehiArray['vehicleType'] = "tempo";
$vehiArray['km'] = $tempo;
array_push($dataArray, $vehiArray);
$vehiArray = array();
$vehiArray['fuleType'] =  "Diesel";
$vehiArray['vehicleType'] = "truck";
$vehiArray['km'] = $truck;
array_push($dataArray, $vehiArray);
$vehiArray = array();
$vehiArray['fuleType'] =  "Coal";
$vehiArray['vehicleType'] = "train";
$vehiArray['km'] = $train;
array_push($dataArray, $vehiArray);
$vehiArray = array();
$vehiArray['fuleType'] =  "ATF";
$vehiArray['vehicleType'] = "flight";
$vehiArray['km'] = $flight;
array_push($dataArray, $vehiArray);

$beforeDataArray2030 = array();


//strart calaculation
$sizeof = sizeof($dataArray);
foreach ($dataArray as $row) {
    $fule =  $row['fuleType'];
    $vehical =  $row['vehicleType'];
    $km1 =  $row['km'];
    
    $query1 = "SELECT * FROM travel_fuel WHERE type_of_vehicle = '$vehical' AND type_of_fuel='$fule'";
    $result = mysqli_query($conn, $query1);
    while ($row = mysqli_fetch_array($result)) {
        $approx_fuel = $row['approx_fuel'];
        $density = $row['density'];
        $vkt = $row['vkt'];
        $km1=($km1 *$vkt)/1000;
        $query2 = "SELECT * FROM ef_travel_fuel WHERE type_of_fuel='$fule'";
        $result = mysqli_query($conn, $query2);
        while ($row = mysqli_fetch_array($result)) {
            $ncv   = $row['ncv'];
            $co2ef = $row['co2ef'];
            $ch4ef = $row['ch4ef'];
            $n2oef = $row['n2oef'];
            $carbonco2 += ($km1 *  $approx_fuel * $density * $ncv * $co2ef *365)/1000;
            $carbonch4 += ($km1 *  $approx_fuel * $density * $ncv * $ch4ef *21*365)/1000;
            $carbonn2o += ($km1 *  $approx_fuel * $density * $ncv * $n2oef *310 *365)/1000;

        }
    }
}
        ////2022 final emission of tranport.
        $finalemi2022=$carbonco2 + $carbonch4 + $carbonn2o;
        $finalemi2022=round($finalemi2022,2);
        // echo "2022final:", $finalemi2022;

//end calculation

        $query2 = "SELECT * FROM trans_data WHERE b_id='" . $basicId . "'";
        $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            $query = "INSERT INTO trans_data(b_id,w2,w3,w4,bus,tempo,truck,flight,train)
            VALUES ($basicId,$w2,$w3,$w4,$bus,$tempo,$truck,$flight,$train)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $t_id = mysqli_insert_id($conn);

            $query = "INSERT INTO trans_emi(b_id,t_id,co2,ch4,n2o)
            VALUES ($basicId,$t_id,$carbonco2,$carbonch4,$carbonn2o)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        } else {
            $query = "UPDATE  trans_data set w2=$w2,w3=$w3,w4=$w4,bus=$bus,
            tempo=$tempo,truck=$truck,flight=$flight,train=$train WHERE b_id='" . $basicId . "'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

            $query = "UPDATE  trans_emi set co2=$carbonco2,ch4=$carbonch4,n2o=$carbonn2o
            WHERE b_id='" . $basicId . "'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        }




//echo  "success";
            //intervention 

            // Two Wheerer
            $t25=2025-date("Y");
            $w25= ($w2 *(pow((1+(10.22/100)),$t25)))-$w2;
            $w25 =($w25 * 0.90)+$w2;

            // Three Wheerer
            $trW25 =2025-date("Y");
            $tW2025= ($w3 *(pow((1+(2.78/100)),$trW25)))-$w3;
            $tW2025 =($tW2025 * 0.80)+$w3; 

            //LMV 
            $lMV25 =2025-date("Y");
            $lMV2025= ($tempo *(pow((1+(5.44/100)),$lMV25)));

            // HCV 
            $hCV25 =2025-date("Y");
            $hCV2025= ($truck *(pow((1+(8.76/100)),$hCV25)));

            //BUS $bus=100
            $bus25 =2025-date("Y");
            $cityBusRatio = $bus * 0.83;
            $msrtcRatio = $bus * 0.16;
            $cityBus2025= ($cityBusRatio *(pow((1+(11/100)),$bus25)))-$cityBusRatio;
            $cityBus2025 =($cityBus2025 * 0.75)+$cityBusRatio;
            $Msrtc2025= ($msrtcRatio *(pow((1+(2/100)),$bus25)))-$msrtcRatio;
            $Msrtc2025 =($Msrtc2025 * 0.85)+$msrtcRatio;
            $bus2025 = $cityBus2025 + $Msrtc2025;
            // echo "citybus" ,$cityBus2025;
            //  echo "Msrtcbus" ,$Msrtc2025;


            //Four Wheerer $w4=100
            $fw25 =2025-date("Y");
            $petrolRatio = $w4 * 0.29;
            $diselRatio = $w4 * 0.13;
            $cngRatio = $w4 * 0.50;
            $taxiRatio = $w4 * 0.08;

            $petrol2025= ($petrolRatio *(pow((1+(6.83/100)),$fw25)))-$petrolRatio;
            $petrol2025 =($petrol2025 * 0.95) + $petrolRatio;
            $disel2025= ($diselRatio *(pow((1+(6.83/100)),$fw25)))-$diselRatio;
            $disel2025 =($disel2025 * 0.95) + $diselRatio;
            $cng2025= ($cngRatio *(pow((1+(6.83/100)),$fw25)))-$cngRatio;
            $cng2025 =($cng2025 * 0.95) + $cngRatio;
            $taxi2025= ($taxiRatio *(pow((1+(6.83/100)),$fw25)))-$taxiRatio;
            $taxi2025 =($taxi2025 * 0.75) + $taxiRatio;
            $cngtaxi2050 = $cng2025 + $taxi2025;

            //end Intervantion

        //2030 intervantion Start
        // find Population 2030 
        $query1 = "SELECT popu FROM basic_info WHERE id = '$basicId'";
        $result = mysqli_query($conn, $query1);
        while ($row = mysqli_fetch_array($result)) {
            $CurrentPopulation = $row['popu'];   
            }
        $PopYear =2030-date("Y");
        $population2030 = ($CurrentPopulation * (pow((1+(1.164/100)),$PopYear)));
        // find Population 2030 
        //   echo "currentpop:",$CurrentPopulation;
        //     echo "pop2030:",$population2030;

        // Policy


        
        //  Two Wheeler

        // EV Policy
        //A(BAU)         (Number of Vehicle) = factor * (2030 Population)
        $tw30 = 0.325*$population2030; //A

        //B         (EV Applied) 
        $tWP2030= 0.7*($tw30-$w25);
        $tWIT2030 = $w25+$tWP2030;


        //4POlicy   (Congestion + Non Mension + Subsidizesion + Shared Transport) 
        $conTw2030 = $w25 - $w25*(pow((1-(0.5/100)),5));
        $nonMoterTw2030 = $w25 - $w25*(pow((1-(0.5/100)),5));
        $subsiTw2030 = $w25 - $w25*(pow((1-(1/100)),5));
        $shtransTw2030 = $w25 - $w25*(pow((1-(1/100)),5));
        $FPolicyTw2030 = $conTw2030+$nonMoterTw2030+$subsiTw2030+$shtransTw2030;
        //Scrapage 
        $scrapTw2030 = ($tw30 - $w25) * 0.8;

        //Total Intervension 2030 for Two Wheeler
        $InerTotal2030 = $tWIT2030 - $FPolicyTw2030 - $scrapTw2030;
        // end two wheeler


 //  four Wheeler
        // EV Policy 
        $totalw4 = $w4;
        //A(BAU)         (Number of Vehicle) = factor * (2030 Population)    
        $fWDisel = 0.008 * $population2030; //A
        $fWPetrol = 0.019 * $population2030; //A
        $fWCng = 0.032 * $population2030; //A
        $fWTexi = 0.005 * $population2030; //A
        $fWCngTaxi = $fWCng + $fWTexi;

        $vehiArrayFwPetrolBefore2030 = array();
        $vehiArrayFwPetrolBefore2030['fuleType'] =  "Petrol";
        $vehiArrayFwPetrolBefore2030['vehicleType'] = "4W";
        $vehiArrayFwPetrolBefore2030['km'] = $fWPetrol;
        array_push($beforeDataArray2030, $vehiArrayFwPetrolBefore2030);

        $vehiArrayFwBeforeDiesel2030 = array();
        $vehiArrayFwBeforeDiesel2030 ['fuleType'] =  "Diesel";
        $vehiArrayFwBeforeDiesel2030 ['vehicleType'] = "4W";
        $vehiArrayFwBeforeDiesel2030['km'] = $fWDisel;
        array_push($beforeDataArray2030, $vehiArrayFwBeforeDiesel2030);

        $vehiArrayFwBeforeCNG2030 = array();
        $vehiArrayFwBeforeCNG2030['fuleType'] =  "CNG";
        $vehiArrayFwBeforeCNG2030['vehicleType'] = "4W";
        $vehiArrayFwBeforeCNG2030['km'] = $fWCngTaxi;  
        array_push($beforeDataArray2030, $vehiArrayFwBeforeCNG2030);

        //B         (EV Applied) 
        $fWPOlicy1Disel = 0.9 * ($fWDisel - $disel2025);
        $fWDiselIT2030 = $disel2025 + $fWPOlicy1Disel;

        $fWPOlicy1Petrol = 0.9 * ($fWPetrol - $petrol2025);
        $fWPetrolIT2030 = $petrol2025 + $fWPOlicy1Petrol;

        $fWPOlicy1Cng = 0.9 * ($fWCng - $cng2025);
        $fWCngIT2030 = $cng2025 + $fWPOlicy1Cng;

        $fWPOlicy1Texi = 0.5 * ($fWTexi - $taxi2025);
        $fWTexiIT2030 = $taxi2025 + $fWPOlicy1Texi;

        //4POlicy
        //4POlicy Disel
        $conFWDisel2030 = $disel2025 - $disel2025*(pow((1-(0.5/100)),5));
        $nonMoterFWDisel2030 = $disel2025 - $disel2025*(pow((1-(0.5/100)),5));
        $subsiFWDisel2030 = $disel2025 - $disel2025*(pow((1-(1/100)),5));
        $shtransFWDisel2030 = $disel2025 - $disel2025*(pow((1-(1/100)),5));

        $FPolicyFWDisel2030 = $conFWDisel2030 + $nonMoterFWDisel2030 + $subsiFWDisel2030 + $shtransFWDisel2030;
        //4POlicy Petrol
        $conFWPetrol2030 = $petrol2025 - $petrol2025*(pow((1-(0.5/100)),5));
        $nonMoterFWPetrol2030 = $petrol2025 - $petrol2025*(pow((1-(0.5/100)),5));
        $subsiFWPetrol2030 = $petrol2025 - $petrol2025*(pow((1-(1/100)),5));
        $shtransFWPetrol2030 = $petrol2025 - $petrol2025*(pow((1-(1/100)),5));

        $FPolicyFWPetrol2030 = $conFWPetrol2030 + $nonMoterFWPetrol2030 + $subsiFWPetrol2030 + $shtransFWPetrol2030;
        //4POlicy Cng
        $conFWCng2030 = $cng2025 - $cng2025*(pow((1-(0.5/100)),5));
        $nonMoterFWCng2030 = $cng2025 - $cng2025*(pow((1-(0.5/100)),5));
        $subsiFWCng2030 = $cng2025 - $cng2025*(pow((1-(1/100)),5));
        $shtransFWCng2030 = $cng2025 - $cng2025*(pow((1-(1/100)),5));

        $FPolicyFWCng2030 = $conFWCng2030 + $nonMoterFWCng2030 + $subsiFWCng2030 + $shtransFWCng2030;
        //4POlicy Texi
        $conFWTexi2030 = $taxi2025 - $taxi2025*(pow((1-(0.5/100)),5));
        $nonMoterFWTexi2030 = $taxi2025 - $taxi2025*(pow((1-(0.5/100)),5));
        $subsiFWTexi2030 = $taxi2025 - $taxi2025*(pow((1-(1/100)),5));
        $shtransFWTexi2030 = $taxi2025 - $taxi2025*(pow((1-(1/100)),5));

        $FPolicyFWDTexi2030 = $conFWTexi2030 + $nonMoterFWTexi2030 + $subsiFWTexi2030 + $shtransFWTexi2030;
        //Scrapage  
        $scrapDisel2030 = ($fWDisel - $disel2025)*0.8;
        $scrapPetrol2030 = ($fWPetrol - $petrol2025)*0.8;
        $scrapCng2030 = ($fWCng - $cng2025)*0.8;
        $scrapTexi2030 = ($fWTexi - $taxi2025)*0.8;
        //Total Intervension 2030 for Four Wheeler
        $InerTotalDisel2030 = $fWDiselIT2030 - $FPolicyFWDisel2030 - $scrapDisel2030;
        $InerTotalPetrol2030 = $fWPetrolIT2030 - $FPolicyFWPetrol2030 - $scrapPetrol2030;
        $InerTotalCng2030 = $fWCngIT2030 - $FPolicyFWCng2030 - $scrapCng2030;
        $InerTotalTexi2030 = $fWTexiIT2030 - $FPolicyFWDTexi2030 - $scrapTexi2030;
        $InerTotalCng2030 = $InerTotalCng2030 + $InerTotalTexi2030;
        // end four wheeler

        //Three Wheeler
        // EV Policy 
        //A(BAU)
        $trw30 = 0.014*$population2030; //A
        //B
        $trWP2030= 0.75*($trw30-$tW2025);
        $trWIT2030 = $tW2025+$trWP2030;
       //Scrapage 
       $scrapTrw2030 = ($trw30-$tW2025) * 0.8;
        //Total Intervension 2030 for Three Wheeler
       $InerTotalTrW2030 = $trWIT2030 - $scrapTrw2030;
        //end 3W Wheeler

        //  HCV 
        // EV Policy 
        $hcv30 = 0.019*$population2030; //A(BAU)
        // end HCV

        // LCV 
        // EV Policy 
        $lcv30 = 0.026*$population2030; //A(BAU)
        // end LCV

        // Buses
        // EV Policy            
        $cityBuses = 0.001 * $population2030; //A(BAU)
        $msrtc = 0.0002 * $population2030; //A(BAU)

        $Buses2030 = $cityBuses + $msrtc;

        $vehiArrayFwBeforeBus2030 = array();
        $vehiArrayFwBeforeBus2030['fuleType'] =  "CNG";
        $vehiArrayFwBeforeBus2030['vehicleType'] = "bus";
        $vehiArrayFwBeforeBus2030['km'] = $Buses2030;  
        array_push($beforeDataArray2030, $vehiArrayFwBeforeBus2030);

        // echo "\n\n BeforeBus2030 of city Buses-->",$cityBuses;
        // echo "\n\n BeforeBus2030 of msrtc-->",$msrtc;

        
        
        //     $cityBusRatio / $msrtcRatio//B 
        $fWPOlicy1cityBus = 0.5 * ($cityBuses - $cityBusRatio);

        $fWcityBuslIT2030 = $cityBusRatio + $fWPOlicy1cityBus;

        $fWPOlicy1Msrtc = 0.25 * ($msrtc - $msrtcRatio);

        $fWMsrtcIT2030 = $msrtcRatio + $fWPOlicy1Msrtc;
       


        $totalCityBus = $fWcityBuslIT2030 + $fWMsrtcIT2030;
        // echo "\n\n Intervation Total 2030 City Bus-->",$totalCityBus;
        // echo "\n\n AfterBus2030 of city Buses-->",$fWcityBuslIT2030;
        // echo "\n\n AfterBus2030 of msrtc-->",$fWMsrtcIT2030;

        // echo "citybusssssssssss",$fWcityBuslIT2030;
// end Buses

//end 

        $dataArrayBefore2030 = array();
        $dataArrayAfter2030 = array();
        // Before 2030 Array
        // Two Wheeler Before 2030 
        $vehiArrayTwBefore2030 = array();
        $vehiArrayTwBefore2030['fuleType'] =  "Petrol";
        $vehiArrayTwBefore2030['vehicleType'] = "2W";
        $vehiArrayTwBefore2030['km'] = $tw30;
        array_push($dataArrayBefore2030, $vehiArrayTwBefore2030);


        //Three wheeler Before 2030
        $vehiArrayTwBefore2030 = array();
        $vehiArrayTwBefore2030['fuleType'] =  "CNG";
        $vehiArrayTwBefore2030['vehicleType'] = "3W";
        $vehiArrayTwBefore2030['km'] = $trw30;
        array_push($dataArrayBefore2030, $vehiArrayTwBefore2030);


        //LMV Before 2030
        $vehiArrayTwBefore2030 = array();
        $vehiArrayTwBefore2030['fuleType'] =  "Diesel";
        $vehiArrayTwBefore2030['vehicleType'] = "tempo";
        $vehiArrayTwBefore2030['km'] = $lcv30;
        array_push($dataArrayBefore2030, $vehiArrayTwBefore2030);


        // HCV Before 2030
        $vehiArrayTwBefore2030 = array();
        $vehiArrayTwBefore2030['fuleType'] =  "Diesel";
        $vehiArrayTwBefore2030['vehicleType'] = "truck";
        $vehiArrayTwBefore2030['km'] = $hcv30;
        array_push($dataArrayBefore2030, $vehiArrayTwBefore2030);

        //BUS Before 2030
        $vehiArrayTwBefore2030 = array();
        $vehiArrayTwBefore2030['fuleType'] =  "CNG";
        $vehiArrayTwBefore2030['vehicleType'] = "bus";
        $vehiArrayTwBefore2030['km'] = $Buses2030;
        array_push($dataArrayBefore2030, $vehiArrayTwBefore2030);

        //Four Wheller Before 2030
        $vehiArrayFwPetrolBefore2030 = array();
        $vehiArrayFwPetrolBefore2030['fuleType'] =  "Petrol";
        $vehiArrayFwPetrolBefore2030['vehicleType'] = "4W";
        $vehiArrayFwPetrolBefore2030['km'] = $fWPetrol;
        array_push($dataArrayBefore2030, $vehiArrayFwPetrolBefore2030);
 
        $vehiArrayFwDieselBefore2030 = array();
        $vehiArrayFwDieselBefore2030 ['fuleType'] =  "Diesel";
        $vehiArrayFwDieselBefore2030 ['vehicleType'] = "4W";
        $vehiArrayFwDieselBefore2030['km'] = $fWDisel;
        array_push($dataArrayBefore2030, $vehiArrayFwDieselBefore2030);
 
        $vehiArrayFwCNGBefore2030 = array();
        $vehiArrayFwCNGBefore2030['fuleType'] =  "CNG";
        $vehiArrayFwCNGBefore2030['vehicleType'] = "4W";
        $vehiArrayFwCNGBefore2030['km'] = $fWCngTaxi;  
        array_push($dataArrayBefore2030, $vehiArrayFwCNGBefore2030);

        // echo "2030busesssss", $Buses2030;
      
//strart calaculation beforeEmi2030
        $beforeEmi2030 = 0;
        foreach ($dataArrayBefore2030 as $row) {
            $fule =  $row['fuleType'];
            $vehical =  $row['vehicleType'];
            $km1 =  $row['km'];
            
            $query1 = "SELECT * FROM travel_fuel WHERE type_of_vehicle = '$vehical' AND type_of_fuel='$fule'";
            $result = mysqli_query($conn, $query1);
            while ($row = mysqli_fetch_array($result)) {
                $approx_fuel = $row['approx_fuel'];
                $density = $row['density'];
                $vkt = $row['vkt'];
                $km1=($km1 *$vkt)/1000;
                $query2 = "SELECT * FROM ef_travel_fuel WHERE type_of_fuel='$fule'";
                $result = mysqli_query($conn, $query2);
                while ($row = mysqli_fetch_array($result)) {
                    $ncv   = $row['ncv'];
                    $co2ef = $row['co2ef'];
                    $ch4ef = $row['ch4ef'];
                    $n2oef = $row['n2oef'];
                    $carbonco2beforeEmi2030 += ($km1 *  $approx_fuel * $density * $ncv * $co2ef *365)/1000;
                    $carbonch4beforeEmi2030 += ($km1 *  $approx_fuel * $density * $ncv * $ch4ef *21* 365)/1000;
                    $carbonn2obeforeEmi2030 += ($km1 *  $approx_fuel * $density * $ncv * $n2oef *310* 365)/1000;
                    $beforeEmi2030 = $carbonco2beforeEmi2030 + $carbonch4beforeEmi2030 + $carbonn2obeforeEmi2030;                  
                     $beforeEmi2030=round($beforeEmi2030,2);
                }
               
            }
            
        }
        echo "before Emi 2030:". $beforeEmi2030;
        // echo"\n\n carbon co2 before Emi 2030--> ".$carbonco2beforeEmi2030;
        // echo"\n\n carbon ch4 before Emi 2030--> ".$carbonch4beforeEmi2030;
        // echo"\n\n carbon n2o before Emi 2030--> ".$carbonn2obeforeEmi2030;
        // print_r($dataArrayBefore2030);
  
        // echo "\n\n  Before Emi 2030 -->".$beforeEmi2030;
       
//end calculation beforeEmi2030
        

        // After 2030 Array
        // Two Wheeler After 2030 
        $vehiArrayTwAfter2030 = array();
        $vehiArrayTwAfter2030['fuleType'] =  "Petrol";
        $vehiArrayTwAfter2030['vehicleType'] = "2W";
        $vehiArrayTwAfter2030['km'] = $InerTotal2030;
        array_push($dataArrayAfter2030, $vehiArrayTwAfter2030);


        //Three wheeler After 2030
        $vehiArrayTwAfter2030 = array();
        $vehiArrayTwAfter2030['fuleType'] =  "CNG";
        $vehiArrayTwAfter2030['vehicleType'] = "3W";
        $vehiArrayTwAfter2030['km'] = $InerTotalTrW2030;
        array_push($dataArrayAfter2030, $vehiArrayTwAfter2030);


        //LMV After 2030
        $vehiArrayTwAfter2030 = array();
        $vehiArrayTwAfter2030['fuleType'] =  "Diesel";
        $vehiArrayTwAfter2030['vehicleType'] = "tempo";
        $vehiArrayTwAfter2030['km'] = $lcv30;
        array_push($dataArrayAfter2030, $vehiArrayTwAfter2030);


        // HCV After 2030
        $vehiArrayTwAfter2030 = array();
        $vehiArrayTwAfter2030['fuleType'] =  "Diesel";
        $vehiArrayTwAfter2030['vehicleType'] = "truck";
        $vehiArrayTwAfter2030['km'] = $hcv30;
        array_push($dataArrayAfter2030, $vehiArrayTwAfter2030);

        //BUS After 2030
        $vehiArrayTwAfter2030 = array();
        $vehiArrayTwAfter2030['fuleType'] =  "CNG";
        $vehiArrayTwAfter2030['vehicleType'] = "bus";
        $vehiArrayTwAfter2030['km'] = $bus2025;
        array_push($dataArrayAfter2030, $vehiArrayTwAfter2030);

        //Four Wheller After 2030
        $vehiArrayFwPetrolAfter2030 = array();
        $vehiArrayFwPetrolAfter2030['fuleType'] =  "Petrol";
        $vehiArrayFwPetrolAfter2030['vehicleType'] = "4W";
        $vehiArrayFwPetrolAfter2030['km'] = $InerTotalPetrol2030;
        array_push($dataArrayAfter2030, $vehiArrayFwPetrolAfter2030);
 
        $vehiArrayFwDieselAfter2030 = array();
        $vehiArrayFwDieselAfter2030 ['fuleType'] =  "Diesel";
        $vehiArrayFwDieselAfter2030 ['vehicleType'] = "4W";
        $vehiArrayFwDieselAfter2030['km'] = $InerTotalDisel2030;
        array_push($dataArrayAfter2030, $vehiArrayFwDieselAfter2030);
 
        $vehiArrayFwCNGAfter2030 = array();
        $vehiArrayFwCNGAfter2030['fuleType'] =  "CNG";
        $vehiArrayFwCNGAfter2030['vehicleType'] = "4W";
        $vehiArrayFwCNGAfter2030['km'] = $InerTotalCng2030;  
        array_push($dataArrayAfter2030, $vehiArrayFwCNGAfter2030);
//  echo "vehicle2W:",$InerTotal2030;
//  echo "vehicle3W:",$InerTotalTrW2030;
//  echo "tempo:",$lcv30;
// echo "truck:",$hcv30;
// echo "busssssssssssssss:",$bus2025;
// echo "p4W:",$InerTotalPetrol2030;
// echo "D4W:",$InerTotalDisel2030;
// echo "CNG4w:",$InerTotalCng2030;


        //strart calaculation afterEmi2030
        $afterEmi2030 = 0;
        foreach ($dataArrayAfter2030 as $row) {
            $fule =  $row['fuleType'];
            $vehical =  $row['vehicleType'];
            $km1 =  $row['km'];
            
            $query1 = "SELECT * FROM travel_fuel WHERE type_of_vehicle = '$vehical' AND type_of_fuel='$fule'";
            $result = mysqli_query($conn, $query1);
            while ($row = mysqli_fetch_array($result)) {
                $approx_fuel = $row['approx_fuel'];
                $density = $row['density'];
                $vkt = $row['vkt'];
                $km1=($km1 *$vkt)/1000;
                $query2 = "SELECT * FROM ef_travel_fuel WHERE type_of_fuel='$fule'";
                $result = mysqli_query($conn, $query2);
                while ($row = mysqli_fetch_array($result)) {
                    $ncv   = $row['ncv'];
                    $co2ef = $row['co2ef'];
                    $ch4ef = $row['ch4ef'];
                    $n2oef = $row['n2oef'];
                    $carbonco2afterEmi2030 += ($km1 *  $approx_fuel * $density * $ncv * $co2ef *365)/1000;
                    $carbonch4afterEmi2030 += ($km1 *  $approx_fuel * $density * $ncv * $ch4ef *21* 365)/1000;
                    $carbonn2oafterEmi2030 += ($km1 *  $approx_fuel * $density * $ncv * $n2oef *310* 365)/1000;
                    $afterEmi2030 = $carbonco2afterEmi2030 + $carbonch4afterEmi2030 + $carbonn2oafterEmi2030;
                     $afterEmi2030 =round($afterEmi2030 ,2);
                    
                }
                
            }
            
        }
        //  echo "2030after:", $afterEmi2030;
        // echo"\n\n After 2030 vehicles list";
        // print_r($dataArrayBefore2030);

        // echo "\n\n  After Emi 2030 -->",$afterEmi2030;


//end calculation beforeEmi2030

        // End Intervantion  2030     
            


        //2050 intervantion   
        $PopYear =2050-2030;
        $population2050 = ($population2030 * (pow((1+(1.164/100)),$PopYear)));
        // echo "\n\n 2050 Population-->",$population2050;

        // Policy
        //  Two Wheeler
        // EV Policy
        $tw50 = 0.42*$population2050; //A
        // echo "\n\n 2050 2W before -->",$tw50;
        // $w25;//B
        //4POlicy
        // echo "\n\n 2030 2W after -->",$InerTotal2030;
        $conTw2050 = $InerTotal2030 - $InerTotal2030*(pow((1-(0.5/100)),20));
        $nonMoterTw2050 = $InerTotal2030 - $InerTotal2030*(pow((1-(0.5/100)),20));
        $subsiTw2050 = $InerTotal2030 - $InerTotal2030*(pow((1-(1/100)),20));
        $shtransTw2050 = $InerTotal2030 - $InerTotal2030*(pow((1-(1/100)),20));
        $FPolicyTw2050 =$tw50-($conTw2050+$nonMoterTw2050+$subsiTw2050+$shtransTw2050);//B
        // echo "\n\n 2050 2W 4Policy -->".$conTw2050+$nonMoterTw2050+$subsiTw2050+$shtransTw2050;
        // echo "\n\n 2050 2W B -->".$FPolicyTw2050;
        $diffTw2050=($FPolicyTw2050 - $InerTotal2030)*0.6;//p1
        // echo "\n\n 2050 2W difference -->",$diffTw2050;
        //Scrapage 
        $scrapTw2050 = ($tw50 - $InerTotal2030) * 0.7;
        $totalITTw2050 =($FPolicyTw2050 - $diffTw2050-$scrapTw2050)*1;//(b-p1-scap)*1
        // echo "\n\n 2050 2W scrap-->",$scrapTw2050;
        // echo "\n\n 2050 2W Total -->",$totalITTw2050
        // end two wheeler
        


        //  four Wheeler
        // EV Policy 
        // A
        $fWDisel2050 = 0.01 * $population2050; //A
        $fWPetrol2050 = 0.02 * $population2050; //A
        $fWCng2050 = 0.04 * $population2050; //A
        $fWTexi2050 = 0.0064 * $population2050; //A

        $fWCngTaxi2050 = $fWCng2050 + $fWTexi2050;

        // $vehiArrayFwPetrolBefore2050 = array();
        // $vehiArrayFwPetrolBefore2050['fuleType'] =  "Petrol";
        // $vehiArrayFwPetrolBefore2050['vehicleType'] = "4W";
        // $vehiArrayFwPetrolBefore2050['km'] = $fWPetrol2050;
        // array_push($beforeDataArray2050, $vehiArrayFwPetrolBefore2050);

        // $vehiArrayFwBeforeDiesel2050 = array();
        // $vehiArrayFwBeforeDiesel2050 ['fuleType'] =  "Diesel";
        // $vehiArrayFwBeforeDiesel2050 ['vehicleType'] = "4W";
        // $vehiArrayFwBeforeDiesel2050['km'] = $fWDisel2050;
        // array_push($beforeDataArray2050, $vehiArrayFwBeforeDiesel2050);

        // $vehiArrayFwBeforeCNG2050 = array();
        // $vehiArrayFwBeforeCNG2050['fuleType'] =  "CNG";
        // $vehiArrayFwBeforeCNG2050['vehicleType'] = "4W";
        // $vehiArrayFwBeforeCNG2050['km'] = $fWCngTaxi2050;  
        // array_push($beforeDataArray2050, $vehiArrayFwBeforeCNG2050);

        //4POlicy (1=2+3+4)
        //4POlicy Disel
        $conFWDisel2050 = $InerTotalDisel2030 - $InerTotalDisel2030*(pow((1-(0.5/100)),20));
        $nonMoterFWDisel2050 = $InerTotalDisel2030 - $InerTotalDisel2030*(pow((1-(0.5/100)),20));
        $subsiFWDisel2050 = $InerTotalDisel2030 - $InerTotalDisel2030*(pow((1-(1/100)),20));
        $shtransFWDisel2050 = $InerTotalDisel2030 - $InerTotalDisel2030*(pow((1-(1/100)),20));

        $FPolicyFWDisel2050 = $conFWDisel2050 + $nonMoterFWDisel2050 + $subsiFWDisel2050 + $shtransFWDisel2050;
        //4POlicy Petrol
        $conFWPetrol2050 = $InerTotalPetrol2030 - $InerTotalPetrol2030*(pow((1-(0.5/100)),20));
        $nonMoterFWPetrol2050 = $InerTotalPetrol2030 - $InerTotalPetrol2030*(pow((1-(0.5/100)),20));
        $subsiFWPetrol2050 = $InerTotalPetrol2030 - $InerTotalPetrol2030*(pow((1-(1/100)),20));
        $shtransFWPetrol2050 = $InerTotalPetrol2030 - $InerTotalPetrol2030*(pow((1-(1/100)),20));

        $FPolicyFWPetrol2050 = $conFWPetrol2050 + $nonMoterFWPetrol2050 + $subsiFWPetrol2050 + $shtransFWPetrol2050;
        //4POlicy Cng
        $conFWCng2050 = $InerTotalCng2030 - $InerTotalCng2030*(pow((1-(0.5/100)),20));
        $nonMoterFWCng2050 = $InerTotalCng2030 - $InerTotalCng2030*(pow((1-(0.5/100)),20));
        $subsiFWCng2050 = $InerTotalCng2030 - $InerTotalCng2030*(pow((1-(1/100)),20));
        $shtransFWCng2050 = $InerTotalCng2030 - $InerTotalCng2030*(pow((1-(1/100)),20));

        $FPolicyFWCng2050 = $conFWCng2050 + $nonMoterFWCng2050 + $subsiFWCng2050 + $shtransFWCng2050;
        
        //4POlicy Texi
        // $conFWTexi2050 = $InerTotalTexi2030 - $InerTotalTexi2030*(pow((1-(0.5/100)),5));
        // $nonMoterFWTexi2050 = $InerTotalTexi2030 - $InerTotalTexi2030*(pow((1-(0.5/100)),5));
        // $subsiFWTexi2050 = $InerTotalTexi2030 - $InerTotalTexi2030*(pow((1-(1/100)),5));
        // $shtransFWTexi2050 = $InerTotalTexi2030 - $InerTotalTexi2030*(pow((1-(1/100)),5));

        // $FPolicyFWDTexi2050 = $conFWTexi2050 + $nonMoterFWTexi2050 + $subsiFWTexi2050 + $shtransFWTexi2050;


        // B = A-(4POlicy)
        //Petrol 
        $dif4PolicyPetrol = $fWPetrol2050 - $FPolicyFWPetrol2050;
        // Disel
        $dif4PolicyDisel = $fWDisel2050 - $FPolicyFWDisel2050;
        // CNG
        $dif4PolicyCNG = $fWCng2050 - $FPolicyFWCng2050;
        // Texi
        // $fWTexi2050;


        // Difference = B - 2030Values 
        $diffPetrol2050 =  $dif4PolicyPetrol - $InerTotalPetrol2030;
        $diffDisel2050 = $dif4PolicyDisel - $InerTotalDisel2030;
        $diffCng2050  = $dif4PolicyCNG - $InerTotalCng2030;
        $diffTaxi2050 =  $fWTexi2050 - $InerTotalTexi2030;

        // Policy p1/p2/p3 
        //Petrol
        $policy1Petrol = $diffPetrol2050 * 0.4;
        //Disel 
        $policy1Disel = $diffDisel2050 * 0.4;
        //Cng
        $policy1Cng = $diffCng2050 * 0.4;
        //Texi
        $policy2Texi = $diffTaxi2050 * 0.75;

        //Scrapage
        $scrapDisel2050 = ($fWDisel2050 - $InerTotalDisel2030)*0.7;
        $scrapPetrol2050 = ($fWPetrol2050 - $InerTotalPetrol2030)*0.7;
        $scrapCng2050 = ($fWCng2050 - $InerTotalCng2030)*0.7;
        $scrapTexi2050 = ($fWTexi2050 - $InerTotalTexi2030)*0.7;


        //Intervation Total 2050 = (B-P1-Scap)
        $totalITDisel2050 = ($dif4PolicyDisel - $policy1Disel - $scrapDisel2050)*0.65;
        $totalITPetrol2050 = ($dif4PolicyPetrol - $policy1Petrol - $scrapPetrol2050)*0.65;
        $totalITCng2050 = $diffCng2050 - $policy1Cng - $scrapCng2050;
        $totalITTaxi2050 = ($fWTexi2050 - $policy2Texi - $scrapTexi2050)*0.65;
        $totalITCngTaxi2050 = $totalITCng2050 + $totalITTaxi2050;
        // end four wheeler



        //  3W Wheeler
        // EV Policy 
        // A
        $trw2050 = 0.018*$population2050; //A
        // echo "\n\n Intervation 3W Wheeler Total 2050 population-->".$trw2050;

        //B
        // $trw2050;

        //Difference = B - 2030Value
        $diffTrW2050 = $trw2050 - $InerTotalTrW2030;
        // echo "\n\n Intervation Total 2030 3w Difference-->".$diffTrW2050;

        // Policy p1/p2/p3
        $policy1TrW = $diffTrW2050 * 0.5; 
        // echo "\n\n Intervation Total 2050 Policy P1-->".$policy1TrW;
            
        //Scrapage 
        $scrapTrw2050 = ($trw2050-$InerTotalTrW2030) * 0.7;
        // echo "\n\n Intervation Total 2050 Scrapage-->".$scrapTrw2050;


        //Intervation Total 2030
        $InerTotalTrw2050 = ($trw2050 - $policy1TrW - $scrapTrw2050)*0.4;
        // echo "\n\n Intervation Total 2050 3W Wheeler-->",$InerTotalTrw2050;

        // end 3W Wheeler

        //  HCV 
        // EV Policy 
        $hcvAF2050 = (0.0249*$population2050)*0.25;
         $hcv2050 = (0.0249*$population2050);
        //A
        // echo "\n\n Intervation Total 2050 HCV Total Intervantion-->",$hcv2050;
        // end HCV

        //  LCV 
        // EV Policy 
        $lcvAF2050 = (0.0339*$population2050)*0.4;
         $lcv2050 = (0.0339*$population2050); 
        //A
        // echo "\n\n Intervation Total 2050 LCV Total Intervantion-->",$lcv2050;
        // end LCV

        // Buses
        // EV Policy            
        $cityBuses2050 = 0.0014 * $population2050; //A
        $msrtc2050 = 0.0002 * $population2050; //A
        // echo "\n\n  2050 City Bus-->",$cityBuses2050;
        // echo "\n\n 2050 Msrtc-->",$msrtc2050;

        $buses2050 = $cityBuses2050 + $msrtc2050;
        // B = A
        //Policy P3
        $fWPOlicy1cityBus = 1 * ($cityBuses2050 - $fWcityBuslIT2030);

        $fWcityBuslIT2050 = ($cityBuses2050 - $fWPOlicy1cityBus)*0.5;

        $fWPOlicy1Msrtc = 0.5 * ($msrtc2050 - $fWMsrtcIT2030);

        $fWMsrtcIT2050 = ($msrtc2050 - $fWPOlicy1Msrtc )*0.5;
        $fWBusesIT2050 = $fWcityBuslIT2050 + $fWMsrtcIT2050;

        // echo "\n\n  2030 City Bus-->",$fWcityBuslIT2030;
        // echo "\n\n Intervation Total 2050 City Bus-->",$fWcityBuslIT2050;
        // echo "\n\n Intervation Total 2050 Msrtc-->",$fWMsrtcIT2050;

        // end Buses
            //end 

            $dataArrayBefore2050 = array();
            $dataArrayAfter2050 = array();
            // Before 2050 Array
            // Two Wheeler Before 2050 
            $vehiArrayTwBefore2050 = array();
            $vehiArrayTwBefore2050['fuleType'] =  "Petrol";
            $vehiArrayTwBefore2050['vehicleType'] = "2W";
            $vehiArrayTwBefore2050['km'] = $tw50;
            array_push($dataArrayBefore2050, $vehiArrayTwBefore2050);
    
    
            //Three wheeler Before 2050
            $vehiArrayTwBefore2050 = array();
            $vehiArrayTwBefore2050['fuleType'] =  "CNG";
            $vehiArrayTwBefore2050['vehicleType'] = "3W";
            $vehiArrayTwBefore2050['km'] = $trw2050;
            array_push($dataArrayBefore2050, $vehiArrayTwBefore2050);
    
    
            //LMV Before 2050
            $vehiArrayTwBefore2050 = array();
            $vehiArrayTwBefore2050['fuleType'] =  "Diesel";
            $vehiArrayTwBefore2050['vehicleType'] = "tempo";
            $vehiArrayTwBefore2050['km'] = $lcv2050;
            array_push($dataArrayBefore2050, $vehiArrayTwBefore2050);
    
    
            // HCV Before 2050
            $vehiArrayTwBefore2050 = array();
            $vehiArrayTwBefore2050['fuleType'] =  "Diesel";
            $vehiArrayTwBefore2050['vehicleType'] = "truck";
            $vehiArrayTwBefore2050['km'] = $hcv2050;
            array_push($dataArrayBefore2050, $vehiArrayTwBefore2050);
    
            //BUS Before 2050
            $vehiArrayTwBefore2050 = array();
            $vehiArrayTwBefore2050['fuleType'] =  "CNG";
            $vehiArrayTwBefore2050['vehicleType'] = "bus";
            $vehiArrayTwBefore2050['km'] = $buses2050;
            array_push($dataArrayBefore2050, $vehiArrayTwBefore2050);
    
            //Four Wheller Before 2050
            $vehiArrayFwPetrolBefore2050 = array();
            $vehiArrayFwPetrolBefore2050['fuleType'] =  "Petrol";
            $vehiArrayFwPetrolBefore2050['vehicleType'] = "4W";
            $vehiArrayFwPetrolBefore2050['km'] = $fWPetrol2050;
            array_push($dataArrayBefore2050, $vehiArrayFwPetrolBefore2050);
     
            $vehiArrayFwDieselBefore2050 = array();
            $vehiArrayFwDieselBefore2050 ['fuleType'] =  "Diesel";
            $vehiArrayFwDieselBefore2050 ['vehicleType'] = "4W";
            $vehiArrayFwDieselBefore2050['km'] = $fWDisel2050;
            array_push($dataArrayBefore2050, $vehiArrayFwDieselBefore2050);
     
            $vehiArrayFwCNGBefore2050 = array();
            $vehiArrayFwCNGBefore2050['fuleType'] =  "CNG";
            $vehiArrayFwCNGBefore2050['vehicleType'] = "4W";
            $vehiArrayFwCNGBefore2050['km'] = $fWCngTaxi2050;  
            array_push($dataArrayBefore2050, $vehiArrayFwCNGBefore2050);

            // echo "\n\n  Befor Emi 2050 tw-->",$tw50;
            // echo "\n\n  Befor Emi 2050 thrw-->",$trw2050;
            // echo "\n\n  Befor Emi 2050 lcv-->",$lcv2050;
            // echo "\n\n  Befor Emi 2050 hcv-->",$hcv2050;
            // echo "\n\n  Befor Emi 2050 buses-->",$buses2050;
            // echo "\n\n  Befor Emi 2050 petrol-->",$fWPetrol2050;
            // echo "\n\n  Befor Emi 2050 disel-->",$fWDisel2050;
            // echo "\n\n  Befor Emi 2050 cngtaxi-->",$fWCngTaxi2050;
            
    //strart calaculation beforEmi2050
    $beforEmi2050 = 0;
    foreach ($dataArrayBefore2050 as $row) {
        $fule =  $row['fuleType'];
        $vehical =  $row['vehicleType'];
        $km1 =  $row['km'];
        
        $query1 = "SELECT * FROM travel_fuel WHERE type_of_vehicle = '$vehical' AND type_of_fuel='$fule'";
        $result = mysqli_query($conn, $query1);
        while ($row = mysqli_fetch_array($result)) {
            $approx_fuel = $row['approx_fuel'];
            $density = $row['density'];
            $vkt = $row['vkt'];
            $km1=($km1 *$vkt)/1000;
            $query2 = "SELECT * FROM ef_travel_fuel WHERE type_of_fuel='$fule'";
            $result = mysqli_query($conn, $query2);
            while ($row = mysqli_fetch_array($result)) {
                $ncv   = $row['ncv'];
                $co2ef = $row['co2ef'];
                $ch4ef = $row['ch4ef'];
                $n2oef = $row['n2oef'];
                $carbonco2beforEmi2050 += ($km1 *  $approx_fuel * $density * $ncv * $co2ef *365)/1000;
                $carbonch4beforEmi2050 += ($km1 *  $approx_fuel * $density * $ncv * $ch4ef *21* 365)/1000;
                $carbonn2obeforEmi2050 += ($km1 *  $approx_fuel * $density * $ncv * $n2oef *310* 365)/1000;
                $beforEmi2050 = $carbonco2beforEmi2050 + $carbonch4beforEmi2050 + $carbonn2obeforEmi2050;
                $beforEmi2050=round($beforEmi2050,2); 
            }
           
        }
       
    }
    // echo " Bau2050:", $beforEmi2050 ;
    // echo"\n\n After 2050 vehicles list";
    // print_r($dataArrayBefore2050);

    // echo "\n\n  Befor Emi 2050 -->",$beforEmi2050;


//end calculation beforEmi2050


            // After 2050 Array
            // Two Wheeler After 2050 
            $vehiArrayTwAfter2050 = array();
            $vehiArrayTwAfter2050['fuleType'] =  "Petrol";
            $vehiArrayTwAfter2050['vehicleType'] = "2W";
            $vehiArrayTwAfter2050['km'] = $totalITTw2050;
            array_push($dataArrayAfter2050, $vehiArrayTwAfter2050);
    
    
            //Three wheeler After 2050
            $vehiArrayTwAfter2050 = array();
            $vehiArrayTwAfter2050['fuleType'] =  "CNG";
            $vehiArrayTwAfter2050['vehicleType'] = "3W";
            $vehiArrayTwAfter2050['km'] = $InerTotalTrw2050;
            array_push($dataArrayAfter2050, $vehiArrayTwAfter2050);
    
    
            //LMV After 2050
            $vehiArrayTwAfter2050 = array();
            $vehiArrayTwAfter2050['fuleType'] =  "Diesel";
            $vehiArrayTwAfter2050['vehicleType'] = "tempo";
            $vehiArrayTwAfter2050['km'] = $lcvAF2050;
            array_push($dataArrayAfter2050, $vehiArrayTwAfter2050);
    
    
            // HCV After 2050
            $vehiArrayTwAfter2050 = array();
            $vehiArrayTwAfter2050['fuleType'] =  "Diesel";
            $vehiArrayTwAfter2050['vehicleType'] = "truck";
            $vehiArrayTwAfter2050['km'] = $hcvAF2050;
            array_push($dataArrayAfter2050, $vehiArrayTwAfter2050);
    
            //BUS After 2050
            $vehiArrayTwAfter2050 = array();
            $vehiArrayTwAfter2050['fuleType'] =  "CNG";
            $vehiArrayTwAfter2050['vehicleType'] = "bus";
            $vehiArrayTwAfter2050['km'] = $fWBusesIT2050;
            array_push($dataArrayAfter2050, $vehiArrayTwAfter2050);
    
            //Four Wheller After 2050
            $vehiArrayFwPetrolAfter2050 = array();
            $vehiArrayFwPetrolAfter2050['fuleType'] =  "Petrol";
            $vehiArrayFwPetrolAfter2050['vehicleType'] = "4W";
            $vehiArrayFwPetrolAfter2050['km'] = $totalITPetrol2050;
            array_push($dataArrayAfter2050, $vehiArrayFwPetrolAfter2050);
     
            $vehiArrayFwDieselAfter2050 = array();
            $vehiArrayFwDieselAfter2050 ['fuleType'] =  "Diesel";
            $vehiArrayFwDieselAfter2050 ['vehicleType'] = "4W";
            $vehiArrayFwDieselAfter2050['km'] = $totalITDisel2050;
            array_push($dataArrayAfter2050, $vehiArrayFwDieselAfter2050);
     
            $vehiArrayFwCNGAfter2050 = array();
            $vehiArrayFwCNGAfter2050['fuleType'] =  "CNG";
            $vehiArrayFwCNGAfter2050['vehicleType'] = "4W";
            $vehiArrayFwCNGAfter2050['km'] = $totalITCngTaxi2050;  
            array_push($dataArrayAfter2050, $vehiArrayFwCNGAfter2050);

            // echo "\n\n  After Emi 2050 tw-->",$totalITTw2050;
            // echo "\n\n  After Emi 2050 thrw-->",$InerTotalTrw2050;
            // echo "\n\n  After Emi 2050 lcv-->",$lcv2050;
            // echo "\n\n  After Emi 2050 hcv-->",$hcv2050;
            // echo "\n\n  After Emi 2050 buses-->",$buses2050;
            // echo "\n\n  After Emi 2050 petrol-->",$totalITPetrol2050;
            // echo "\n\n  After Emi 2050 disel-->",$totalITDisel2050;
            // echo "\n\n  After Emi 2050 cngtaxi-->",$totalITCngTaxi2050;


        //strart calaculation afterEmi2050
        $afterEmi2050 = 0;
        foreach ($dataArrayAfter2050 as $row) {
            $fule =  $row['fuleType'];
            $vehical =  $row['vehicleType'];
            $km1 =  $row['km'];
            
            $query1 = "SELECT * FROM travel_fuel WHERE type_of_vehicle = '$vehical' AND type_of_fuel='$fule'";
            $result = mysqli_query($conn, $query1);
            while ($row = mysqli_fetch_array($result)) {
                $approx_fuel = $row['approx_fuel'];
                $density = $row['density'];
                $vkt = $row['vkt'];
                $km1=($km1 *$vkt)/1000;
                $query2 = "SELECT * FROM ef_travel_fuel WHERE type_of_fuel='$fule'";
                $result = mysqli_query($conn, $query2);
                while ($row = mysqli_fetch_array($result)) {
                    $ncv   = $row['ncv'];
                    $co2ef = $row['co2ef'];
                    $ch4ef = $row['ch4ef'];
                    $n2oef = $row['n2oef'];
                    $carbonco2afterEmi2050 += ($km1 *  $approx_fuel * $density * $ncv * $co2ef *365)/1000;
                    $carbonch4afterEmi2050 += ($km1 *  $approx_fuel * $density * $ncv * $ch4ef *21* 365)/1000;
                    $carbonn2oafterEmi2050 += ($km1 *  $approx_fuel * $density * $ncv * $n2oef *310* 365)/1000;
                    $afterEmi2050 = $carbonco2afterEmi2050 + $carbonch4afterEmi2050 + $carbonn2oafterEmi2050;
                    $afterEmi2050 =round($afterEmi2050,2);
                }
                
            }
           
        }
        //  echo "after2050:", $afterEmi2050;
        // echo"\n\n After 2050 vehicles list";
        // print_r($dataArrayAfter2050);
        // echo "\n\n  After Emi 2050 -->",$afterEmi2050;


    //end calculation afterEmi2050
        $dataArray = array();

             $inteArray = array();
            $inteArray ['ctcyear'] =  "2022";
            $inteArray ['bauemi'] = $finalemi2022;
            $inteArray ['intervemi'] = $finalemi2022;
            array_push($dataArray, $inteArray);

            $inteArray = array();
            $inteArray ['ctcyear'] =  "2030";
            $inteArray ['bauemi'] = $beforeEmi2030;
            $inteArray ['intervemi'] =$afterEmi2030;
            array_push($dataArray, $inteArray);
           
            $inteArray = array();
            $inteArray ['ctcyear'] =  "2050";
            $inteArray ['bauemi'] = $beforEmi2050;
            $inteArray ['intervemi'] =$afterEmi2050;
            array_push($dataArray, $inteArray);

        
          $sizeof = sizeof($dataArray);
           foreach ($dataArray as $row) {
           $ctcyear =  $row['ctcyear'];
           $bauemi =  $row['bauemi'];
           $intervemi =  $row['intervemi'];
   
           
            $query2 = "SELECT * FROM bau WHERE b_id='" . $basicId . "' AND type='".'Transport'."' AND ctcyear='".$ctcyear."'";
            $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
            $rowcount = mysqli_num_rows($result);
            if ($rowcount == 0) {           
            $query = "INSERT INTO bau(b_id,type,ctcyear,bauemi,intervemi)
            VALUES ($basicId,'".'Transport'."',$ctcyear,$bauemi,$intervemi)";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            }

            else
            {
            $query = "UPDATE  bau set bauemi=$bauemi,intervemi=$intervemi
            WHERE b_id='" . $basicId . "' AND type='".'Transport'."' AND ctcyear='".$ctcyear."' ";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            }
             
           }  
           echo  "success";
?>