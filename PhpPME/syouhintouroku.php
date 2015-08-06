<?php
session_start();
ini_set( "display_errors", "Off");

mysql_connect('175.184.33.60','cs1gx2r_abp','JMTa4fED') or die(mysql_errno());
//echo 'BDに接続しました';
mysql_select_db('cs1gx2r_abp') or die(mysql_errno());
//echo '<br/>DB「yasai」を選択しました';
mysql_query('SET NAMES UTF8');

if(!empty($_POST)){
    if($_POST['s_id'] == ''){
        $error['s_id'] = 'blank';
    }
    if($_POST['y_name'] == ''){
        $error['y_name'] = 'blank';
    }
    
    if(empty($error)){
        $_SESSION['join'] = $_POST;
        header('Location: syouhintourokucheck.php');
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
<title>出荷情報登録画面</title>
</head>
<body>
<div id="center01">
<h1>出荷情報登録</h1>
<form di="frmInput" name="rfmInput" method="post" action="">
    <p>登録する商品の情報を記入してください。</p>    
    <dl>
        <dt>
        生産者ID<span class="riquird">*必須(半角英数で入力して下さい！)</span>
        </dt>
        <dd>
            <input name="s_id" type="text" maxlength="12" id="select1"
                   value="<?php echo htmlspecialchars ($_POST['s_id'], ENT_QUOTES, 'UTF-8'); ?>"/>
            <?php if ($error['s_id'] == 'blank'): ?>
            <p class="error">*IDを記入してください</p>
            <?php endif; ?>
        </dd>

        <dt>
        商品名<span class="riquird">*必須</span>
        </dt>
        <dd>
            <input name="y_name" type="text" maxlength="20" id="select"
                   value="<?php echo htmlspecialchars ($_POST['y_name'], ENT_QUOTES, 'UTF-8'); ?>"/>
            <?php if ($error['y_name'] == 'blank'): ?>
            <p class="error">*商品名を記入してください</p>
            <?php endif; ?>
        </dd>

        <dt>
        出荷日<span class="riquird"></span>
        </dt>
        <dd>
            <?php 
            $t= time();
            $y= date("Y",$t);
            $m= date("n",$t);
            $d= date("j",$t);
            ?>
            <select id="select3" name="year" id="year">
                <?php
                for ($year=2015; $year<=2100; $year++){
                    if($year == $y){
                    print("<option value=\"$year\" selected>$year</option>");
                    }else{
                    print("<option value=\"$year\">$year</option>");
                    }
                }
                ?>
            </select>
            <select id="select3" name="month" id="month">
                <?php
                for ($month=1; $month<=12; $month++){
                    if($month == $m){
                    print("<option value=\"$month\" selected>$month</option>");
                    }else{
                    print("<option value=\"$month\">$month</option>");
                    }
                }
                ?>
            </select>
            <select id="select3" name="day" id="day">
                <?php for ($day=1; $day<=date('t'); $day++){
                    if($day == $d){
                    print("<option value=\"$day\" selected>$day</option>");
                    }else{
                    print("<option value=\"$day\">$day</option>");
                    }
                }
                ?>
            </select>
        </dd>

        <dt>
        生産者の声<span class="riquird"></span>
        </dt>
        <dd>
            <input name="y_koe" type="text" size="50" maxlength="255" id="select"
                   value="<?php echo htmlspecialchars ($_POST['y_koe'], ENT_QUOTES, 'UTF-8'); ?>"/>
        </dd>
    </dl>
    <div>
        <input id="submit_botton2" type="submit" value="入力内容を確認する" />
    </div>
</div>
</form>
</body>
</html>
