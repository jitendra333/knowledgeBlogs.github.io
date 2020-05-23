<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center><h1>Login here</h1>
		<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
			<table border="1" cellspacing="0" cellpadding="10px">
				<tr><td>First name</td><td><input type="text" name="first"></td><tr>
				
				<tr><td>password</td><td><input type="text" name="pass"></td><tr>	
				
					<tr><td></td><td><input type="submit" name="login"></td><tr>
			</table>
		</form>

		<?php
		if(isset($_POST['login'])){
			session_start();

			$_SESSION['name'] = $_POST['first'];
			
			$p = $_POST['pass'];
			

		if($_SESSION['name']=="" || $p==""  ){
			echo "<br><p style='color:red'>Please fill all the fields</p>";
		}else{
			include 'config.php';

			$sql="SELECT * FROM users WHERE name='".$_SESSION['name']."' AND password='$p'";
					

			$result=mysqli_query($conn,$sql) or die("query failed");
			$numrows=mysqli_num_rows($result);
			if($numrows==0){
				echo "<br><p style='color:red'>wrong username or password</p>";
			}else{
			echo "<br><i style='color:green' >Login  successfull</i>";
			 echo	"<h3>".$_SESSION['name']." 's</h3> session started.";
			header("refresh:2 url = posts.php");
			include 'loader.php';
			
				}
	mysqli_close($conn);	}
	}
			?>
			<h3>OR</h3>
			<a href="regis.php">Regeister now</a>
</center>
</body>
</html>