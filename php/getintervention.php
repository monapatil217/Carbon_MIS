<?php
include 'conn.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$basicId = $data->basicId;
$type = $data->type;

   
     $query2 = "SELECT * FROM bau WHERE b_id='" . $basicId . "' AND type='".$type."'";
    $interdata = array();
    $result = mysqli_query($conn, $query2);
    
    while ($row = mysqli_fetch_array($result)) {
        $interv = array();      
        $interv["ctcyear"] = $row['ctcyear'];
        $interv["bauemi"] = floatval($row['bauemi']);
        $interv["intervemi"] = floatval($row['intervemi']);
       
        array_push($interdata, $interv);
        

    }
    echo  json_encode($interdata);
?>