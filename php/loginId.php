<?php
include 'conn.php';
session_start();
$message = "";
if (isset($_POST["username"])) {
    $query = "SELECT * FROM city_name WHERE name ='" . $_POST["username"] . "' and password = '" . $_POST["password"] . "'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $row  = mysqli_fetch_array($result);
    if (is_array($row)) {
        $_SESSION["cityId"] = $row['id'];
        $_SESSION["cityName"] = $row['name']; 
    }

    if($_POST["role"] == 'Admin') {
        header("Location:../commGhraphPage.php");
       }else{
        $query = "SELECT * FROM basic_info WHERE city='".$_SESSION["cityName"]."'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
        $row  = mysqli_fetch_array($result);
        if (is_array($row)) {
            $_SESSION["basicId"]=$row['id'];
            header("Location:../index.php");
        }else{
            header("Location:../basicInfo.php");
        }
        
       }
   
} else {
    echo "noData";
   
}
