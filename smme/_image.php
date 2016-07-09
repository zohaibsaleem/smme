<!doctype html>

<html>
<head>
<link rel="stylesheet" type="text/css" href="include/style.css">
</head>
<body>
<main>
<?php

	echo $path =$_GET['path'];
	echo "<img src='$path'>";

?>

<form action="_registration_data.php?$path" >

<input type="hidden" value="<?php echo $path ?>" name="path">
<input type="submit" value="Cancel" name="Cancel">
<input type="submit" value="Accept" name="Accept">

</form>

</main>
</body>
</html>