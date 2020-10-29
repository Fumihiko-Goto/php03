<?php
//１．PHP
//select.phpのPHPコードをマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。
$id = $_GET['id']; //idをGETで受け取り
//echo ($id);     //ブラウザ表示。var_dumpでもOK!


//【重要】
//insert.phpを修正（関数化）してからselect.phpを開く！！
require_once("funcs2.php");
$pdo = db_conn();


//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=" . $id); //
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
<title>データ表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>

<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index2.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron">
            <a href="detail2.php"></a>
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
<form method="post" action="insert2.php">
  <div class="jumbotron">
   <fieldset>
    <legend>書籍ブックマークDB</legend>
     <label>書籍名：<input type="text" name="book_name" value=<?= $result['book_name'] ?>></label><br>
     <label>書籍URL：<input type="text" name="book_url" value=<?= $result['book_url'] ?>></label><br>
     <label><textArea name="review" rows="4" cols="40"> <?= $result['review'] ?> </textArea><label><br>
     <input type="hidden" name="id" value=<?= $result['id'] ?>>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
        
        
        
        
</body>
</html>
    
    
    
