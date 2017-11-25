<?php                   <!--수정버튼이나 삭제버튼을 눌렀을때 니가 쓴글이 맞는지 확이하는과정(비밀번호로)-->
if(!(isset($_GET["num"]) && isset($_GET["type"]))){
	echo "Invalid value input";
	exit();
}

$num = $_GET["num"];
$type = $_GET["type"];
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>삭제</title>
</head>
<body>
	<?php
	if($type === "remove"){
	?>
	<form action="remove.php" method="POST">
		<p>비밀번호 입력</p>
		<input type="password" name="pw">
		<input type="hidden" name="num" value="<?= $num ?>">
		<input type="submit">
	</form>
	<?php
	} else if($type === "edit"){
	?>
	<form action="edit.php" method="POST">
		<p>비밀번호 입력</p>
		<input type="password" name="pw">
		<input type="hidden" name="num" value="<?= $num ?>">
		<input type="submit">
	</form>
	<?php }?>
</body>
</html>
