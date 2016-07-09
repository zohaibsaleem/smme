<!doctype html>
<html>
<head lang="en">
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="include/style.css">
	<title>jQuery Image Crop - w3bees.com</title>
	<link rel="stylesheet" type="text/css" href="css/imgareaselect-animated.css" />
	<!-- scripts -->
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.imgareaselect.pack.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<style>
	a, a h1{
		font-family: Georgia, "Times New Roman", Times, serif;
		font-size: 1.2em;
		color: #645348;
		font-style: italic;
		text-decoration: none;
		font-weight: 100;
		padding: 10px;
	}
	body{
		font: 12px Arial,Tahoma,Helvetica,FreeSans,sans-serif;
		text-transform: inherit;
		color: #582A00;
		background: #E7EDEE;
		width: 100%;
		margin: 0;
		padding: 0;
	}
	.wrap{
		width: 700px;
		margin: 10px auto;
		padding: 10px 15px;
		background: white;
		border: 2px solid #DBDBDB;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
		text-align: center;
		overflow: hidden;
	}
	img#uploadPreview{
		border: 0;
		border-radius: 3px;
		-webkit-box-shadow: 0px 2px 7px 0px rgba(0, 0, 0, .27);
		box-shadow: 0px 2px 7px 0px rgba(0, 0, 0, .27);
		margin-bottom: 30px;
		overflow: hidden;
	}
	input[type="submit"]{
		border-radius: 10px;
		background-color: #61B3DE;
		border: 0;
		color: white;
		font-weight: bold;
		font-style: italic;
		padding: 6px 15px 5px;
		cursor: pointer;
	}
	input[type="reset"]{
		border-radius: 10px;
		background-color: #61B3DE;
		border: 0;
		color: white;
		font-weight: bold;
		font-style: italic;
		padding: 6px 15px 5px;
		cursor: pointer;
	}
	</style>
</head>
<body>
<main>

<div class="wrap">
	<h1><a href="#">Upload Picture</a></h1>
	<!-- image preview area-->
	<img id="uploadPreview" style="display:none;"/>
	
	<!-- image uploading form -->
	<form action="_upload.php" method="post" enctype="multipart/form-data">
	
	<table><tr>
		<td>File</td>
		<td><input id="uploadImage" type="file" accept="image/jpeg" name="image" /></td>
	</tr>
	
	
    <tr>
    	<td><input type="reset" name="reset" id="reset" value="Reset"></td>
	
      <td><input type="submit" name="Upload" id="register" value="Upload"></td>
	
    </tr>
	
		</table>

		<!-- hidden inputs -->
		<input type="hidden" id="x" name="x" />
		<input type="hidden" id="y" name="y" />
		<input type="hidden" id="w" name="w" />
		<input type="hidden" id="h" name="h" />
	</form>

</div><!--wrap-->
</main>
</body>
</html>