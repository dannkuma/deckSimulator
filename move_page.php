<?php session_start(); ?>
<?php

header("Location:" . $_SESSION['url']);
exit();

?>