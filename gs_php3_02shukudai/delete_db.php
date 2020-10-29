<?php
require_once('funcs_db.php');  //関数ファイルを呼び込み

$id = $_GET['id'];

$pdo = db_conn();           //接続
$stmt = $pdo->prepare('DELETE FROM gs_user_table WHERE id = :id');  //SQL文

$stmt->bindValue(':id', h($id), PDO::PARAM_INT);  //INTに変更
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect('select_db.php');  //最後に遷移表示するファイル名を書く
}
?>


