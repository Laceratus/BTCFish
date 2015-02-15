<?php
session_start();
include("config/config.php");

if(!isset($_SESSION['username'])){
	header("Location: index.php");
}

else {
	$time = time(true);
	$timeq = mysqli_query($con, "SELECT time FROM users WHERE username = '$username'");
	$rowtime = mysqli_fetch_row($timeq);
	if ($time - $rowtime[0] < 5){
		$tryfor = $rowtime[0] - $time;
		echo "You are doing this to often, try later ";
	}
	else{
	$query = "UPDATE users SET balance = balance + '$value' WHERE username='$username'";
	mysqli_query($con, $query);
	mysqli_query($con, "UPDATE users SET time = '$time' WHERE username ='$username'");
	header("Location: index2.php");
}
}
?>