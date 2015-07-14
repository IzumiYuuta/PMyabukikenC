<?php
if ( isset($_POST['select']) ) {
switch($_POST['select']) {
case "生産者":
header("Location:http://localhost/PhpPME/akaunnto.php");
break;
case "消費者":
header("Location:http://localhost/PhpPME/syouhin.php");
break;
}
}
?>
<!DOCTYPE html>
<html long="ja">
<head>
<meta charset="UTF-8">
<title>ログイン画面</title>
</head>
<body>
<form method="post">
<p>
<input type="radio" name="select" value="生産者">生産者
<input type="radio" name="select" value="消費者">消費者
</p>
<p><input type="submit" value="移動"></p>
</form>
</body>
</html>
