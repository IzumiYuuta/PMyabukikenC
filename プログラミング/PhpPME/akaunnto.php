<!DOCTYPE html>
<html long="ja">
<head>
<meta charset="UTF-8">
<title>生産者アカウント画面</title>
</head>
<body>
    <p>追加ボタンをクリックすると下の表に追加されます。</p>
    <table border="1">
    <tr>
    <td width="200">商品名</td>
    <td width="200">出荷日</td>
    <td width="500">生産者の声</td>
    <form action="regist.php" method="post">
   　 商品名：<br />
     <input type="text" name="mane" size="100" value="" /><br />
   　 出荷日：<br />
     <input type="text" name="name" size="100" value="" /><br />
  　  生産者の声：<br />
     <input type="text" name="tel" size="300" value=""><br />
     <br />
    <input type="submit" value="追加" />
    </form>
    <?php
    $name = mysql_connect('127.0.0.1', 'root', '1234');
    if (!$con) {
      exit('データベースに接続できませんでした。');
    }

    $ = mysql_select_db('phpdb', $con);
    if (!$result) {
      exit('データベースを選択できませんでした。');
    }
    

    $result = mysql_query('SET NAMES utf8', $con);
    if (!$result) {
      exit('文字コードを指定できませんでした。');
    }

    $name   = $_REQUEST['no'];
    $name = $_REQUEST['name'];
    $tel  = $_REQUEST['tel'];

    $result = mysql_query("INSERT INTO address(no, name, tel) VALUES('$no', '$name', '$tel')", $con);
    if (!$result) {
      exit('データを登録できませんでした。');
    }

    $con = mysql_close($con);
    if (!$con) {
      exit('データベースとの接続を閉じられませんでした。');
    }

?>
<p>登録が完了しました。<br /><a href="index.html">戻る</a></p>

    <?php
    for($a = 1; $a <=100; $a++){
    echo '<tr>';
    

    echo '</tr>';
    
    }
    ?>
    </tr>
    </table>

</body> 
</head>
    



