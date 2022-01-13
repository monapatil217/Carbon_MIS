<?php
include 'conn.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$basicid = $data->basicid;
$type = $data->type;
$mainArray = array();
    if ($type == "Electricity") {

        $query2 = "SELECT * FROM ele_data WHERE b_id='".$basicid."'";
       
        $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 0) {
            $data = array('data' => "false");
            array_push($mainArray, $data);
        } else {
            while ($row = mysqli_fetch_array($result)) {
                $data = array();
                $data['data'] = "true";
                $data['r_elec'] = $row['r_elec'];
                $data['c_elec'] = $row['c_elec'];
                $data['s_elec'] = $row['s_elec'];
                $data['sl_elec'] = $row['sl_elec'];

                array_push($mainArray, $data);
            }
        }
       
    }
    echo  json_encode($mainArray);
?>