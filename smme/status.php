<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="include/style.css">
</head>

<body>
<main>
<?php
session_start();
include 'header.php';
		mysql_connect("localhost","root","");
		mysql_select_db("smme");
		$user_id = $_SESSION['user_id'];
		
		
?>
<?php
	mysql_connect("localhost","root","");
	mysql_select_db("smme");
	$user_id = $_SESSION['user_id'];
	if(isset($_POST['Upload_Now']))
	{
		if($_POST['post_type']==1)
		{
		
		
			if(!empty($_FILES["uploadedimage"]["name"]))
			{
				
				//Fetch Subject
				 $add_text = $_POST["add_text"];
				
				//Fetch Post Type 1 for Image, 0 for text
				echo $post_type = $_POST["post_type"];
				
				// Fetch Image
				 $file_name=$_FILES["uploadedimage"]["name"];
				 $temp_name=$_FILES["uploadedimage"]["tmp_name"];
				 $imgtype=$_FILES["uploadedimage"]["type"];
				 $ext = getImageExtension($imgtype);
		
				$imagename=date("d-m-Y")."-".time().$ext;
				 $target_path = "images/".$imagename;
				echo "<br>";
				$a = date("Y-m-d");
		
		
				if(move_uploaded_file($temp_name, $target_path))
				{
					$query = "INSERT into post_table(user_id,post_type,subject,post,date,time) 			                     				VALUES('$user_id','$post_type','$add_text','$target_path',CURDATE(),CURTIME())";
						
						if(mysql_query($query))
						{
							header("Location: post.php?status=1");
						}
						else
						{
							echo "Not Success Insert Data into Database<br>";
							 die("<strong>Error Save Image path in DB</strong> ".mysql_error());
						}
				}
				else
				{
					exit("<strong>Exit While Uploading image on the server</strong>");
				}
			}
		}
		else
		{
			echo "Yes";
			// Post type 0, case of Status
			echo $post_type = $_POST["post_type"];
			
			// Fetch Subject
			 $add_text = $_POST["add_text"];
			 
			 //Fetch Status
			 $status = $_POST['status'];
			 
			 $query = "INSERT into post_table(user_id,post_type,subject,post,date,time) 			                     				VALUES('$user_id','$post_type','$add_text','$status',CURDATE(),CURTIME())";
						 
				
						if(mysql_query($query))
						{
							header("Location: post.php?status=1");
						}
						else
						{
							echo "Not Success Insert Data into Database<br>";
							 die("<strong>Error Save Status in Database </strong> ".mysql_error());
						}
			
		}
		
	}
	
	
	
	
	
	
	
	
	
	function getImageExtension($imagetype)
	{
		if(empty($imagetype))
		{
			return false;
			
		}
		else
		{
			switch($imagetype)
			{
				case 'image/bmp':
						return '.bmp';
						break;
				case 'image/gif':
						return '.gif';
						break;
				case 'image/jpeg':
						return '.jpg';
						break;
				case 'image/png':
						return '.png';
						break;
				default:
						return false;
						
						
			}
		}
	}

?>
</main>
</body>
</html>