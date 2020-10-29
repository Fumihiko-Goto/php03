<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_POST, ","name" ); 
//$email = filter_input( INPUT_POST, "email" ); 
$book_name = $_POST['book_name'];
$book_url = $_POST['book_url'];
$review = $_POST['review'];

//2. DB接続します
try {
  $pdo = new PDO('mysql:dbname=book_db;charset=utf8;host=localhost','root','root'); //DBへの接続文
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage()); //接続出来なかった場合のエラー文表示
}



//３．データ登録SQL作成   //↓↓大文字が慣例的な書き方となる
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id, book_name, book_url, review, indate )VALUES(NULL, :book_name, :book_url, :review, sysdate())");
$stmt->bindValue(':book_name', $book_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':book_url', $book_url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':review', $review, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();  //実行した結果をstatusに入れる

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("データ登録処理が成功しませんでした。:".$error[2]);
}else{
    //*** function化する！*****************
    header("Location: bm_update_view.php");
    exit();
}
?>