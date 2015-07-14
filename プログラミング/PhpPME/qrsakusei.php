<?php
$id = print($_SERVER["REQUEST_URI"]);
echo $id;
$act='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl='.$id;
echo $act;
?>
<!DOCTYPE html>
<html long="ja">
<head>
<meta charset="UTF-8">
<title>QRコード作成</title>
</head>
<body>
<form action="<?=$act ?>" method="post">
<input type='submit' value="QRコードを表示"/>
</form>
    


</body>
</html>
