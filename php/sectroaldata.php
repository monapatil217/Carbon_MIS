<?php
include 'conn.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$type = $data->type;
$finalDataArray = [];
$tablearray = ["ele_data", "crop_data", "fule_data", "indu_eng_data", "land_data", "live_data", "solid_data", "trans_data", "waste_data"];

$query2 = "SELECT Distinct(name) FROM city_name";
$result = mysqli_query($conn, $query2)  or die(mysqli_error($conn));

while ($row = mysqli_fetch_array($result)) {
    $cityName = $row['name'];
    $basicIdquery = "SELECT id FROM basic_info WHERE city='" . $cityName . "'";
    $basicresult = mysqli_query($conn, $basicIdquery)  or die(mysqli_error($conn));
    $rowcount = mysqli_num_rows($basicresult);
    $mainData = array();
    $value = 0;
    if ($rowcount == 0) {
        $value = $value;
    } else {
        $row = mysqli_fetch_array($basicresult);
        $basicId = $row['id'];
        $basicIdquery = "SELECT * FROM ele_data WHERE b_id='" . $basicId . "'";
        $basicresult = mysqli_query($conn, $basicIdquery)  or die(mysqli_error($conn));
        $rowcount = mysqli_num_rows($basicresult);
    }
}


?>