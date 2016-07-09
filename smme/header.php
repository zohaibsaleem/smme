<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<style>

#register
{
		float:right;
		margin-right:20px;
}


#header:hover
{
	background-color:#0F0;
	color:#000;
	
}
#header:active
{
	background-color:#F00;
	
}
nav
{
	padding-left:10px;
	
}



body
{
	
	margin:0;
}





img
{
	border:0;
}

/*Sprite*/

#navigation li, #navigation li a:hover, #navigation li
{
	background-image: url(images/bg-menu.png);
	background-repeat: repeat-x;
}


/*Header*/



#navigation
{
	background: url(images/bg-navigation.png);
	clear:both;
	height:50px;
	width:860px;
	margin: 0 auto;
	padding: 1px;
}

#navigation ul
{
	display: inline-block;
	width: 860px;
	list-style: none;
	margin: 0;
	padding: 0;
}
#navigation li
{
	float: left;
	background-position: 0 -118px;
	background-repeat: no-repeat;
	height: 49px;
	width: 122px;
	margin: 0;
	padding-left: 1px;
	text-align: center;
}
#navigation li:first-child
{
	background: none;
	margin-left: 0;
	padding-left: 0;
}
#navigation li a
{
	color:#0FC;
	display: block;
	font: bold 14px/48px Arial, Helvetica, sans-serif;
	height: 49px;
	text-decoration: none;
	text-transform: uppercase;
}

#navigation li a:hover
{
	background-position:0 -119px;
	color:#6d6157;
}












	
</style>

<body>

<nav id="navigation">
<ul>

<li><a  href="index.php">HOME</a></li>
<li><a  href="mDir.php">Directory</a></li>
<li><a  href="post.php">View Posts</a></li>
<li><a  href="vFriend.php">View Friend</a></li>
<li><a  href="pRequest.php">Request</a></li>
<?php
	mysql_connect("localhost","root","");
		mysql_select_db("smme");
		
if(isset($_SESSION['user_id']))
{
		$user_id = $_SESSION['user_id'];
		
		$query2 = "SELECT * FROM user_table WHERE user_id='$user_id'";
		
		$result2 = mysql_query($query2) or die(mysql_error());
		
		$row2 = mysql_fetch_array($result2);
		
		if($row2['user_type'] == "corporate")
		{
				echo "<li><a  href='report.php'>SNME</a></li>";
		}
}



?>




<?php

if(isset($_SESSION['user_id']))
{ 
?>
		<li><a  href="index.php?logout=out">Logout</a></li>
<?php
}
else
{
?>
		<li><a href="registration.php">Sign Up</a></li>
<?php
}
?>
</nav><br>

<hr>


</body>
</html>