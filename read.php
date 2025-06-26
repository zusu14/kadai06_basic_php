<?php
// データ格納用変数
$str='';

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
    // nl2br()→改行コード(\n)を<br>に変換
    $comment = isset($cols[1]) ? nl2br(htmlspecialchars($cols[1])) : '';
    $str .= "<tr><td>{$nickname}</td><td>{$comment}</td></tr>";
  }
}

// ロックを解除
flock($file, LOCK_UN);
// ファイルを閉じる
fclose($file);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ずす 課題〇〇 感想・コメント</title>
</head>

<body>
  <fieldset>
    <legend>ずす 課題〇〇 感想・コメント</legend>
    <a href="index.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>ニックネーム</th>
          <th>感想・コメント</th>
        </tr>
      </thead>
      <tbody>
        <?= $str ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>