<?php session_start(); ?>
<?php 
if(isset($_SESSION['detail'][$_REQUEST['id']])) {
    unset($_SESSION['detail'][$_REQUEST['id']]);
}else {
    $_SESSION['detail']=[
        'id'=>$_REQUEST['id']
    ];
}

header('Location:https://dannkmamemame.com/general_detail_output.php');
exit();
?>