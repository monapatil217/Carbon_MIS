<?php
include 'conn.php';
require "session.php";
$message = "";
if (isset($_POST["username"])) {
    $query = "SELECT * FROM city_name WHERE name ='" . $_POST["username"] . "' and password = '" . $_POST["password"] . "'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $row  = mysqli_fetch_array($result);
    if (is_array($row)) {
        $_SESSION["cityId"] = $row['id'];
        $_SESSION["cityName"] = $row['name'];
        header("Location:../basicInfo.php");
    }else{
        header("Location:../login.php");
        echo "<script>alert('Please check the usename and password!');</script>";
    } 
   
} else {
    echo "noData";
   
}
