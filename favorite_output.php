<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'deck_top.php'; ?>
<?php

$url = '';//URL代入用
if(isset($_SERVER['HTTPS'])){//httpsであるか判別
    $url .= 'https://';
}else{
    $url .= 'http://';
}
$url .= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];//連結
if(isset($_SESSION['url']) && !$_SESSION['url'] == $url) {//セットされている
    unset($_SESSION['url']);
    $_SESSION['url'] = $url;
} else {//初回
    $_SESSION['url'] = $url;
}

if(isset($_SESSION['user'])) {
    if(isset($_SESSION['favorite'])) {//初回であるかどうか
        if(!isset($_SESSION['favorite'][$_SESSION['user']['id']][$_SESSION['favorite_request']['favorite_request']])) {//requestの値がfavorite→各user配列に存在するかつ既存のユーザーデある
            require 'power_selection.php';
            echo '<div class="user_wrapper">';
            echo '<p class="">お気に入り武将を削除しました</p>';
            echo '<hr>';
            require 'favorite_show.php';
            echo '<a href="general_search_output.php" class="remove_top">トップページに戻る</a>';
            echo '</div>';
        } else {//requestの値が存在する
            require 'power_selection.php';
            echo '<div class="user_wrapper">';
            echo '<p>お気に入り武将を登録しました</p>';
            echo '<hr>';
            require 'favorite_show.php';
            echo '<a href="general_search_output.php" class="remove_top">トップページに戻る</a>';
            echo '</div>'; 
        }
    } else {//初回処理
        require 'power_selection.php';
        echo '<div class="user_wrapper">';
        echo '<p>お気に入り武将を登録しました</p>';
        echo '<hr>';
        require 'favorite_show.php';
        echo '<a href="general_search_output.php" class="remove_top">トップページに戻る</a>';
        echo '</div>';
    }
    
} else {
    echo '<div class="user_wrapper">';
    echo 'お気に入り武将を登録するには、ログインしてください';
    echo '<a href="general_search_output.php" class="remove_top">トップページに戻る</a>';
    echo '</div>';
}

require 'footer.php'; ?>