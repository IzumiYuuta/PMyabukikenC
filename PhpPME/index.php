<?php
if ( isset($_POST['select']) ) {
switch($_POST['select']) {
case "生産者":
header("Location:seisansya.php");
break;
case "販売者":
header("Location:syouhinichiran.php");
break;
}
}
?>
<!DOCTYPE html>
<html long="ja">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css.css">
<title>ログイン画面</title>
</head>
<body>
<div id="center01">
<h1>利用者選択</h1>
<form method="post">
<p>選択して移動ボタンを押して下さい。</p>
<p>
    <input type="radio" name="select" value="生産者">生産者
</p>
<p>
    <input type="radio" name="select" value="販売者">販売者
</p>
<p>
    <input id="submit_botton" type="submit" value="移動">
</p>
</form>
</div>
</body>
</html>
