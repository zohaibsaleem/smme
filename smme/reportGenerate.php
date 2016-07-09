<?php

session_start();


?>
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

include 'header.php';
		mysql_connect("localhost","root","");
		mysql_select_db("smme");
		
		if(isset($_SESSION['user_id']))
	
		$user_id = $_SESSION['user_id'];
	
	if(isset($_POST['submit']))
	{
		   $subject = $_POST['subject'];
			$post_type = $_POST['post_type'];
		   echo  $from = $_POST['from'];
			echo $to = $_POST['to'];
			
			//$by_level = $_POST['by_level'];
		
			//Do real escaping here
		
			$query = "SELECT * FROM post_table";
			$conditions = array();
		
			if($user_id !="")
				{
					$conditions[]="user_id='$user_id'";
				}
			
			if($subject!="")
			{
				$conditions[] = "subject='$subject'";
			}
			
			if($post_type!="")
			{
				$conditions[] = "post_type='$post_type'";
			}
			
			if($from !="" and $to!="")
			{ echo "YES";
				$conditions[] = "date BETWEEN '$from' and '$to' ";
			}
		/*	
			if($to !="")
			{
				$conditions[] = "'$to'";
			}
			*/
				
		  
			
			$sql = $query;
			if (count($conditions) > 0) {
			  $sql .= " WHERE " . implode(' AND ', $conditions);
			}
				echo "<br>";
				 $sql;
				echo "<br>";
		   $result = mysql_query($sql) or die("WRONG query");
		   
		
		
			
		
			
			
				$number = 1;
				while($row = mysql_fetch_array($result))
				{
					$post = $row['post'];
					
					
					echo "<br>";
					$postT = $row['post_type'];
					$postId = $row['post_id'];
					$pDate = $row['date'];
					$dTime = $row['time'];
					$subject = $row['subject'];
					
					//Count LIke
					$query1 = "SELECT COUNT(pLike) AS P_Like FROM like_table WHERE post_id='$postId' AND pLike=1";
					$result1 = mysql_query($query1);
					$row1 = mysql_fetch_array($result1);
					
				$TLike = $row1['P_Like'];
					echo "<br>";
					
					//Count Dislike
					$query2 = "SELECT COUNT(pDislike) AS P_Dislike FROM like_table WHERE post_id='$postId' AND pDislike=1";
					$result2 = mysql_query($query2);
					$row2 = mysql_fetch_array($result2);
					
					$TDislike = $row2['P_Dislike'];
					echo "<br>";
					
					
					//Display
					if($postT==1)
					{
						echo "Sr # $number";
						echo "<section style='clear:both;'>";
						
						echo "<img style='float:left; margin-right:20px;'  src='$post' width='100'>";
						
						if($subject!='')
						{
							echo "<strong style='float:left;'><u>$subject</u></strong>";
							echo "<br>";
						}
						
						echo "<div style='float:left; color:green; font-family:Arial;' >Likes : ".$TLike."</div>";
						echo "<br>";
						echo "<div style='float:left; color:red; font-family:Arial;text-indent:40px;'>Dislikes : ".$TDislike."</div>";
						
						echo "</section>";
						echo "<hr style='clear:both;'>";
					}
					else
					{
							echo "Sr # $number";
						echo "<section style='clear:both;'>";
						
						
						if($subject!='')
						{
							
							echo "<strong style='float:left;'><u>$subject</u></strong>";
							echo "<br>";
						}
						echo "<strong style='float:left;' width='200'>$post</strong>";
						echo "<br>";
						echo "<aside style='margin-left:120px;'>";
						echo "<div style='float:left; color:green; font-family:Arial;' >Likes : ".$TLike."</div>";
						echo "<br>";
						echo "<div style='float:left; color:red; font-family:Arial; text-indent:40px;'>Dislikes : ".$TDislike."</div>";						echo "</aside>";
						
						echo "</section>";
						echo "<hr style='clear:both;'>";
						
					}
					
					$number++;
					
				}
				
				
			
	}


?>
</main>
</body>
</html>