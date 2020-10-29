<?php
//１．PHP
//select.phpのPHPコードをマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。
$id = $_GET['id']; //idをGETで受け取り


//【重要】
//insert.phpを修正（関数化）してからselect.phpを開く！！
require_once("funcs_db.php");
$pdo = db_conn();


//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=" . $id); //
$status = $stmt->execute();  //SQL文の実行してstatusに格納


//３．データ表示
$view = "";
if ($status == false) {  //エラーが出たら・・・
    sql_error($status);
} else {

    $result = $stmt->fetch();   //resultには一人のすべての情報が詰まっている

    }
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>表示</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index_db.php">データ登録</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron">
            <a href="detail_db.php"></a>
            <?= $view ?>
        </div>
    </div>
    <!-- Main[End] -->

<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
理由：入力項目は「登録/更新」はほぼ同じになるからです。
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->



<!-- Main[Start] -->
<form method="POST" action="update_db.php">  
  <div class="jumbotron">
   <fieldset>
   <legend>登録者の情報を入力してください。</legend>
     <label>名前 ： <input type="text" name="name" value=<?= $result['name'] ?>></label><br>
     <label>ID ： <input type="text" name="lid" value=<?= $result['lid'] ?>></label><br>
     <label>パスワード ： <input type="text" name="lpw" value=<?= $result['lpw'] ?>></label><br>
     <input type="hidden" name="kanli_flg" value="0">
     <label>管理者：<input type="checkbox" name="kanli_flg" value="1" <?= $result['kanli_flg']==1 ? 'checked':''?>></label><br>
     <input type="hidden" name="life_flg" value="0">
     <label>退職者：<input type="checkbox" name="life_flg" value="1" <?= $result['life_flg']==1 ? 'checked':''?>></label><br>
     <input type="hidden" name="id" value=<?= $result['id'] ?>>
     <input type="submit" value="情報を更新する">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->




</body>

</html>



