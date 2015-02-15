<?php
error_reporting(0);
//Main Settings
$domain = "http://localhost/earnbtc";
$title  = "Bitcoin Faucet - Pentest.pw";

//Mysql Settings
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "luka";
$dbname = "bitcoin";
$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

//Paying Settings
$minpayout = "10000";
$value     = "264";

//Don't CHANGE!
$username = $_SESSION['username'];
$query = "SELECT balance FROM users WHERE username='$username'"; //You don't need a ; like you do in SQL
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result)){ 
$mybalance = $row['balance'];
}
?>