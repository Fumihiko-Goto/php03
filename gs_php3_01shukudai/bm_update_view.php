<?php
//【重要】
//insert.phpを修正（関数化）してからselect.phpを開く！！
require_once("funcs2.php"); //関数郡を書いたファイルを使用
$pdo = db_conn();


//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();  //実行結果がstatusに入る

//３．データ表示
$view = "";
if ($status == false) {  //エラーが出たら・・・
    sql_error($status);

}else{
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //GETデータ送信リンク作成
    // <a>で囲う。
    $view .= '<p>';
    //<a href="detail.php?id=
    $view .= '<a href="detail2.php?id=' . $result["id"] . '">';
    $view .= $result["indate"] . "：" . $result["book_name"];
    $view .= '</a>';
    //<a href="delete.php?id='
    $view .= '<a href="delete2.php?id=' . $result["id"] . '">';
    $view .= ' / [ 削除 ]';
    $view .= '</a>';

    $view .= '</p>';
 }

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
      <a class="navbar-brand" href="index2.php">データ登録【たった今更新しました！】</a>
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

</body>
</html>
