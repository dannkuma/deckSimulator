<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php
if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
    echo '<div class="user_wrapper">';
    echo '<P>ログアウトしました。</p>';
    echo '<a href="general_search_output.php" class="remove_top">トップページへ戻る</a>';
    echo '</div>';
} else {
    echo '<div class="user_wrapper">';
    echo '<p>すでにログアウトしています。</p>';
    echo '<a href="general_search_output.php" class="remove_top">トップページへ戻る</a>';
    echo '</div>';
}
?>
<?php require 'footer.php'; ?>