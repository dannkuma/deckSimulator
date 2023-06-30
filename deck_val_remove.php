<?php session_start(); ?>
<?php
if(!isset($_SESSION['deck'])) {
    $_SESSION['deck']=[];
}
if(in_array($_REQUEST['generalId'], $_SESSION['deck'])) {//デッキ配列にリクエストパラメータが存在するか確認
    $array_search = array_search($_REQUEST['generalId'], $_SESSION['deck']);//リクエストパラメータのキーを返す
    unset($_SESSION['deck'][$array_search]);//キーを指定してdeck配列から値を削除
} else {
    array_push($_SESSION['deck'], $_REQUEST['generalId']);//配列に要素を追加する
}

header('Location:https://dannkmamemame.com/deck_detail.php');
exit();

?>