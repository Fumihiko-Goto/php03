<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザー登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select_db.php">ユーザー登録</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="insert_db.php">
  <div class="jumbotron">
   <fieldset>
    <legend>登録者の情報を入力してください。</legend>
     <label>名前 ： <input type="text" name="name"></label><br>
     <label>ID ： <input type="text" name="lid"></label><br>
     <label>パスワード ： <input type="text" name="lpw"></label><br>
     <input type="hidden" name="kanli_flg" value="0" required>
     <label>管理者：<input type="checkbox" name="kanli_flg" value="1"></label><br>  
    <input type="submit" value="登録する">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
