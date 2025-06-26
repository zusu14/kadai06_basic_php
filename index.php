<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>感想投稿フォーム</title>
</head>

<body>
  <form action="create.php" method="POST">
    <fieldset>
      <legend>感想投稿フォーム</legend>
      <a href="read.php">感想一覧</a>
      <div>
        <label for="nickname">ニックネーム：</label>
        <input type="text" name="nickname" id="nickname" required>
      </div>
      <div>
        <label for="comment">感想・コメント: </label>
        <textarea name="comment" id="comment" rows="4" cols="40" required></textarea>
      </div>
      <div>
        <button>投稿</button>
      </div>
    </fieldset>
  </form>

</body>

</html>