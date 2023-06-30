<?php session_start(); ?>
<?php
// JSONデータを受け取る
$json = file_get_contents('php://input');

// JSONデータを連想配列に変換
$data = json_decode($json, true);

var_dump($json);
?>