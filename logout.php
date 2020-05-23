<?php
session_start();
session_unset();
session_destroy();
//echo "<h3> session destroyed.</h3>";
echo " <br><h2>logout successful.</h2><br><br> you will redirect to login page.";
header("refresh:2 url = login.php");
include 'loader.php';



?>