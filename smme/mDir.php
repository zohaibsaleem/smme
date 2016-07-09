<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="include/style.css">
</head>

<body>
<main>
<!--Display Member of Networks-->
<table>
	<tr>
    	<td>Members ID</td>
        <td>Members Names</td>
    </tr>
<?php
session_start();
include 'header.php';
?>

<?php

		mysql_connect("localhost","root","");
		mysql_select_db("smme");
		
		echo $a = @$_SESSION['user_id'];
	$query1 = "select * from user_table where user_id!='$a'";
	
	$run = mysql_query($query1);
	
	while($row = mysql_fetch_array($run))
	{
		$id = $row['user_id'];
		$name = $row['name'];
		$image = $row['image'];
		if($image=="" || $image == NULL)
		{
				$image = "img/images.jpg";
		}

?>

    <tr>
    <form method="post" action="test.php">
    	<td><?php echo $id; ?></td>
        <td><img src="<?php echo $image; ?>" width="75" height="75" title="<?php echo $name; ?>"></td>
        <td><?php echo $name; ?></td>
        <td>
        	<input type="hidden" name="fid" id="fid" value="<?php echo $id;?>"/>
            <input type="hidden" name="fname" id="fname" value="<?php echo $name;?>" />
            <input type="submit" name="submit" value="friend <?php echo $name;?>  "/> </td>
       <!-- <td>
        </td>-->
    </form>
    </tr>
    <?php }?>
    
    
</table>
</main>
</body>
</html>