<!--삭제버튼을 눌렀을때-->
<?php
include 'db_conn.php';
if(!(isset($_POST["pw"]) && isset($_POST["num"]))){
	echo "Invalid password";
	exit();
}
$pw = $_POST["pw"];
$num = $_POST["num"];

$sql = "SELECT pw FROM board WHERE num = " . $num;
$result = mysql_query($sql, $link) or die("SQL 에러");

$row = mysql_fetch_array($result);

// 입력한 비밀번호와 데이터베이스에 있는 비밀번호 확인
if(!($pw === $row["pw"])){
	echo "Incorrect password";
	exit();
}

$sql = "DELETE FROM board WHERE num = " . $num . " AND pw = '" . $pw . "'";
$result = mysql_query($sql, $link) or die("SQL 에러");

if($result == true){
	header('Location: ./list.php');
}
else{
	echo "Invalid password";
}
?>
