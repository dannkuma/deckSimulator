<?php session_start(); ?>
<?php
if(isset($_SESSION['search'])) {
    unset($_SESSION['search']);
}

if(isset($_SESSION['search_text'])) {
    unset($_SESSION['search_text']);
}
header('Location:https://dannkmamemame.com/general_search_detail.php');
exit();
?>