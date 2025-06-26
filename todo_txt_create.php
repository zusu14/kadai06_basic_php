<?php
// var_dump($_POST);
$todo = $_POST["todo"];
$deadline = $_POST["deadline"];
// var_dump($todo, $deadline);
$write_data="{$deadline},{$todo}\n";
// var_dump($write_data);

// ファイルを開く（フル権限）
$file = fopen('data/todo.csv', 'a');
// ファイルをロック
flock($file, LOCK_EX);
// 書き込み
fwrite($file, $write_data);
// ファイルをロックを解除
flock($file, LOCK_UN);
// ファイルを閉じる
fclose($file);

// データ入力画面に移動
header("Location:todo_txt_input.php");

