<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=xs344307_eiketsu;charset=utf8',
'xs344307_user', 'password');
if (isset($_SESSION['user'])) {//ログインしている
    $id=$_SESSION['user']['id'];
    $sql=$pdo->prepare('select * from user where id!=? and login=?');//idとログイン名が異なるものを取得
    $sql->execute([$id, $_REQUEST['login']]);
} else {//ログインしていない
    $sql=$pdo->prepare('select * from user where login=?');//ログイン名を取得
    $sql->execute([$_REQUEST['login']]);
}
if (empty($sql->fetchAll())) {//$sqlが空白ログイン名の重複がない
    $name = htmlspecialchars($_REQUEST['name']);
    $login = htmlspecialchars($_REQUEST['login']);
    $password = htmlspecialchars($_REQUEST['password']);
    if (isset($_SESSION['user'])) {//ログインしている
        $sql=$pdo->prepare('update user set name=?, login=?, './/データベースの更新
            'password=? where id=?');
        $sql->execute([
            $name, $login, 
            $password, $id]);
        $_SESSION['user']=[
            'id'=>$id, 'name'=>$_REQUEST['name'],
            'login'=>$_REQUEST['login'], 'password'=>$_REQUEST['password']];
        echo '<div class=user_wrapper">';
        echo '<p class="signup_text">ユーザー情報を更新しました。</p>';
        echo '<a href="general_search_output.php" class="remove_top">トップページへ戻る</a>';
        echo '</div>';
    } else {//ログインしていない
        $sql=$pdo->prepare('insert into user values(null, ?, ?, ?)');//データベースの登録
        $sql->execute([
            $name, $login, $password]);
        echo '<div class=user_wrapper">';
        echo '<p class="signup_text">ユーザー情報を登録しました。</p>';
        echo '<a href="general_search_output.php" class="remove_top">トップページへ戻る</a>';
        echo '</div>';
    }
} else {
    echo '<div class=user_wrapper">';
    echo '<p class="signup_text">ログイン名がすでに使用されていますので、変更してください。</p>';
    echo '<a href="general_search_output.php" class="remove_top">トップページへ戻る</a>';
    echo '</div>';
}
?>
<?php require 'footer.php'; ?>