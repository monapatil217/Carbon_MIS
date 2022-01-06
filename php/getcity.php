<?php
include 'conn.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$type = $data->type;

    $query2 = "SELECT DISTINCT(name) FROM city_name";
    $citydata = array();
    $result = mysqli_query($conn, $query2);
    while ($row = mysqli_fetch_array($result)) {
        $city = array('name' => $row['name']);
        array_push($citydata, $city);
    }

    echo  json_encode($citydata);
?>