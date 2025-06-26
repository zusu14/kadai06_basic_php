<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>掲示板</title>
  <link rel="stylesheet" href="style.css">

</head>

<body>
  <!-- タイトル -->
   <h2>〇〇掲示板</h2>
  <!-- 投稿フォーム -->
  <form action="create.php" method="POST">
    <fieldset>
      <!-- <legend>投稿フォーム</legend> -->
      <!-- <a href="read.php">投稿一覧</a> -->
      <div>
        <label for="nickname">ニックネーム：</label>
        <input type="text" name="nickname" id="nickname" required>
      </div>
      <div>
        <label for="comment">投稿: </label>
        <textarea name="comment" id="comment" rows="4" cols="40" required></textarea>
      </div>
      <div>
        <button>投稿</button>
      </div>
    </fieldset>
  </form>

  <!-- 一覧表示 -->
   <h3>投稿一覧</h3>
      <?php
        // データ格納用変数
        // $str='';

        // ファイルを開く
        $file = fopen('data/comment.csv','r');
        // ファイルをロック
        flock($file, LOCK_EX);

        // 1行ずつ取得し、$lineに格納
        if($file){
          while ($line = fgets($file)){
            // 前後空白をtrim()してから、カンマで分割して配列に変換
            $cols = explode(",", trim($line));
            // var_dump($cols);

            // $colがnullでないかチェック→三項演算子
            $nickname = isset($cols[0]) ? htmlspecialchars($cols[0]) : '';
            $comment = isset($cols[1]) ? nl2br(htmlspecialchars($cols[1])) : ''; // nl2br()→改行コード(\n)を<br>に変換
            $datetime = isset($cols[2]) ? htmlspecialchars($cols[2]) : '';
            
            // 投稿表示部分
            echo "<div class='post'>";
            echo "<strong>{$nickname}</strong> <small>{$datetime}</small><br>";
            echo "<div class='comment'>{$comment}</div>";
            echo "</div>";
          
            // $str .= "<tr><td>{$nickname}</td><td>{$comment}</td><td>{$datetime}</td></tr>";
          }

        }
        // ロックを解除
        flock($file, LOCK_UN);
        // ファイルを閉じる
        fclose($file);
      ?>
      <!-- <?= $str ?> -->
</body>

</html>