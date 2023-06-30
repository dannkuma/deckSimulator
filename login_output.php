<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php
unset($_SESSION['user']);
$login = htmlspecialchars($_REQUEST['login']);
$password = htmlspecialchars($_REQUEST['password']);
$pdo=new PDO('mysql:host=localhost;dbname=xs344307_eiketsu;charset=utf8',
'xs344307_user', 'password');
$sql=$pdo->prepare('select * from user where login=? and password=?');
$sql->execute([$login, $password]);
foreach ($sql as $row) {
    $_SESSION['user']=[
        'id'=>$row['id'], 
        'name'=>$row['name'],
        'login'=>$row['login'], 
        'password'=>$row['password']
    ];
}
if (isset($_SESSION['user'])) {
    echo '<div class="user_wrapper">';
    echo 'いらっしゃいませ、', $_SESSION['user']['name'], 'さん'; 
    echo '</div>';
} else {
    echo '<div class="user_wrapper">';
    echo 'ログイン名またはパスワードが違います';
    echo '</div>';
}
?>
<a href="general_search_output.php" class="remove_top">トップページへ戻る</a>
<?php require 'footer.php'; ?>