<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php
$name=$login=$password='';
if (isset($_SESSION['user'])) {
    $name=$_SESSION['user']['name'];
    $login=$_SESSION['user']['login'];
    $password=$_SESSION['user']['password'];   

echo '<form action="signup_output.php" method="post">';
echo '<div class="user_wrapper">';
echo '<p>ユーザー名</p>';
echo '<input type="text" class="signup_text" name="name" value="', $name, '">';
echo '<p>ログイン名</p>';
echo '<input type="text" class="signup_text" name="login" value="', $login, '">';
echo '<p>パスワード</p>';
echo '<input type="text" class="signup_text" name="password" value="', $password, '">';
echo '<p><input class="signup_submit" type="submit" value="確定"></p>';
echo '</div>';
echo '</form>';
} else {
    echo '<form action="signup_output.php" method="post">';
echo '<div class="user_wrapper">';
echo '<p>ユーザー名</p>';
echo '<input type="text" class="signup_text" name="name">';
echo '<p>ログイン名</p>';
echo '<input type="text" class="signup_text" name="login">';
echo '<p>パスワード</p>';
echo '<input type="text" class="signup_text" name="password">';
echo '<p><input class="signup_submit" type="submit" value="確定"></p>';
echo '</div>';
echo '</form>';
}
?>
<?php require 'footer.php'; ?>