<?php
	
	include 'head.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#posttable{
			width:50%;
			border:1px solid black;
			border-radius: 10px;
			padding-bottom: 10px;
			padding-top: 10px;
			margin-bottom: 10px;
		}

		a{
			text-decoration: none;
		}
		h2{
			margin:5px ;
		}
		.fine a{
			text-decoration: none;
			color:dodgerblue;
			
			font-size: 16px;
		}
		.active{
			text-decoration: none
			background-color: orange;
			color:orange;

		}
		.yellow{
			color:yellow;
		}
	</style>
</head>
<body>
	<center><h2>Post here</h2>
		<!-- post form start -->
		<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
			<table border="1" cellspacing="0" cellpadding="10px">
				<tr><td>Title</td><td colspan="2"><input type="text" name="title" size="40"></td><tr>
				<tr><td>Content</td><td colspan="2"><input type="text" name="content" size="60"></td><tr>
					
				
					<tr><td></td><td align="left"><input type="file" name="image" size="20"></td><td align="center"><input type="submit" name="post" value="post"></td></tr>
			</table>
		</form>
		<!-- post form end -->
		<hr>

<?php
if(isset($_POST['post'])){

	$t = $_POST['title'];
	$c = $_POST['content'];

    include 'config.php';
	if($t=="" || $c==""){
			echo "<br><p style='color:red'>Please fill all the fields</p>";
		}else{
			if (isset($_FILES['image'])) {
	
	$mypic = $_FILES['image']['name']; 
	$tmp = $_FILES['image']['tmp_name'];
	$size = $_FILES['image']['size'];
	$type = $_FILES['image']['type'];

	move_uploaded_file($tmp, "images/$mypic");

	// if ($type=="video/mp4" || $type=="video/webm" ) {
	// 	echo "video UPLOAD-- Successful !.  $mypic<br>";
	// echo	"<video class='fram' src='images/$mypic'  autoplay='autoplay' controls  loop muted></video>";
	// }else{
	// echo "<br>IMAGE UPLOAD -- Successful !.<br> ";
	// //echo " <br><img class='fram' src='images/$mypic' >";
	// }
}
			
			

			$sql="INSERT INTO posts(title,content,author,post_img)
					VALUES('$t','$c','".$_SESSION['name']."','$mypic')";

			$result=mysqli_query($conn,$sql) or die("query failed");
			
			
			}
	
}
?>
<div>
	<?php
	 include 'config.php';
$sql1="SELECT * FROM posts ORDER BY postID DESC";
$result1=mysqli_query($conn,$sql1) or die("show post query failed");
$numrows=mysqli_num_rows($result1);
?>


<?php while ($rows=mysqli_fetch_assoc($result1)) { ?>
<table id="posttable" cellspacing="0" cellpadding="5">	
	<tr><td style="font-size:20px;font-weight: bold;"><?php echo $rows['title'];?></td></tr>
		<tr><td class="fine" style="font-size:14px;"> by <i style="color:blue;"><a href="author.php?an=<?php echo $rows['author'];?>"><?php echo $rows['author']."</a></i> on " . date('d M Y, H.i.s A', strtotime($rows['date'])); ?></td></tr>

		<!-- post image display -->
		<tr><td align="center"> <?php
		if($rows['post_img']!=""){
		$dir = "images";
$open = opendir($dir);
// while($files = readdir($open) ){
// 	//echo "files are ".$files;
// 	//echo " <br>";
// $extension = pathinfo($files, PATHINFO_EXTENSION);
// //echo $extension."<br>";
//  if ($files!="." && $files!=".." && $extension!="mp4" && $extension!="webm") {
// 	//echo "files are ".$files;
// 	//echo " <br>";
	echo " <img src='$dir/".$rows['post_img']."' width='70px' height='70px' border='1'> ";
// 	}
// }
 }?></td></tr>

 <!-- post image display end-->

		<tr><td style="font-size:16px;"><?php echo $rows['content'];?></td></tr>
		<?php

		 $lk = $rows['Likes'];
		if(isset($_GET['done'])){
			if ($_GET['done']==$rows['postID']){
				$active="active"; ?>
				<tr ><td  style="font-size:14px;background-color: gray;"><a style="color:blue;" href="unlike.php?li=<?php echo $rows['Likes'];?> & pid=<?php echo $rows['postID'];?>"> likes <?php echo $rows['Likes'];?></a></td></tr>
			<?php }else{
				$active="yellow";?>
				<tr ><td  style="font-size:14px;background-color: gray;"><a style="color:white;" href="like.php?li=<?php echo $rows['Likes'];?> & pid=<?php echo $rows['postID'];?>"> likes <?php echo $rows['Likes'];?></a></td></tr>
			<?php }
		 ?>
			
		<?php } else{ ?>
		<tr ><td style="font-size:14px;background-color: gray;"><a style="color:white;" href="like.php?li=<?php echo $rows['Likes'];?> & pid=<?php echo $rows['postID'];?>"> likes <?php echo $rows['Likes'];?></a></td></tr>
	<?php } ?>
</table>
<?php }
//$liked=$rows['Likes'] +1;

 ?>


 <?php
//header("refresh:0 url = posts.php?success");
mysqli_close($conn);

?>
</div>

</body>
</html>