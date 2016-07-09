<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="include/style.css">
</head>

<body>
<main>
<?php
session_start();
include 'header.php';
?>
<?php

if(isset($_SESSION['user_id']))
{

if(isset($_POST['submit']))
	{
		//echo "Yes";
			$fname = $_POST['fname'];
			$friend_id = $_POST['fid'];
		//	echo $name;
			$user_id =  $_SESSION['user_id'];
			echo $user_id."<br>";
			
	}
	else
	{
		echo "NO Data Transfer";
	}

	mysql_connect("localhost","root","");
	mysql_select_db("smme");
	$db = 0;
	$check = "SELECT * FROM pending_request";
	$checkR = mysql_query($check);
	
	while($row = mysql_fetch_array($checkR))
	{
			if($row['user_id']==$user_id)
			{
				if($row['friend_id']==$friend_id)
				{
					echo "<h3>Your Request has <em>already<em> been sent.</h3>";
					$db=1;
				}
			}
			
			
			//echo $a = mysql_num_rows($checkR);
			
			
	}
	
	$check1 = "SELECT * FROM friend_table WHERE friend_id='$friend_id' && user_id='$user_id'";
	 $checkR1 = mysql_query($check1);

	if(mysql_num_rows($checkR1)>0)
	{
	$row = mysql_fetch_array($checkR1);
	
	echo "$fname is already your Friend. <br>";
	$db=1;
	}	
	
	
	
	if($db==0)
	{
			$query = "insert into pending_request(user_id,friend_id) values('$user_id','$friend_id')";
			
			if(mysql_query($query))
			{
				echo "Request has been sent to $fname <br>";
			}
		
	}
}
		
//	echo "<h3>Your Request is <em>already<em> been sent</h3>";	
	
/*	if($row=mysql_fetch_array($checkR) and $row['user_id']==$row['friend_id'])
	{
			echo "Your Request is alreadb been sent to $fname";
	}
	else
	{
		$query = "insert into pending_request(user_id,friend_id) values('$friend_id','$user_id')";
		
		if(mysql_query($query))
	{
			echo "Request has been sent to $fname <br>";
		}
	}
*/
?>
</main>
</body>
</html>