<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php

	include 'config.php';
	$like=$_GET['li'];
	$pid= $_GET['pid'];

	$like=$like-1;
	$sql="UPDATE posts SET Likes ='$like'  WHERE postID='$pid'";
					

			$result=mysqli_query($conn,$sql) or die("query failed");
			header("refresh:0 url = posts.php");
			
			mysqli_close($conn);

	?>

</body>
</html>