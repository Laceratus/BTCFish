<?php
include("config/config.php");
 if (!isset($_SESSION['username'])): ?>
 <html>
 <head>
 	<title><?php echo $title; ?></title>
 	<link rel="stylesheet" href="css/style.css">
 </head>
 <body>
 	<div class="nav">
  <ul>
  		<li><a href="<?php echo $domain?>/index.php">Home</a></li>
	    <li><a href="<?php echo $domain?>/login.php">Sign In</a></li>
	    <li><a class="active" href="<?php echo $domain?>/register.php">Sign Up</a></li>
	    <li><a href="<?php echo $domain?>/stats.php">Statistics</a></li>
  </ul>
</div>
<center><h2>Register and start earning Bitcoin</h2></center>
<div id="register">

		<form action="register.php" method="post">

			<input type="text" name="username" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<input type="password" name="passwordagain" placeholder="Password Again">
			<input type="email" name="email" placeholder="Email">

			<input type="submit" value="Register">

		</form>

	</div>
<?php else: ?>
	<?php header("Location: index2.php"); ?>
	<?php endif; ?>

<?php
//Register process
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);
	$passwordagain = htmlspecialchars($_POST['passwordagain']);
	$email = htmlspecialchars($_POST['email']);
	if ($username == ""){
		echo "Please put username!";
	} else {
	$dupname = mysqli_query ($con, "SELECT * from users WHERE username = '$username'");
	$rowname = mysqli_num_rows($dupname);
	if ($rowname != 0){
		echo "Username is already in use, pick another";
	}
	else{
if ($password==$passwordagain){
	$password = md5($password);
	$query = "INSERT into users(username, password, email) VALUES ('$username', '$password', '$email')";
	mysqli_query($con, $query);
}
else {
	echo "Password is not same!";
}
}
}
}
?>
<center>
  <div id="copyright">
  		| This website is powered by <a href="http://pentest.pw">Pentest.pw</a> Engine
<br>
    Copyright &#169; 2015. 

  </div>
</center>