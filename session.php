<?php
session_start();
if (!isset($_SESSION['name'])){
 echo "<h3>Access Denied..!</h3>";
 echo " please <a href='login.php'> login</a> Now";
 //include 'navbar.php';
 exit;
}else{


echo "<p style='color:dodgerblue;font-size:22px;'>".$_SESSION['name']." 's</p> ";
echo "<a href='logout.php'> logout</a>";
}
?>