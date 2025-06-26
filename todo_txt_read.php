<?php
// データ格納用変数
$str='';

// ファイルを開く
$file = fopen('data/todo.csv','r');
// ファイルをロック
flock($file, LOCK_EX);

// 1行ずつ取得し、$lineに格納
if($file){
  while ($line = fgets($file)){
    // $str.="<tr><td>{$line}</td></tr>";
    // csv用
    $cols = explode(",", trim($line));
    $str .= "<tr><td>{$cols[0]}</td><td>{$cols[1]}</td></tr>"; 
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
  <title>textファイル書き込み型todoリスト（一覧画面）</title>
</head>

<body>
  <fieldset>
    <legend>textファイル書き込み型todoリスト（一覧画面）</legend>
    <a href="todo_txt_input.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>todo</th>
          <?= $str ?>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </fieldset>
</body>

</html>