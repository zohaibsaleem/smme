<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="include/style.css">
</head>
<style>
	a
	{
		text-decoration:none;
	}
	h1
	{
			font-size:36px;
			color:blue;
			-webkit-animation:main 10s linear infinite;
			-moz-animation:main 10s linear infinite;
			-o-animation:main 10s linear infinite;
			-ms-animation:main 10s linear infinite;
	}
	h3
	{
			color:#F00;
	}
	h2
	{
		color:rgb(2,256,102);
	}
	article
	{
		width:200px;
		position:relative;
		color:#F30;
		-webkit-animation:round 3s linear 2s ;
		-moz-animation:round 3s linear 2s ;
		-ms-animation:round 3s linear 2s ;
		-o-animation:round 3s linear 2s ;
		
	}
	
	@-webkit-keyframes round
	{
		0%{-webkit-transform: rotate(0deg);}
		33%{-webkit-transform: rotate(-360deg);}
		100%{-webkit-transform: rotate(0deg);}
	}
	@-moz-keyframes round
	{
		0%{-webkit-transform: rotate(0deg);}
		33%{-webkit-transform: rotate(-360deg);}
		100%{-webkit-transform: rotate(0deg);}
	}
	@-ms-keyframes round
	{
		0%{-webkit-transform: rotate(0deg);}
		33%{-webkit-transform: rotate(-360deg);}
		100%{-webkit-transform: rotate(0deg);}
	}
	@-o-keyframes round
	{
		0%{-webkit-transform: rotate(0deg);}
		33%{-webkit-transform: rotate(-360deg);}
		100%{-webkit-transform: rotate(0deg);}
	}
	
	@-webkit-keyframes main
	{
			0%{color:blue;}
			25%{color:#F6C;}
			50%{color:black;}
			75%{color:#0F0;}
			100%{color:blue;}
	}
	@-moz-keyframes main
	{
			0%{color:blue;}
			25%{color:#F6C;}
			50%{color:black;}
			75%{color:#0F0;}
			100%{color:blue;}
	}
	@-o-keyframes main
	{
			0%{color:blue;}
			25%{color:#F6C;}
			50%{color:black;}
			75%{color:#0F0;}
			100%{color:blue;}
	}
	@-ms-keyframes main
	{
			0%{color:blue;}
			25%{color:#F6C;}
			50%{color:black;}
			75%{color:#0F0;}
			100%{color:blue;}
	}
</style>

<body>
<main>
<?php
session_start();
include 'header.php';
?>
<?php



//session_destroy();
//include 'registration.php';
	mysql_connect("localhost","root","");
	mysql_select_db("smme");

	if(isset($_SESSION['user_id']))
	{
		$user_id = $_SESSION['user_id'];
		$query = "SELECT * FROM user_table WHERE user_id='$user_id'";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		$user_name = $row['name'];
		
				echo "<h1 align='center'>Wellcome $user_name</h1>";
		
		$query1 = "SELECT * FROM pending_request WHERE friend_id='$user_id'";
	
		$result1 = mysql_query($query1) or die(mysql_error());
	
		// Checking: Is any pending request?
		if(mysql_num_rows($result1)>0)
		{
			$no = mysql_num_rows($result1);
			
			echo "<article><a href='pRequest.php'><h3>$no Pending Request</h3></a></article>";
			
		}
		
		// Checking No of Friend
		$query3 = "SELECT * FROM friend_table WHERE user_id='$user_id'";
		$result3 = mysql_query($query3) or die(mysql_error());
		
		if(mysql_num_rows($result3)>0)
		{
			$no1 = mysql_num_rows($result3);
			
			echo "<a href='vFriend.php'><h2>Currently! You have $no1 Friend</h2></a>";
		}
		
	}

	
	if(isset($_POST['register']))
	{
		$name=$_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$dob= $_POST['dob'];
		$image = $_POST['image'];
		$user_type = $_POST['user_type'];
		$gender = $_POST['gender'];
		
		$query = "insert into user_table(name,email,password,DOB,image,gender,user_type) values('$name','$email','$password','$dob','$image','$gender','$user_type')";
		echo "<img src='$image'>";
		if(mysql_query($query))
		{
			echo "<h3>Thank you for Registration</h3>";
		}
	}

?>

<table>
	<tr>
    	<td></td>
    </tr>
</table>

</main>
</body>
</html>