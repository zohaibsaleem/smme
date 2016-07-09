<?php

session_start();
include 'header.php';
		mysql_connect("localhost","root","");
		mysql_select_db("smme");
		
		if(isset($_SESSION['user_id']))
		{
		$user_id = $_SESSION['user_id'];
		
		
		}

$type=$_POST['type'];
$id=$_POST['id'];
$pUser=$_POST['pUser'];

	$query = "SELECT * FROM like_table WHERE post_id=$id and friend_id=$user_id ";
	$result = mysql_query($query);
	if(mysql_num_rows($result)>0)
	{
		echo "error||Already Voted";
	}
	else
	{
		if($type=='like')
		{
       		$fieldName='pLike';
			$count = "Liked";
    	}
		elseif($type=='dislike')
		{
       		$fieldName='pDislike';
			$count = "Disliked";
    	}
		else
		{
       		die();
    	}
		
		// Insert Like / Dislike into table
		$query = "INSERT INTO like_table(user_id,post_id,friend_id,date,$fieldName) 
		VALUES($pUser,$id,$user_id,CURDATE(),1) ";
		
		$result = mysql_query($query) or die(" INFRA Error in MySQL Query ".mysql_error());
		
		
		// Find total no of Like or Dislike
		$query = "SELECT SUM($fieldName) as total FROM like_table WHERE post_id=$id";
		$result = mysql_query($query) or die(" INFRA 1 Error in MySQL Query ".mysql_error());
		$row = mysql_fetch_array($result);
		
		//$count = $row['total'];
		 echo "success||".$count;
		 
	}
/*
if(isset($_COOKIE['likeDislike'."_".$id]))
    echo "error||Already Voted";
else{
    if($type=='like'){
       $fieldName='pLike';
    }elseif($type=='dislike'){
       $fieldName='pDislike';
    }else{
       die();
    }
	
	
    $query="update product set $fieldName=$fieldName+1 where id='$id'";
    $res=mysql_query($query);
    
    $query="select $fieldName from product where id='$id'";
    $res=mysql_query($query);
    $result=mysql_fetch_array($res);
    $count=$result[$fieldName];
    
    $expire=time()+60*60*24*30;
    setcookie("likeDislike"."_".$id, "likeDislike"."_".$id, $expire);
    echo "success||".$count;
}
*/
?>