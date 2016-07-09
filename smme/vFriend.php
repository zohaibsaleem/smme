<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="include/style.css">
<style>
td,th,table
{
	border:solid 1px #000;
}
</style>
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
		mysql_connect("localhost","root","");
		mysql_select_db("smme");
		if(isset($_SESSION['user_id']))
		{
		echo $user_id = $_SESSION['user_id'];
		
		$query = "SELECT * FROM friend_table WHERE user_id='$user_id'";
		
		$run = mysql_query($query);
		?>
		<table>
            
            	<tr>
                	<th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>DOB</th>
                </tr>
        <?php
		while($row = mysql_fetch_array($run))
		{
		$friend = $row['friend_id'];
		
		$query1 = "SELECT * FROM user_table WHERE user_id='$friend'";
		
		$run1 = mysql_query($query1);
		$row1 = mysql_fetch_array($run1);
		
		
			$id = $row1['user_id'];
			$name = $row1['name'];
			$email = $row1['email'];
			$dob = $row1['DOB'];
			?>
			<tr>
            	<td><?php echo $id; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $dob; ?></td>
            </tr>
          

           
<?php 
// End of While Loop 
		} 
		
		//End of If Statment
		}
?>
  </table>
  </main>
</body>
</html>