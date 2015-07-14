<?php
session_start();

mysql_connect('localhost','root','') or die(mysql_errno());
//echo 'BDに接続しました';
mysql_select_db('yasai') or die(mysql_errno());
//echo '<br/>DB「yasai」を選択しました';
mysql_query('SET NAMES UTF8');


if (!isset($_SESSION['join'])) {
header('Location: seisansyatouroku.php');
exit();
}

if(!empty($_POST)){
    $sql = sprintf('INSERT INTO seisansya SET s_id="%s" , s_name="%s" , s_tel="%s" , s_sanchi="%s" , s_syoukai="%s" ',
    mysql_real_escape_string($_SESSION['join'] ['s_id']),
    mysql_real_escape_string($_SESSION['join'] ['s_name']),
    mysql_real_escape_string($_SESSION['join'] ['s_tel']),
    mysql_real_escape_string($_SESSION['join'] ['s_sanchi']),
    mysql_real_escape_string($_SESSION['join'] ['s_syoukai'])
//    mysql_real_escape_string($_SESSION['join'] ['image'])
    );

mysql_query($sql) or die(mysql_errno());
unset($_SESSION['join']);
    
header('Location: seisansyatourokukanryou.php');
exit();
}
?>

<!DOCTYPE html>
<html long="ja">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css.css">
<title>生産者登録画面</title>
</head>
<body>
<div id="center01">
<h1>生産者登録画面</h1>
<form action="" method="post">
    <p>記入した内容を確認して、「登録」ボタンを押してください。</p>
    <input type="hidden" name="action" value="submit" />
    <dl>
        <dt>生産者ID</dt>
        <dd>
            <?php echo htmlspecialchars($_SESSION['join'] ['s_id'], ENT_QUOTES, 'UTF-8'); ?>
        </dd>
        <dt>氏名</dt>
        <dd>
            <?php echo htmlspecialchars($_SESSION['join'] ['s_name'], ENT_QUOTES, 'UTF-8'); ?>
        </dd>
        <dt>電話番号</dt>
        <dd>
            <?php echo htmlspecialchars($_SESSION['join'] ['s_tel'], ENT_QUOTES, 'UTF-8'); ?>
        </dd>
        <dt>生産地</dt>
        <dd>
            <?php echo htmlspecialchars($_SESSION['join'] ['s_sanchi'], ENT_QUOTES, 'UTF-8'); ?>
        </dd>
        <dt>生産者紹介</dt>
        <dd>
            <?php echo htmlspecialchars($_SESSION['join'] ['s_syoukai'], ENT_QUOTES, 'UTF-8'); ?>
        </dd>
<!--        <dt>写真など</dt>
        <dd>
            <img src="../member_picture/<?php //echo $_SESSION['join'] ['image'] ?>"
                 width="100" height="100" alt="" />
        </dd>-->
    </dl>
    <div><a href="seisansyatouroku.php?action=rewrite">&laquo;&nbsp;書き直す</a>
         <input id="submit_botton" type="submit" value="登録" />
    </div>
</form>
</div>
</body>
</html>
