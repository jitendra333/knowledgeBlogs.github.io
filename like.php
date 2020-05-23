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

	$liked=$like+1;
	$sql="UPDATE posts SET Likes ='$liked'  WHERE postID='$pid'";
					

			$result=mysqli_query($conn,$sql) or die("query failed");
			  
			header("refresh:0 url = posts.php?done=$pid");
			
			mysqli_close($conn);

	?>

</body>
</html>