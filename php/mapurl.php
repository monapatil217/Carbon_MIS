<?php
include 'conn.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$city = $data->city;

    $query2 = "SELECT DISTINCT(url) FROM mapurl WHERE city_name='".$city."'";
    $mapurldata = array();
    $result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));
    while ($row = mysqli_fetch_array($result)) {
        $url = array('url' => $row['url']);
        array_push($mapurldata, $url);
    }

    echo  json_encode($mapurldata);
?>