<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Register here</h1>
		<center><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
			<table border="1" cellspacing="0" cellpadding="10px">
				<tr><td>First name</td><td><input type="text" name="first"></td><tr>
				<tr><td>Last name</td><td><input type="text" name="last"></td><tr>
				<tr><td>password</td><td><input type="text" name="pass"></td><tr>	
				<tr><td>confirm password</td><td><input type="text" name="cpass"></td><tr>
					<tr><td></td><td><input type="submit" name="submit"></td><tr>
			</table>
		</form>
<?php
		if(isset($_POST['submit'])){

			$f = $_POST['first'];
			$l = $_POST['last'];
			$p = $_POST['pass'];
			$cp = $_POST['cpass'];

		if($f=="" || $l=="" || $p=="" || $cp==""){
			echo "<br><p style='color:red'>Please fill all the fields</p>";
		}else{
			if($p != $cp){
				echo "<br><b><p style='color:red'>password did not match</p><b>";
			}else{
			include 'config.php';

			$sql="INSERT INTO users(name,lastname,password)
					VALUES('$f','$l','$cp')";

			$result=mysqli_query($conn,$sql) or die("query failed");
			
			mysqli_close($conn);
			?>
			<script>
				alert("user registered successfull");
			</script>
			<?php
			header("refresh:2 url = regis.php");
			echo "<br><i style='color:green' >you registered successfully</i>";
			}

            	}
		}

?>
<hr>
<br>
<p>already a user...please-</p><a href="login.php"><button>login now</button></a>
</center>
</body>
</html>