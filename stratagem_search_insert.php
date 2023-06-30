<?php session_start(); ?>
<?php 
if(isset($_SESSION['stratagem_search'][$_REQUEST['id']])) {
    unset($_SESSION['stratagem_search'][$_REQUEST['id']]);
}else {
    $_SESSION['stratagem_search']=[
        'id'=>$_REQUEST['id'],
        'stratagem_name'=>$_REQUEST['stratagem_name']
    ];
}

header('Location:https://dannkmamemame.com/stratagem_search_output.php');
exit();
?>