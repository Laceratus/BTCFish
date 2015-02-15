<?php
session_start();
include ("config/config.php");

if (!isset($_SESSION['username'])): ?>
<?php header("Location: login.php");?>
<?php else: ?>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="css/style.css">
	
</head>
<body class="news">
	<div class="nav">
		<ul>
			<li><a class="active" href="index2.php">Main</a></li>
			<li><a href="multi.php">Multiply</a></li>
			<li><a href="editprofile.php">Profile</a></li>
			<li><a href="stats.php">Statistics</a></li>
			<li><a href="withdraw.php">Withdraw</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
		<?php
		error_reporting(0);
		$username = $_SESSION['username'];
$query = "SELECT balance FROM users WHERE username='$username'"; //You don't need a ; like you do in SQL
$result = mysqli_query($con, $query);

echo "<div id='balance'>";
while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<h2>Your Balance:" .  $row['balance'] . "</h2>";  //$row['index'] the index here is a field name
}
		?>
	</div>
	<center>
		<h2>Earn FREE Bitcoin every 30 minutes!</h2>
		<h3>Get <strong><?php echo $value; ?> satoshi for FREE!</h3>
		<?php
$time = time(true);
	$timeq = mysqli_query($con, "SELECT time FROM users WHERE username = '$username'");
	$rowtime = mysqli_fetch_row($timeq);
	if ($time - $rowtime[0] < 1800){
		echo "You collected your coins, try later!";
}
else{
echo "<div id='getbtc'><form action='update.php' method='POST'>
<input type='submit'  value='Get Bitcoin' ></div>";
}
		?>
		
	</center>

</body>
<?php endif; ?>
<center>
  <div id="copyright">
  		| This website is powered by <a href="http://pentest.pw">Pentest.pw</a> Engine
<br>
    Copyright &#169; 2015. 

  </div>
</center>
