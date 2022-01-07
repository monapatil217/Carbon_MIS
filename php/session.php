<?php
session_start();

if (isset($_SESSION['cityName'])) {
    // This session already exists, should already contain data
} else {
    // New PHP Session / Should Only Be Run Once/Rarely/Login/Logout
    header("Location:login.php");
}
