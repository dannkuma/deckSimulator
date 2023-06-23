<?php session_start(); ?>
<?php
unset($_SESSION['deck']);
header("Location:" . $_SESSION['url']);
exit();

?>