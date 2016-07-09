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
		mysql_connect("localhost","root","");
		mysql_select_db("smme");
		$user_id = $_SESSION['user_id'];
		
		// Accept Process
		if(isset($_POST['accept']))
		{
			 $pTableId = $_POST['pRid'];
			
			 $friendId = $_POST['id'];
			// First Add List
			$query = "insert into friend_table(user_id,friend_id) values('$user_id','$friendId' )";
			
			// Add own list of firend
			$query1 = "insert into friend_table(user_id,friend_id) values('$friendId','$user_id' )";
			
			if(mysql_query($query1))
			{
			
				if(mysql_query($query))
				{
					$query1 = "DELETE FROM pending_request WHERE id='$pTableId'";
					if(mysql_query($query1))
					{
					header("Location: pRequest.php?Success=Friend is add on your List.");
					}
				}
			}
		
		}
		
		
		// Reject Process
		if(isset($_POST['reject']))
		{
			echo $pTableId = $_POST['pRid'];
			$query1 = "DELETE FROM pending_request WHERE id='$pTableId'";
				if(mysql_query($query1))
				{
				header("Location: pRequest.php?Reject=Request is cancel by $use_id.");
				}
			
		}
	

?>
</main>
</body>
</html>