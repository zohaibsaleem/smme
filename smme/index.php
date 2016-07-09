<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="include/style.css">
</head>
<style>
#email, #password
{
	height:20px;
	width:200px;
	border-radius:7px;

}
label
{
	font-weight:bold;
}
table
{
	border:3px solid #0FF;
	border-radius:10px;
	padding:20px;
	background:#CCC;
	box-shadow:5px 5px 15px #3FF, -5px -5px 15px #3FF;
}

</style>
<body>
<main>
<?php
session_start();
include 'header.php';
?>
<table align="center">
<h1 style="text-shadow:3px 3px 5px green, -3px -3px 5px green; color:yellow;" align="center">Login </h1>
<form name="form1" method="post" action="">
  <tr>
  	<td><label>Email</label></td>
    
  <td><input  type="email" name="email" id="email" placeholder="Type your Email"></td>
  </tr>
  <tr>
  	<td><label>Password</label></td>
    <td><input  type="password" name="password" id="password" placeholder="Type your password"></td>
    </tr>
  	<tr>
    <td colspan="2"><input type="submit" name="submit" id="submit" value="Submit"></td>
  	</tr>
</form>

</table>
<?php
//if(isset($_GET['logout']))
//	{
//		
//	}
	
mysql_connect("localhost","root","");
	mysql_select_db("smme");
	

if(isset($_POST['email']) and isset($_POST['password']))
{
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$query = "SELECT * FROM user_table WHERE email='$email' and password='$password'";
	
	$result = mysql_query($query) or die(mysql_error());
	$count = mysql_num_rows($result);
	$row = mysql_fetch_array($result);
	echo "<br><h1>$count</h1><br>";
	if($count==1)
	{
		
		
		$_SESSION['user_id'] = $row['user_id'];
	}
	else
	{
		echo "Sorry, Your Credential does not match.";
	}
}

if(isset($_SESSION['user_id']))
{
	if(isset($_GET['logout']))
	{
		session_destroy();
		header("Location:index.php");
	}
	else
	{
	
	header("Location:register.php");
	}
}
?>
</main>
</body>
</html>