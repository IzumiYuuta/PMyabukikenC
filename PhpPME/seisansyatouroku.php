<?php
session_start();
ini_set( "display_errors", "Off");

mysql_connect('175.184.33.60','cs1gx2r_abp','JMTa4fED') or die(mysql_errno());
//echo 'BDに接続しました';
mysql_select_db('cs1gx2r_abp') or die(mysql_errno());
//echo '<br/>DB「cs1gx2r_abp」を選択しました';
mysql_query('SET NAMES UTF8');

if(empty($error)){
    $sql=  sprintf('SELECT COUNT(*) AS cnt FROM seisansya WHERE s_id="%s"',
    mysql_real_escape_string($_POST['s_id']));
    $record = mysql_query($sql) or die(mysql_error());
    $table = mysql_fetch_assoc($record);
    if($table['cnt'] > 0){
        $error['s_id'] = 'duplicate';
    }
}

if(!empty($_POST)){
    if($_POST['s_id'] == ''){
        $error['s_id'] = 'blank';
    }
    if($_POST['s_name'] == ''){
        $error['s_name'] = 'blank';
    }
    if($_POST['s_tel'] == ''){
        $error['s_tel'] = 'blank';
    }
    if($_POST['s_sanchi'] == ''){
        $error['s_sanchi'] = 'blank';
    }
    
    if(empty($error)){
        $_SESSION['join'] = $_POST;
        header('Location: seisansyatourokucheck.php');
        exit();
    }
}

if ($_REQUEST['action'] == 'rewrite'){
    $_POST = $_SESSION['join'];
    $error['rewrite'] = TRUE;
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
<h1>生産者登録</h1>
<form action="" method="post" enctype="multipart/form-data">
    <p>次のフォームに記入してください。</p>
    <dl>
        <dt>
        生産者ID<span class="riquird">*必須(12桁以下で記入してください!)</span>
        </dt>
        <dd>
            <input type="text" name="s_id" maxlength="12" id="select1"
                   value="<?php echo htmlspecialchars ($_POST['s_id'], ENT_QUOTES, 'UTF-8'); ?>"/>
            <?php  if ($error['s_id'] == 'blank'): ?>
            <p class="error">*IDを記入してください</p>
            <?php  endif; ?>
            <?php if($error['s_id'] == 'duplicate'): ?>
            <p class="error">* 指定したIDは使われています。</p>
            <?php endif; ?>
        </dd>
        
        <dt>
        氏名<span class="riquird">*必須</span>
        </dt>
        <dd>
            <input type="text" name="s_name" maxlength="20" id="select"
                   value="<?php echo htmlspecialchars ($_POST['s_name'], ENT_QUOTES, 'UTF-8'); ?>"/>
            <?php if ($error['s_name'] == 'blank'): ?>
            <p class="error">*氏名を記入してください</p>
            <?php endif; ?>
        </dd>
        
        <dt>
        電話番号<span class="riquird">*必須(000-0000-0000)</span>
        </dt>
        <dd>
            <input type="text" name="s_tel" maxlength="13" id="select"
                   value="<?php echo htmlspecialchars ($_POST['s_tel'], ENT_QUOTES, 'UTF-8'); ?>"/>
            <?php if ($error['s_tel'] == 'blank'): ?>
            <p class="error">*電話番号を記入してください</p>
            <?php endif; ?>
        </dd>
        
        <dt>
        生産地<span class="riquird">*必須</span>
        </dt>
        <dd>
            <input type="text" name="s_sanchi" maxlength="20" id="select"
                   value="<?php echo htmlspecialchars ($_POST['s_sanchi'], ENT_QUOTES, 'UTF-8'); ?>"/>
            <?php if ($error['s_sanchi'] == 'blank'): ?>
            <p class="error">*生産地を記入してください</p>
            <?php endif; ?>
        </dd>
        
        <dt>
        生産者の紹介<span class="riquird"></span>
        </dt>
        <dd>
            <input type="text" name="s_syoukai" maxlength="255" id="select"
                   value="<?php echo htmlspecialchars ($_POST['s_syoukai'], ENT_QUOTES, 'UTF-8'); ?>"/>
        </dd>
        
<!--        <dt>
        写真など<span class="riquird"></span>
        </dt>
        <dd>
            <input type="file" name="image" id="image_botton"/>
        </dd>-->
    </dl>
    <p>
        <input id="submit_botton2" type="submit" value="入力内容を確認する" />
    </p>
    <p></p>
</form>
</div>
</body>
</html>