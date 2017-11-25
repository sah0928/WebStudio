<!DOCTYPE>      <!--수정 버튼을 눌렀을때!-->
<?php
include 'db_conn.php';

if(!(isset($_POST["pw"]) && isset($_POST["num"]))){
	echo "Invalid password";
	exit();
}

$pw = $_POST["pw"];
$num = $_POST["num"];

$sql = "SELECT title, name, pw, memo FROM board WHERE num = " . $num;


$result = mysql_query($sql, $link) or die("SQL 에러");
$row = mysql_fetch_array($result);

// 입력한 비밀번호와 데이터베이스에 있는 비밀번호 확인
if(!($pw === $row["pw"])){
	echo "Incorrect password";
	exit();
}

?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="edit.css">
	<title>글 수정</title>
</head>
<body>
	<div id="edit">
		<form action="update.php?num=<?= $num ?>" method="post">
			<p>제목 <input type="text" name="title" size="40" value="<?= $row["title"] ?>"></p>
			<p>이름 <input type="text" name="name" size="40" value="<?= $row["name"] ?>"></p>
			<p>비밀번호 <input type="password" name="pw" size="40"></p>
			<p>내용</p>
			<textarea cols="50" rows="20" name="memo"><?= $row["memo"] ?></textarea> <br>
			<input type="submit" value="수정하기">
		</form>
		<form action="list.php">
			<input type="submit" value="취소">
		</form>
	</div>
</body>
</html>
