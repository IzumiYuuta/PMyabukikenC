<?php
$url = "http://" . $_SERVER["HTTP_HOST"] .$_SERVER["REQUEST_URI"];

$qrurl = "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=";
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css.css">
<title>商品紹介</title>
</head>
<body>
<?php
if (isset($_GET['y_id'])) {

    require_once 'database_conf.php';

    require_once 'h.php';
    try {

    $db = new PDO($dsn, $dbUser, $dbPass);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT * FROM syouhin inner join seisansya on syouhin.s_id=seisansya.s_id where y_id=:y_id';
    $prepare = $db->prepare($sql);
    $prepare->bindValue(':y_id', $_GET['y_id'], PDO::PARAM_STR);
    $prepare->execute();
    $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $syousai) {
                ($syousai['y_name']);
                ($syousai['s_name']);
                ($syousai['s_sanchi']);
                ($syousai['year']);
                ($syousai['month']);
                ($syousai['day']);
                ($syousai['y_koe']);

        }
    } catch (PDOException $e) {
      echo 'エラーが発生しました。内容: ' . h($e->getMessage());
    }
}
?>
<div id="center01">
<h1>商品紹介画面</h1>
<div id="center02">
<p>商品名</p>
<p><?php echo ($syousai['y_name']);?></p>
<p>生産者</p>
<p><?php echo ($syousai['y_name']);?></p>
<p>生産地</p>
<p><?php echo ($syousai['s_sanchi']);?></p>
<p>出荷日</p>
<p><?php echo ($syousai['year']);?>年<?php echo ($syousai['month']);?>月<?php echo ($syousai['day']);?>日</p>
<p>生産者の声</p>
<p><?php echo ($syousai['y_koe']);?></p>
<form action="<?=$qrurl.$url ?>" method="post">
<input id="submit_botton2" type='submit' value="QRコードを表示"/>
</form>
</div>
</div>
</body>
</html>
