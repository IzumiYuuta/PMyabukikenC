<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css.css">
<title>商品一覧</title>
</head>
<body>
<div id="center01">
<h1>商品一覧画面</h1>
<div id="center02">
<table>
    <tr>
    <th>
    商品ID
    </th>
    <th>
    商品名
    </th>
    <th>
    生産者ID
    </th>
    </tr>
<?php
    require_once 'database_conf.php';
    require_once 'h.php';
      
    try {
      $db = new PDO($dsn, $dbUser, $dbPass);
      $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = 'SELECT * FROM syouhin';
      $prepare = $db->prepare($sql);
      $prepare->execute();
      $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

      foreach ($result as $syouhin) {
        $id = $syouhin['y_id'];
        $y_name = h($syouhin['y_name']);
        $s_id = h($syouhin['s_id']);
        echo "<tr><td><a href='syouhinsyousai.php?y_id=${id}'>${id}</a></td><td>${y_name}</td><td>${s_id}</td></tr>";
      }

    } catch (PDOException $e) {

      echo 'エラーが発生しました。内容: ' . h($e->getMessage());
    }
    ?>
</table>
</div>
</div>
</body>
</html>