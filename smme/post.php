 <?php
session_start();

		mysql_connect("localhost","root","");
		mysql_select_db("smme");
		
		if(isset($_SESSION['user_id']))
		{
		$user_id = $_SESSION['user_id'];
		
		
?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
 <link rel="stylesheet" href="jquery/jquery-ui.css">

  <script src="jquery/jquery.js"></script>
  <script src="jquery/jquery-ui.js"></script>
  
  <link rel="stylesheet" href="jquery/style.css">

  <style >
 

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
	
input[type="text"]
{
	border-color:black;
	border-radius:5px;
	height:30px;
	font-size:18px;
	color:#060;
	font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
textarea
{border-color:black;
	border-radius:5px;

color:#00F;
}
main
{
	background:url(include/bg-pattern.jpg) repeat-x center top;
	
}
body,html
{
	margin:0px;
	background:url(include/bg-body.jpg) repeat left bottom;
}


  </style>
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
  <script type="text/javascript">
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script type="text/javascript">
		function changeLikeDislike(type,id,pUser)
		{
      		var dataString = 'id='+ id + '&type=' + type + '&pUser=' + pUser;
			  $("#product_flash_"+id).show();
			  $("#product_flash_"+id).fadeIn(400).html('<img src="images/loading.gif" />');
			  $.ajax({
			  type: "POST",
			  url: "changeLikeDislike.php",
			  data: dataString,
			  cache: false,
					  success: function(result)
					  {
							   if(result)
							   {
								var position=result.indexOf("||");
								 var warningMessage=result.substring(0,position);
								  if(warningMessage=='success')
								   {
									 var successMessage=result.substring(position+2);
									 $("#product_flash_"+id).html('&nbsp;');
									
									 $("#product_"+type+"_"+id).html(successMessage);
								   }
								   
								   else
								   {
									 var errorMessage=result.substring(position+2);
									 $("#product_flash_"+id).html(errorMessage);
								   }
							   }
					  }
                   });
}
</script>

</head>

<body>
<main>
<?php include 'header.php'; ?>
<div id="tabs" style="width:620px; height:300px;">
  <ul>
    <li><a id="tabs" href="#tabs-1">Add Picture</a></li>
    <li><a id="tabs" href="#tabs-2">Update Status</a></li>
   
  </ul>
  <div id="tabs-1" >
    <p>
    	<form action="status.php" method="post" enctype="multipart/form-data">
        <table style="float:left; width:350px;" border="0">
        	<tr>
            	<td><label>Add Text</label></td>
                <td><input size="20" type="text" name="add_text" placeholder="Add some text"/>
                	<input type="hidden" name="post_type" value="1" />
            </tr>
        	<tr>
        		<td><label>Browse Picture: </label></td>
           		<td> <input colspan="2" type="file" name="uploadedimage" id="uploadedimage" onchange="readURL(this);" accept="image/*" required/></td> 
            </tr>
            <tr>
				<td></td>
            	<td><input type="submit" name="Upload_Now" value="Upload" /></td>
			
            </tr>
			
        </table>
         
        </form>
    <img style="float:right;" id="blah" src="img/images.jpg" alt="your image" />
    </p>
  </div>
  <div id="tabs-2">
    <p>
    	<form action="status.php" method="post">
        	<table>
            	<tr>
                	<td><label>Subject</label></td>
                    <td><input size="30" type="text" name="add_text" placeholder="Subject" /></td>
                    	<input type="hidden" name="post_type" value="0">
                </tr>
                
                <tr>
                	<td><label>Status</label></td>
                    <td><textarea rows="4" cols="56" name="status" placeholder="Type your status here..." ></textarea></td>
                </tr>
                
                <tr>
                	<td></td>
                    <td><input type="submit" name="Upload_Now" value="Update Status"</td>
                </tr>
            </table>
        
        </form>
    
    </p>
  </div>

</div>

<?php

//End of If Condition
}

//if(isset($_GET['status']))
//{
		mysql_connect("localhost","root","");
		mysql_select_db("smme");
		
		@$user_id = $_SESSION['user_id'];
		
		/*
		//USER Data Query
		$user_query = "SELECT * FROM user_table WHERE user_id='$user_id'";
		
		$user_result = mysql_query($user_query) or die("Erron in Query : $user_query ".mysql_error());
		
		$user_row = mysql_fetch_array($user_result);
		
	    $name = $user_row['name'];
		$image = $user_row['image'];
		
		if($image=="" || $image == NULL)
		{
				$image = "img/images.jpg";
		}
		
		*/
		
		
		
		//Post Query
		
		$query = "SELECT * FROM post_table WHERE user_id='$user_id' OR user_id IN(SELECT friend_id FROM friend_table WHERE user_id='$user_id')  ORDER BY post_id DESC " or die("ERRRRRRRRORRR = ".mysql_error());
		
		$result = mysql_query($query) ;
		
	while($row = mysql_fetch_array($result))
	{
		 mysql_num_rows($result);
		
		
		
		
		// Use for Like and Dislike
		$post_type = $row['post_type'];
		$post_id = $row['post_id'];
		$postOfUser = $row['user_id'];
		
		
		$subject = $row['subject'];
		$post= $row['post'];
		 $date = $row['date'];
		$subject = $row['subject'];
		 $f_date  = date("d M Y", strtotime($date));
		
		
		
		 $time = $row['time'];
			 $f_time  = date("g:i a", strtotime($time));
			 
			 
			 
			 //Extract User Name and Image
		$user_query = "SELECT * FROM user_table WHERE user_id='$postOfUser'";
		
		$user_result = mysql_query($user_query) or die("Erron in Query : $user_query ".mysql_error());
		
		$user_row = mysql_fetch_array($user_result);
		
	    $name = $user_row['name'];
		$image = $user_row['image'];
		
		if($image=="" || $image == NULL)
		{
				$image = "img/images.jpg";
		}
		//End of Extract User Name and Image
		
			 
			 		//Calculating Total Likes
					$query1 = "SELECT SUM(pLike) as total FROM like_table WHERE post_id=$post_id";
					$result1 = mysql_query($query1)or die("INFRA ".mysql_error());
					$r1 = mysql_num_rows($result1);
					if($r1>0)
					{
						
						$row1 = mysql_fetch_array($result1);
					
						 $like = $row1['total'];
					 
					}
					else
					{
						$like = 0;
					}
					//End Calculating Total Likes
					
					$query2 = "SELECT SUM(pDislike) as total2 FROM like_table WHERE post_id=$post_id";
					$result2 = mysql_query($query2) or die(mysql_error());
					if(mysql_num_rows($result2)>0)
					{
						
						$row2 = mysql_fetch_array($result2);
					
						$dislike = $row2['total2'];
					 
					}
					else
					{
						$dislike = 0;
					}
		?>
        <section style="width:500px; margin-top:10px; background-color:#E6E6E6; padding:10px;">
        
       
        
        <img style="width:75px; height:75px; float:left; " src="<?php echo $image; ?>"/>
         <h3 style="margin:0 auto; margin-left:90px; margin-top:15px; color:#03F;"><?php echo $name; ?></h3>
        <h4 style=" color:#999; margin-left:90px; margin-top:10px;"><?php echo $f_date; ?> at <?php echo $f_time;?></h4>
        
        <?php 
		
			if($subject != "" || $subject !=NULL)
			{
					echo "<h3>$subject</h3>";
			}
			
			if($post_type==1)
			{
		?>
	    		
		<img style="margin-top:10px; max-height:500px; max-width:500px; "  src='<?php echo $post; ?>'/>
		
		
        <?php
			}
			else
			{
					echo "<h3 style='color:#009;'>$post</h3>";
			}
	
		
		

     echo '<div class="product_flash" id="product_flash_'.$post_id.'">&nbsp;</div>';
	
        ?>
        	<button id="button" type="submit" value="Like" name="like" 
            onClick="changeLikeDislike('like','<?php echo $post_id; ?>','<?php echo $postOfUser; ?>')">Like</button>
            
            
         <?php  echo  '<span id="product_like_'.$post_id.'">'.$like.'</span>'; ?>
            
            
            
            <button type="submit" value="Dislike" name="dislike"
             onClick="changeLikeDislike('dislike','<?php echo $post_id; ?>','<?php echo $postOfUser; ?>')">Dislike</button>
         <?php echo  '<span id="product_dislike_'.$post_id.'">'.$dislike.'</span>'; 
		 
		 // End of Section
		 echo "</section>";
		 

	} // While loop End

?>
</main>
</body>
</html>