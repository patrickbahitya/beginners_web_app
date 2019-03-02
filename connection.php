<?php
$host="localhost";
$db_username="root";
$db_password="";
$db_name="registrationexamination_db";
//$link=@mysql_connect($host,$db_username,$db_password)or die("connection not established");
//mysql_select_db($db_name,$link)or die("database not selected");
$link=mysqli_connect($host,$db_username,$db_password,$db_name)or die("connection not established");





?>