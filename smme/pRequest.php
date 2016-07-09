<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="include/style.css">
</head>
<script src="jquery/jquery.js"></script>
<script>
			$(document).ready(function()
								{
									$("tr:odd").css("background-color","yellow");
									$("tr:even").css("background-color","#00FF80");
								} // Even and ODD as well
			);
				
		
		</script>
<body>
<main>
<?php
session_start();
include 'header.php';
?>
<?php
if(isset($_SESSION['user_id']))
{
	
	
	

echo $a = $_SESSION['user_id'];

	mysql_connect("localhost","root","");
	mysql_select_db("smme");
	
	$query = "SELECT * FROM pending_request WHERE friend_id='$a'";
	
	$result = mysql_query($query);
	
	// Checking: Is any pending request?
	if(mysql_num_rows($result)>0)
	{
	?>
    <table>
    <h3><?php echo @$_GET['Success'];?></h3>
    <h3><?php echo @$_GET['Reject'];?></h3>
    	<tr>

        	<th>User ID</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>User DOB</th>
            <th>Accept</th>
            <th>Reject</th>
   
        </tr>
    
    <?php	
		while($row = mysql_fetch_array($result))
		{
			 $pRid = $row['id'];
			 $user_id = $row['user_id'];
			
			
			$query1 = "SELECT * FROM user_table WHERE user_id='$user_id'" ;
			$result1 = mysql_query($query1);
			
			$row1 = mysql_fetch_array($result1);
			
		
		    $id = $row1['user_id'];
			$name = $row1['name'];
			$email = $row1['email'];
			$dob = $row1['DOB'];
		?>
        <tr>
        <form method="post" action="friend.php">
        	<td><?php echo $id; ?></td>
            <td><?php echo $name; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $dob; ?></td>
            <td><input type="submit" name="accept" id="accept" value="Accept" /></td>
            <td><input type="submit" name="reject" id="reject" value="Reject" />
            	<input type="hidden" name="pRid" id="pRid" value="<?php echo $pRid; ?>"/>
                <input type="hidden" name="id" id="id" value="<?php echo $id; ?>"></td>
        </form>
        </tr>
        
<?php 
//While Loop End
}


//End of Session Checking Condition
}
else
{
	
	echo "<h3>Sorry, You have no Pending Request.</h3>";
}
// End of Checking Pending Request
}

 ?>
</table>
</main>
</body>
</html>