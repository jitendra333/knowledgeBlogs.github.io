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
		a{text-decoration: none}
		
		.fine a{
			text-decoration: none;
			color:dodgerblue;
			
			font-size: 16px;
		}
	</style>
</head>
<body>
	<center>
	<div>
	<?php
	 include 'config.php';
	 
	 if(!isset($_GET['an'])){
	 	$author=$_SESSION['name'];
	 }else{
	 	$author = $_GET['an'];
	 }
$sql1="SELECT * FROM posts WHERE author= '$author' ORDER BY postID DESC";
$result1=mysqli_query($conn,$sql1) or die("show post query failed");
$numrows=mysqli_num_rows($result1);
?>


<?php while ($rows=mysqli_fetch_assoc($result1)) { ?>
<!-- <table id="posttable" cellspacing="0" cellpadding="5">	
	<tr><td style="font-size:20px;font-weight: bold;"><?php echo $rows['title'];?></td></tr>
		<tr><td style="font-size:14px;"> by <i style="color:blue;"><a href="author.php?an=<?php echo $rows['author'];?>"><?php echo $rows['author']."</a></i> on " .$rows['date'];?></td></tr>
		<tr><td style="font-size:16px;"><?php echo $rows['content'];?></td></tr>
</table> -->

<table id="posttable" cellspacing="0" cellpadding="5">	
	<tr><td style="font-size:20px;font-weight: bold;"><?php echo $rows['title'];?></td></tr>
		<tr><td class="fine" style="font-size:14px;"> by <i style="color:blue;"><a  href="author.php?an=<?php echo $rows['author'];?>"><?php echo $rows['author']."</a></i> on " .date('d M Y, H.i.s A', strtotime($rows['date']));?></td></tr>

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
<?php } ?>

 <?php
mysqli_close($conn);
?>
</div>
</center>

</body>
</html>