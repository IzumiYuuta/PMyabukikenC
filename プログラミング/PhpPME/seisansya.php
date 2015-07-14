<?php
if ( isset($_POST['select']) ) {
switch($_POST['select']) {
case "生産者登録":
header("Location:seisansyatouroku.php");
break;
case "出荷情報登録":
header("Location:syouhintouroku.php");
break;
}
}
?>
<!DOCTYPE html>
<html long="ja">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css.css">
<title>生産者画面</title>
</head>
<body>
<div id="center01">
<h1>生産者画面</h1>
<form method="post">
<p>選択して移動ボタンを押して下さい。</p>
<p>
    <input type="radio" name="select" value="生産者登録">生産者登録
</p>
<p>
    <input type="radio" name="select" value="出荷情報登録">出荷情報登録
</p>
<p>
    <input id="submit_botton" type="submit" value="移動">
</p>
</div>
</form>
</body>
</html>
