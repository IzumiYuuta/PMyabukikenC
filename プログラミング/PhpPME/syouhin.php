<?php
  $url = "localhost";
  $user = "root";
  $pass = "";
  $db = "yasai";

  // MySQLへ接続する
  $link = mysql_connect($url,$user,$pass) or die("MySQLへの接続に失敗しました。");

  // データベースを選択する
  $sdb = mysql_select_db($db,$link) or die("データベースの選択に失敗しました。");

  // クエリを送信する
//  $sql = "SELECT * FROM T01Prefecture";
//  $result = mysql_query($sql, $link) or die("クエリの送信に失敗しました。<br />SQL:".$sql);

//  //結果セットの行数を取得する
//  $rows = mysql_num_rows($result);

  //表示するデータを作成
  if($rows){
    while($row = mysql_fetch_array($result)) {
      $tempHtml .= "<tr>";
      $tempHtml .= "<td>".$row["PREF_CD"]."</td><td>".$row["PREF_NAME"]."</td>";
      $tempHtml .= "</tr>\n";
    }
    $msg = $rows."件のデータがあります。";
  }else{
    $msg = "データがありません。";
  }
?>

<!DOCTYPE html>
<html long="ja">
<head>
<meta charset="UTF-8">
<title>商品紹介画面</title>
</head>
<body>
商品名

生産地

生産者の声

<h3>全件表示</h3>
    <?= $msg ?>
    <table width = "200" border = "0">
      <tr bgcolor="##ccffcc"><td>PREF_CD</td><td>PREF_NAME</td></tr>
      <?= $tempHtml ?>
    </table>

</body>
</html>