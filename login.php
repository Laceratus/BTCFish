<?php
session_start();
include("config/config.php");

if (!isset($_SESSION['username'])): ?>
<html>
<head>
<title><?php echo $title; ?></title>
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
</head>
<body>
	<div class="nav">
  <ul>
  		<li><a href="<?php echo $domain?>/index.php">Home</a></li>
	    <li><a class="active" href="<?php echo $domain?>/login.php">Sign In</a></li>
	    <li><a href="<?php echo $domain?>/register.php">Sign Up</a></li>
	    <li><a href="<?php echo $domain?>/stats.php">Statistics</a></li>
  </ul>
</div>
<div id="login">

		<form action="login.php" method="post">

			<input type="text" name="username" required value="Username" onBlur="if(this.value=='')this.value='Username'" onFocus="if(this.value=='Username')this.value='' "> <!-- JS because of IE support; better: placeholder="Username" -->
			<input type="password" name="password" required value="Password" onBlur="if(this.value=='')this.value='Password'" onFocus="if(this.value=='Password')this.value='' "> <!-- JS because of IE support; better: placeholder="Password" -->
			<input type="submit" value="Login">

		</form>

	</div>
</body>
</html>
<?php else: ?>
<?php header("Location: index2.php"); ?>
<?php endif; ?>
<?php
//login process
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);
	$password = md5($password);
$query = "SELECT username, password from `users` where username='$username' and password='$password'";

$result=mysqli_query($con, $query);

while($row = mysqli_fetch_array($result))
{
	if($_POST['username']==$row['username'] && $password==$row['password'])
	{
		$_SESSION['username']=$username;
		header("Location:index2.php");
	}
	else 
	{
		echo "You got credentials wrong";
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