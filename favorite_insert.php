<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=xs344307_eiketsu;charset=utf8',
'xs344307_user', 'password');
$_SESSION['favorite_request']=[
    'favorite_request'=>$_REQUEST['id']
];
if(isset($_SESSION['user'])) {//ログイン確認
    $id = htmlspecialchars($_REQUEST['id']);
    if(isset($_SESSION['favorite'])) {//$_SESSTON['favorite']がセットされているか？
        if(array_key_exists($_SESSION['user']['id'], $_SESSION['favorite']) && array_key_exists($_REQUEST['id'], $_SESSION['favorite'][$_SESSION['user']['id']])) {//ユーザーidが存在するかつリクエストidが存在する
            $sql_delete_id=$pdo->prepare('delete from favorite where user_id=? and general_id=?');//削除用ログインid登録
            $sql_delete_id->execute([$_SESSION['user']['id'], $id]);
            unset($_SESSION['favorite'][$_SESSION['user']['id']][$id]);
            header('Location:https://dannkmamemame.com/favorite_output.php');
            exit();
        } else {//セットされているが同じユーザー,同じ武将idの配列が存在しない
            $sql_user_id=$pdo->prepare('insert into favorite (user_id, general_id) values (?, ?)');//user_id登録 general_id
            $sql_user_id->execute([$_SESSION['user']['id'], $id]);//↑
            $_SESSION['favorite'][$_SESSION['user']['id']][$id]=[//favorite→ユーザーid→武将id
                'general_id'=>$id
            ];
            header('Location:https://dannkmamemame.com/favorite_output.php');
            exit();
            }
    } else {//セットされていない//初回処理
        $sql_user_id=$pdo->prepare('insert into favorite (user_id, general_id) values (?, ?)');//user_id登録 general_id
        $sql_user_id->execute([$_SESSION['user']['id'], $id]);//↑
        $_SESSION['favorite'][$_SESSION['user']['id']][$id]=[//favorite→ユーザーid→武将id
            'general_id'=>$_id
        ];
        header('Location:https://dannkmamemame.com/favorite_output.php');
        exit();
    }
} else {
    header('Location:https://dannkmamemame.com/favorite_output.php');
    exit();
}

//配列そのものが消されてかぶっている