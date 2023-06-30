<?php session_start(); ?>
<?php 
if(isset($_SESSION['cv_search'][$_REQUEST['id']])) {
    unset($_SESSION['cv_search'][$_REQUEST['id']]);
}else {
    $_SESSION['cv_search']=[
        'id'=>$_REQUEST['id'],
        'cv'=>$_REQUEST['cv']
    ];
}

header('Location:https://dannkmamemame.com/cv_search_output.php');
exit();
?>