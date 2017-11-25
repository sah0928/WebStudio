<!--edit.php를 통해 바뀐 내용이 최종적으로 db에 올라간다-->
<?php
include 'db_conn.php';

if(!(isset($_POST["title"]) && isset($_POST["name"]) && isset($_POST["pw"]) && isset($_GET["num"]))){
	echo "Invalid value input";
	exit();
}

if((empty($_POST["title"]) || empty($_POST["name"]) || empty($_POST["pw"]) || empty($_GET["num"]))){
	echo "Invalid value input";
	exit();
}

$num = $_GET["num"];
$title = $_POST["title"];
$name = $_POST["name"];
$pw = $_POST["pw"];
$memo = $_POST["memo"];

$sql = "UPDATE board SET title = '".mysql_real_escape_string($title).
						"',name = '".mysql_real_escape_string($name).
						"',pw = '".mysql_real_escape_string($pw).
						"',memo = '".mysql_real_escape_string($memo).
						"' WHERE num = ".$num;

$result = mysql_query($sql, $link) or die("SQL 에러");

if($result == true) {
	header('Location: ./list.php');
}
else {
	echo "Invalid Query";
}
?>
