<?php

header('X-FRAME-OPTIONS:DENY');

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=650, initial-scale=1">
    <title>英傑大戦デッキシミュレーター</title>
    <script
      src="https://code.jquery.com/jquery-3.6.4.js"
      integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
      crossorigin="anonymous">
    </script>
    <script src="search_function.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrap">
    <div class="header">
        <h1 class="page_heading">英傑大戦デッキシミュレーター</h1>
        <div class="header_btn_wrapper">
            <a class="btn signup" href="signup_input.php">新規登録</a>
            <p>または</p>
            <a class="btn login" href="login_input.php">ログイン</a>
            <a class="btn logout" href="logout_input.php">ログアウト</a>
        </div>
    </div>