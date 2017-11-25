<!--제목을 눌렀을때 글의 상세 정보가 나타나는 페이지-->
<!DOCTYPE>
<?php
include 'db_conn.php';

if(!isset($_GET["num"])){
	echo "Invalid value input";
	exit();
}

$num = $_GET["num"];

$sql = "SELECT title, name, memo, wdate FROM board WHERE num = " . $num;

// 데이터 가져오기
$result = mysql_query($sql, $link) or die("SQL 에러");
$row = mysql_fetch_array($result);

?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="read.css">
	<title><?= $row["title"] ?></title>
</head>
<body>
	<div id="read">
		<p>제목 : <?= $row["title"] ?></p>
		<p>이름 : <?= $row["name"] ?></p>
		<p>작성일 : <?= $row["wdate"] ?></p>
		<p>내용</p>
		<p id="content"><?= $row["memo"] ?></p>
		<form action="identifypw.php" methoid="GET">
			<input type="hidden" name="num" value="<?= $num ?>">
			<input type="hidden" name="type" value="edit">
			<input type="submit" value="수정">
		</form>
		<form action="identifypw.php" methoid="GET">
			<input type="hidden" name="num" value="<?= $num ?>">
			<input type="hidden" name="type" value="remove">
			<input type="submit" value="삭제">
		</form>
		<form action="list.php">
			<input type="submit" value="목록가기">
		</form>
	</div>
</body>
</html>
