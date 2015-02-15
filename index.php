<?php
session_start();
include("config/config.php");
?>
<?php if(!isset($_SESSION['username'])): ?>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="css/style.css">
	<style type="text/css">
	#copyright {
background: #172d4f;
height: 40px;
width: 100%;
margin-top: 550px;
text-align: center;
color: white;
overflow: hidden;
position: absolute;
bottom: 0;
}
	</style>
</head>
<body>
<div class="nav">
  <ul>
  		<li><a class="active" href="<?php echo $domain?>/index.php">Home</a></li>
	    <li><a href="<?php echo $domain?>/login.php">Sign In</a></li>
	    <li><a href="<?php echo $domain?>/register.php">Sign Up</a></li>
	    <li><a href="<?php echo $domain?>/stats.php">Statistics</a></li>
  </ul>
</div>
<center>
<div style="color:black;">
	<h1>New Generation of BTC Faucets</h1>
	<h2>High payout every 30 minutes</h2>
	<h3>100% Valid</h3>
	<h2>6.476388736 Bitcoin already Paid</h2>
	<h3>Be part,<a href="register.php">Sign Up</a></h3>
</div>



</center>
<?php else: ?>
	<?php header("Location: index2.php"); ?>
<?php endif; ?>
<center>
  <div id="copyright">
  		| This website is powered by <a href="http://pentest.pw">Pentest.pw</a> Engine
<br>
    Copyright &#169; 2015. 

  </div>
</center>
</body>
</html>
