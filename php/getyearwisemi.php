<?php
include 'conn.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$basicId = $data->basicId;
$arr=array(2022,2030,2050);
$interdata = array();
for($i=0;$i<sizeof($arr);$i++){
    $query2 = "SELECT sum(bauemi) as bau,sum(intervemi) as inter,ctcyear FROM bau WHERE b_id='".$basicId."' AND ctcyear='".$arr[$i]."'";
    $result = mysqli_query($conn, $query2);
    while ($row = mysqli_fetch_array($result)) {
        $interv = array();
        $interv["ctcyear"] =$row['ctcyear'];
        $interv["bauemi"]  = floatval($row['bau']);
        $interv["intervemi"] = floatval($row['inter']);
        array_push($interdata, $interv);
    }
}
    $finalArray["data"] = $interdata;
    $mainarray=array();
    array_push($mainarray,$finalArray);
    echo  json_encode($mainarray);
?>