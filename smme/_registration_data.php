<?php
session_start();
include 'header.php';
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

	if(!isset($_SESSION['user_id']))
	{
?>
<table border="0">
  <form name="form1" method="post" action="register.php">
  <?php
		if( isset($_GET['Accept']))
		{
			$image = $_GET['path'];
			echo "<img src='$image'>";
			
		}
		if(isset($_GET['Cancel']))
		{
		$image = $_GET['path'];
			@unlink($image);
		}
	?>
    <tr>
    	
    	<input type='hidden' value="<?php echo $_GET['path']; ?>" name='image'>
    </tr>
    <tr>
      <td><label>Name</label></td>
      <td><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
      <td><label>Email</label></td>
      <td><input type="email" name="email" id="email"></td>
    </tr>
    <tr>
      <td><label>Password</label></td>
      <td><input type="password" name="password" id="password"></td>
    </tr>
    <tr>
      <td><label>Birth Date</label></td>
      <td><input type="date" name="dob" id="dob"></td>
    </tr>
    <tr>
    	<td  ><label>Male</label>
        <input type="radio" name="gender" value="male" required></td>
   
    	<td colspan="2"><label>Female</label>
      <input type="radio" name="gender" value="female"></td>
    </tr>
    <tr>
    	<td><label>User Type</label></td>
        <td>
        	<select name="user_type">
            	<option value="home">Home User</option>
                <option value="corporate">Corporate User</option>
            </select>
        </td>
    </tr>
    
   
    <tr>
      <td><input type="submit" name="register" id="register" value="Register"></td>
    </tr>
  </form>
</table>
<?php
	}
	else
	{
			header("Location:index.php");
	}
?>
</main>
</body>
</html>
