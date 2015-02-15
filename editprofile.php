<?php
//Edit Profile Page
session_start();
include("config/config.php");
if (!isset($_SESSION['username'])): ?>
	<?php header("Location: index.php"); ?>
<?php else: ?>
	<?php $username = $_SESSION['username']; ?>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body class="news">
	
	<div class="nav">
		<ul>
			<li><a href="index2.php">Main</a></li>
			<li><a href="multi.php">Multiply</a></li>
			<li><a class="active" href="editprofile.php">Profile</a></li>
			<li><a href="stats.php">Statistics</a></li>
			<li><a href="withdraw.php">Withdraw</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<?php
	echo "<div id='balance'>";
echo "<h2>Your Balance:" .  $mybalance . "</h2>";  //$row['index'] the index here is a field name
echo "</div>";
	?>
	
<center><h1>Will be available soon!</h1></center>

<?php endif; ?>

<center>
  <div id="copyright">
  		| This website is powered by <a href="http://pentest.pw">Pentest.pw</a> Engine
<br>
    Copyright &#169; 2015. 

  </div>
</center>