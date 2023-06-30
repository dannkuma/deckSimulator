<?php session_start(); ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=xs344307_eiketsu;charset=utf8',
'xs344307_user', 'password');

$url = '';//URL代入用
if(isset($_SERVER['HTTPS'])){//httpsであるか判別
    $url .= 'https://';
}else{
    $url .= 'http://';
}
$url .= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];//連結
if(isset($_SESSION['url']) && !$_SESSION['url'] == $url) {//セットされている
    unset($_SESSION['url']);
    $_SESSION['url'] = $url;
} else {//初回
    $_SESSION['url'] = $url;
}

if(!(isset($_SESSION['search_text'])) && empty($_SESSION['search_text'])) {//何も登録されていない
    require 'header.php';
    require 'deck_top.php';
    require 'power_selection.php';
    require 'general_list_header.php';
    $sql=$pdo->query('select * from general');
    if($sql->rowCount() == 0) {
        echo '<p class="alert">検索条件に該当する武将はありません</p>';
    }
    require 'general_list.php';
    require 'general_list_footer.php';
    require 'footer.php';
}

if(isset($_SESSION['search']['free_word_text']) && isset($_SESSION['search']['free_word_category'])) {//フリーワードあり
    require 'header.php';
    require 'deck_top.php';
    require 'power_selection.php';
    require 'general_list_header.php';
    $count = count($_SESSION['search']['free_word_text']);
    $sql=$pdo->prepare($_SESSION['search_text']);
    for($i = 1; $i <= $count; $i++) {
        $sql->bindValue(':word'.$i, '%'.$_SESSION['search']['free_word_text'][$i-1].'%', PDO::PARAM_STR);
    }
    $sql->execute();
    if($sql->rowCount() == 0) {
        echo '<p class="alert">検索条件に該当する武将はありません</p>';
    }
    require 'general_list.php';
    require 'general_list_footer.php';
    require 'footer.php';
    if(isset($_SESSION['search']['favorite'])) {//お気に入りが選択されている
        $text_sql = 'select general_id from favorite';
        $sql_count = $pdo->query($text_sql);
        if(isset($_SESSION['user']['id']) && $sql_count->rowCount() == 0) {//ログインしていて武将が登録されていない
            echo '<script> alert(\'お気に入り武将が登録されていません。\');</script>';
        }elseif(!(isset($_SESSION['user']['id']))) {//ログインしていない
            echo '<script> alert(\'お気に入り武将を表示するには、ログインしてください。\');</script>';
        }
    }
}else {//フリーワード片方のみor無し
    if(!(empty($_SESSION['search_text']))) {
        require 'header.php';
    require 'deck_top.php';
    require 'power_selection.php';
    require 'general_list_header.php';
    $sql=$pdo->query($_SESSION['search_text']);
    if($sql->rowCount() == 0) {
        echo '<p class="alert">検索条件に該当する武将はありません</p>';
    }
    require 'general_list.php';
    require 'general_list_footer.php';
    require 'footer.php';
    if(isset($_SESSION['search']['favorite'])) {//お気に入りが選択されている
        $text_sql = 'select general_id from favorite';
        $sql_count = $pdo->query($text_sql);
        if(isset($_SESSION['user']['id']) && $sql_count->rowCount() == 0) {//ログインしていて武将が登録されていない
            echo '<script> alert(\'お気に入り武将が登録されていません。\');</script>';
        }elseif(!(isset($_SESSION['user']['id']))) {//ログインしていない
            echo '<script> alert(\'お気に入り武将を表示するには、ログインしてください。\');</script>';
        }
    }
    }
}

unset($_SESSION['search_text']);

?>

<?php
if(isset($_SESSION['search']['color'])) {
    foreach($_SESSION['search']['color'] as $key=>$row) {
        echo 
        "<script>
            function color_add_click() {
                $('.$key').addClass('click');
            }
        color_add_click();
        </script>";
    }
}
?>

<?php
if(isset($_SESSION['search']['favorite'])) {
    echo 
    "<script>
       function favorite_add_click() {
            $('.favorite').addClass('click');
        }
    favorite_add_click();
    </script>";
    
}
?>

<?php
if(isset($_SESSION['user']['id'])) {//ログインしている
    
$sql=$pdo->prepare('select * from favorite, general '.
'where user_id=? and general_id=id');
$sql->execute([$_SESSION['user']['id']]);
foreach ($sql as $row){
    $id = $row['id'];
echo
    "<script>
        function change_favoriteBtn() {
            $('.favorite$id').addClass('click');
        }
        change_favoriteBtn();
    </script>"; }}?>

<?php
if(!(empty($_SESSION['deck']))) {//デッキにカードが登録されている
foreach($_SESSION['deck'] as $row) {
    echo 
    "<script>
        function change_deckBtn() {
            $('.general$row').addClass('click');
        }
        change_deckBtn();
    </script>";}}?>

<script>

     // イベント設定①
  $(window).on('load', function() {
    //セッション取得
    var top = window.sessionStorage.getItem(['scroll_top']);        
    var left = window.sessionStorage.getItem(['scroll_left']);

    // 指定位置にスクロール
    $(window).scrollTop(top);
    $(window).scrollLeft(left);

    //セッション破棄
    window.sessionStorage.clear();
  });
  
  // イベント設定②
  $(window).scroll(function() {
    var top = $(this).scrollTop();
    var left = $(this).scrollLeft();
    window.sessionStorage.setItem(['scroll_top'],[top]);
    window.sessionStorage.setItem(['scroll_left'],[left]);
  });
</script>