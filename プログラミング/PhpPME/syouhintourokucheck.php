<?php
session_start();

mysql_connect('localhost','root','') or die(mysql_errno());
//echo 'BDに接続しました';
mysql_select_db('yasai') or die(mysql_errno());
//echo '<br/>DB「yasai」を選択しました';
mysql_query('SET NAMES UTF8');


if (!isset($_SESSION['join'])) {
header('Location:syouhintouroku.php');
exit();
}

if(!empty($_POST)){
    $sql = sprintf('INSERT INTO syouhin SET s_id="%s" , y_name="%s" , year="%s" , month="%s" , day="%s" , y_koe="%s"',
    mysql_real_escape_string($_SESSION['join'] ['s_id']),
    mysql_real_escape_string($_SESSION['join']['y_name']),
    mysql_real_escape_string($_SESSION['join']['year']),
    mysql_real_escape_string($_SESSION['join']['month']),
    mysql_real_escape_string($_SESSION['join']['day']),
    mysql_real_escape_string($_SESSION['join']['y_koe'])
    );

mysql_query($sql) or die(mysql_errno());
unset($_SESSION['join']);

header('Location:syouhintourokukanryou.php');
exit();
}
?>

<!DOCTYPE html>
<html long="ja">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css.css">
<title>商品登録画面</title>
</head>
<body>
<div id="center01">
<h1>商品登録画面</h1>
<form action="" method="post">
    <p>記入した内容を確認して、「登録する」ボタンを押してください。</p>
    <input type="hidden" name="action" value="submit" />
    <dl>
        <dt>生産者ID</dt>
        <dd>
            <?php echo htmlspecialchars($_SESSION['join'] ['s_id'], ENT_QUOTES, 'UTF-8'); ?>
        </dd>
        <dt>商品名</dt>
        <dd>
            <?php echo htmlspecialchars($_SESSION['join'] ['y_name'], ENT_QUOTES, 'UTF-8'); ?>
        </dd>
        <dt>出荷日</dt>
        <dd>
            <?php echo htmlspecialchars($_SESSION['join'] ['year'], ENT_QUOTES, 'UTF-8'); ?>年
            <?php echo htmlspecialchars($_SESSION['join'] ['month'], ENT_QUOTES, 'UTF-8'); ?>月
            <?php echo htmlspecialchars($_SESSION['join'] ['day'], ENT_QUOTES, 'UTF-8'); ?>日
        </dd>
        <dt>生産者の声</dt>
        <dd>
            <?php echo htmlspecialchars($_SESSION['join'] ['y_koe'], ENT_QUOTES, 'UTF-8'); ?>
        </dd>
    </dl>
    <div><a href="syouhintouroku.php?action=rewrite">&laquo;&nbsp;書き直す</a>
         <input id="submit_botton" type="submit" value="登録する" />
    </div>
</div>
</form>
</body>
</html>
