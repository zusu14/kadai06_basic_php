<?php
var_dump($_POST);
$nickname = $_POST["nickname"];
$comment = $_POST["comment"];
$write_data="{$nickname},{$comment}\n";
// var_dump($write_data);

// ファイルを開く（フル権限）
$file = fopen('data/comment.csv', 'a');
// ファイルをロック
flock($file, LOCK_EX);
// 書き込み
fwrite($file, $write_data);
// ファイルをロックを解除
flock($file, LOCK_UN);
// ファイルを閉じる
fclose($file);

// データ入力画面に移動
header("Location:index.php");

