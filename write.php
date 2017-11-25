<?php
include 'db_conn.php';

if(!(isset($_POST["title"]) && isset($_POST["name"]) && isset($_POST["pw"]))){
	echo "Invalid value input";
	exit();
}

if((empty($_POST["title"]) || empty($_POST["name"]) || empty($_POST["pw"]))){
	echo "Invalid value input";
	exit();
}

$title = $_POST["title"];
$name = $_POST["name"];
$pw = $_POST["pw"];
$memo = $_POST["memo"];
$date = date("Y-m-d");

$sql = "INSERT INTO board (title,name,pw,memo,wdate) VALUES ('".mysql_real_escape_string($title)."','"
															.mysql_real_escape_string($name)."','"
															.mysql_real_escape_string($pw)."','"
															.mysql_real_escape_string($memo)."','"
															.mysql_real_escape_string($date)."')";
$result = mysql_query($sql, $link) or die("SQL 에러");

if($result == true)
	header('Location: ./list.php');
else
	echo "Invalid Query";
?>
