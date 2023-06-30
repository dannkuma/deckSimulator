<?php session_start(); ?>
<?php 
if(isset($_SESSION['illustration_search'][$_REQUEST['id']])) {
    unset($_SESSION['illustration_search'][$_REQUEST['id']]);
}else {
    $_SESSION['illustration_search']=[
        'id'=>$_REQUEST['id'],
        'illustration'=>$_REQUEST['illustration']
    ];
}

header('Location:https://dannkmamemame.com/illustration_search_output.php');
exit();
?>