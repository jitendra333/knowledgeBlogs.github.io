<?php
	include 'session.php';
	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		.navbar {
	height: 40px;
	line-height: 40px;
	padding-left: 20px;
	border:solid ; 
	margin-top:0px; 
	margin-bottom: 10px;
	background-color:skyblue;
}

.navbar a{
	display: inline-block;
	text-decoration: none;
	color: dodgerblue;
	margin-right: 50px;
	font-size: 18px;
	background-color: yellow;
	height: 38px;
	padding-left: 5px;
	padding-right: 5px;
	border:solid 1px lightgray;
}
	</style>
</head>
<body>
	<div class="navbar">
		<a href="posts.php">Post</a>
		<a href="login.php">login</a>
		<a href="author.php"><?php echo $_SESSION['name']; ?></a>
		<a href="logout.php">logout</a>
	</div>

</body>
</html>