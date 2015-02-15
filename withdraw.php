<?php
//Withdraw page 
session_start();
include("config/config.php");

if (!isset($_SESSION['username'])): ?>
<?php header("Location:index.php"); ?>
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
			<li><a href="editprofile.php">Profile</a></li>
			<li><a href="stats.php">Statistics</a></li>
			<li><a class="active" href="withdraw.php">Withdraw</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<?php
	echo "<div id='balance'>";
echo "<h2>Your Balance:" .  $mybalance . "</h2>";  //$row['index'] the index here is a field name
echo "</div>";
	?>
	<div style="color: black;" id="register">
		<h3>Minimum cashout is: <?php echo $minpayout; ?></h3><br>
		<h4>All transactions include a 0.0001 BTC</h4>
	<form action="withdraw.php" method="POST">
		<input type="text" placeholder="Your BTC Address" name="btcadr">
		<input type="submit" name="submit" value="Withdraw">
		</div>
<div style="color: black;">
<?php
if (isset($_POST['submit'])){
if ($mybalance < 9999){
echo "You don't have enough to cash out.";
	}
	else {
		$address = $_POST['btcadr'];
		$amount = $mybalance;
		$query = "INSERT INTO pending (balance, username, btcadr, txid) VALUES ('$amount', '$username', '$address', 'Pending')";
		mysqli_query($con, $query);
		echo "Payment is on pending(this can take up to 24h) on address: " . $address;
mysqli_query($con, "UPDATE users SET balance = 0 WHERE username='$username'");
	}
}
?>

<center>

	<div id="history">
		<h2>History</h2>
		<table border=1>
			<thread>
				<tr>
					<td>Payment ID</td>
					<td>Withdraw Address</td>
					<td>Value</td>
					<td>Status/Transaction ID</td>
				</tr>
			</thread>
			<tbody>
				<?php 
				$query = "SELECT * FROM pending WHERE username = '$username'";

$result = mysqli_query($con, $query);
				while($row = mysqli_fetch_array($result)){ 
echo "
    <tr>
      <td><strong>" . $row['id'] . "</strong></td>
      <td>" . $row['btcadr'] . "</td>
       <td>" . $row['balance'] . "</td>
      <td>" . $row['txid'] . "</td>
    </tr>";
  //Creates a loop to loop through results
}

?>
			</tbody>
		</table>

	</center>
</div>
<?php endif; ?>
<center>
  <div id="copyright">
  		| This website is powered by <a href="http://pentest.pw">Pentest.pw</a> Engine
<br>
    Copyright &#169; 2015. 

  </div>
</center>