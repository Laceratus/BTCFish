<?php
session_start();
/* Statistics Page stats.php
Author: Luka Sikic (laceratus@hotmail.com)
*/
include("config/config.php");
if(!isset($_SESSION['username'])): ?>

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
	    <li><a href="<?php echo $domain?>/register.php">Sign Up</a></li>
	    <li><a class="active" href="<?php echo $domain?>/stats.php">Statistics</a></li>
  </ul>
</div>
</body>
</html>
<?php else: ?>
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
			<li><a href="editprofile.php">Profile</a></li>
			<li><a class="active" href="stats.php">Statistics</a></li>
			<li><a href="withdraw.php">Withdraw</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<?php
	echo "<div id='balance'>";
echo "<h2>Your Balance:" .  $mybalance . "</h2>";  //$row['index'] the index here is a field name
echo "</div>";
	?>
</body>
</html>
<?php endif; ?>
<html>
<head>
	<title>Statistics <?php echo $title; ?></title>
	<link rel="stylesheet" href="css/table.css">
</head>
<body>
<?php echo "<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>USERNAME</th>
      <th>BALANCE</th>
    </tr>
  </thead>
  <tbody>";
  $query = "SELECT * FROM `users` ORDER BY `users`.`balance` DESC limit 10"; //You don't need a ; like you do in SQL
$result = mysqli_query($con, $query);

while($row = mysqli_fetch_array($result)){ 
echo "
    <tr>
      <td><strong>" . $row['id'] . "</strong></td>
      <td>" . $row['username'] . "</td>
      <td>" . $row['balance'] . "</td>
    </tr>";
  //Creates a loop to loop through results
}



echo "</tbody>
</table>
</body>
</html>";?>
<center>
  <div id="copyright">
  		| This website is powered by <a href="http://pentest.pw">Pentest.pw</a> Engine
<br>
    Copyright &#169; 2015. 

  </div>
</center>