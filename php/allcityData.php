<?php
include 'conn.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$finalArray=[];
$tablearray = ["ele_data","fc_land_data","fule_data","indu_eng_data","land_data","live_data","solid_data","trans_data","waste_data"];
            $query2 = "SELECT Distinct(name) FROM city_name";
            $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

            while ($row = mysqli_fetch_array($result)) {
                $cityName = $row['name'];
                $basicIdquery = "SELECT id FROM basic_info WHERE city='".$cityName."'";
                $basicresult = mysqli_query($conn, $basicIdquery)  or die(mysqli_error($conn));
                $rowcount = mysqli_num_rows($basicresult);
                $mainData = array();
                $value = 0;
                if ($rowcount == 0) {
                    $value = $value;
                }else{
                    $row = mysqli_fetch_array($basicresult);
                    $basicId = $row['id'];
                   for($i=0;$i<sizeof($tablearray);$i++){
                       $tableName = $tablearray[$i];
                        $dataQuery = "SELECT * FROM $tableName WHERE b_id='".$basicId."'";
                        $dataresult = mysqli_query($conn, $dataQuery)  or die(mysqli_error($conn));
                        $rowcount = mysqli_num_rows($dataresult);
                        if ($rowcount != 0) {
                            $value += 9.9;
                        }
                   }
                }
                
                    $mainData['country'] = $cityName;
                    $mainData['value'] = $value;
               array_push($finalArray,$mainData);
            }

            echo  json_encode($finalArray);       
?>