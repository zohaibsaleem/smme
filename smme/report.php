<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="include/style.css">
</head>
<style>
	h1
	{
			color:green;
			text-align:center;
	}
	section
	{
	
		border-radius:10px;
		-webkit-box-shadow: 2px 2px 3px green, -2px -2px 3px green;
		
		background:#DDD;
		width:90%;
		height:100px;
		margin-left:5%;<em></em>
	}
</style>

<body>
<main>
<?php

session_start();

include 'header.php';

?>
	<img style="margin-left:10%; margin-top:50px; margin-bottom:50px;" src="snme.png">
    
    <section >
    	<form method="post" action="reportGenerate.php">
               <label>Search by Subject</label>
			<select name="subject">
			<option value="" >---ALL---</option>
				<?php
					mysql_connect("localhost","root","");
					mysql_select_db("smme");
					
					$user_id = $_SESSION['user_id'];
			//	if(isset($_SESSION['user_id']))
			//	{
	
					//	$user_id = $_SESSION['user_id'];
						$query="SELECT  * FROM post_table WHERE user_id='$user_id'";
						$result = mysql_query($query) or die("WRONGGGGGGG");
						while($row = mysql_fetch_array($result))
						{
							$subject = $row['subject'];
							if($subject!="")
							{
								echo "<option value='$subject'>$subject</option>";
							}
						}
						
			//	}
	
				?>
			</select>
			<label>Post Type</label>
			<select name="post_type">
				<option value="">--All--</option>
				<option value=1>Picture Post</option>
				<option value=0>Status Post</option>
			</select>
			
			
			 <label>From</label>
                <input type="date" name="from" >
                
               	<label>To</label>
                <input type="date" name="to">


		

         
			<input   type="submit" name="submit">
           
            <input  type="reset" name="Reset">
            
			
		
                
		</form>
    
    </section>
</main>
</body>
</html>