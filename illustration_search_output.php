<?php session_start(); ?>
<?php

header('X-FRAME-OPTIONS:DENY');

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=650, initial-scale=1">
    <title>英傑大戦デッキシミュレーター</title>
    <script
      src="https://code.jquery.com/jquery-3.6.4.js"
      integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
      crossorigin="anonymous">
    </script>
    <script src="search_function.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<link rel="stylesheet" href="style.css">
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

$sql_illustration=$pdo->prepare('select * from general where id=? and illustration=?');
$sql_illustration->execute([$_SESSION['illustration_search']['id'], $_SESSION['illustration_search']['illustration']]);
$sql_illustration_cards=$pdo->prepare('select * from general where illustration=?');
$sql_illustration_cards->execute([$_SESSION['illustration_search']['illustration']]);
echo '<div class="general_detail_background">';//背景用開始
echo '<div class="general_detail_area">';//area開始
require 'deck_top.php';
echo '<div class="general_detail_header">';//header開始
echo '<p class="illustration_header_text">イラストレーター担当武将一覧</p>';
echo '<a class="close illustration_close" href="general_search_output.php">×</a>';
echo '</div>';//header終了
foreach ($sql_illustration as $row) {
    echo '<div class="illustration_header">';
    echo '<p class="illustrator_header_name">', $row['illustration'], '</p>';
    echo '</div>';
}
require 'general_list_header.php';
foreach ($sql_illustration_cards as $row) {
    echo '<li class="general_data back_ground_color_', $row['color'], '">';//li開始
    echo '<a class="detail_btn" href="general_detail_insert.php?id=', $row['id'], '">';//detailボタン開始
    echo '</a>';
    echo '<div class="list_wrap">';
    echo '<div class="color_', $row['color'], '">';//color開始
    echo '<img class="color_image_', $row['color'], '" alt="image" src="img/color/color_', $row['color'], '.png">';
    echo '</div>';//color終了
    echo '<div class="data_wrap">';
    echo '<div class="data_wrap1">';//data_wrap1開始
    echo '<div class="number_appear_period">';//number_appear_period開始
    echo '<div class="number_appear">';//number_appear開始
    echo '<div class="number">', $row['number'], '</div>';
    echo '<div class="appear">', $row['appear'], '</div>';
    echo '</div>';//number_appear終了
    echo '<div class="period_wrap"><p class="period">', $row['period'], '</p></div>';
    echo '</div>';//number_appear_period終了
    echo '<div class="rarity_name">';//rarity_name開始
    echo '<p class="rarity ', $row['rarity'], '">', $row['rarity'], '</p>';
    echo '<ruby class="name">', $row['name'], '<rp>(</rp><rt>', $row['name_furigana'], '</rt><rp>)</rp></ruby>';
    echo '</div>';//rarity_name終了
    echo '</div>';//data_wrap1終了
    echo '<p class="data_wrap2"><img class="general_flont_image" alt="image" src="img/flont_ (', $row['id'], ').jpg"></p>';
    echo '<div class="data_wrap3">';//data_wrap3開始
    echo '<div class="top_param_wrap">';
    echo '<div class="type_of_solder">';//type_of_solder開始
    switch ($row['type_of_solder']) {
        case '騎兵':
            echo '<img alt="img" src="img/type_of_solder/', $row['type_of_solder'], '.png">';
            break;
        case '槍兵':
            echo '<img alt="img" src="img/type_of_solder/', $row['type_of_solder'], '.png">';
            break;
        case '弓兵':
            echo '<img alt="img" src="img/type_of_solder/', $row['type_of_solder'], '.png">';
            break;
        case '剣豪':
            echo '<img alt="img" src="img/type_of_solder/', $row['type_of_solder'], '.png">';
            break;
        default:
            echo '<img alt="img" src="img/type_of_solder/', $row['type_of_solder'], '.png">';
            break;
    }
    echo '</div>';//type_of_solder終了
    echo '<div class="cost_unit">';//cost_unit開始
    echo '<div class="cost">', $row['cost'], '</div>';
    echo '<div class="cost-icon">';//cost-icon開始
    switch ($row['cost']) {
        case 1:
            echo '<img alt="img" src="img/cost/', $row['cost'], '.png">';
            break;
        case 1.5:
            echo '<img alt="img" src="img/cost/', $row['cost'], '.png">';
            break;
        case 2:
            echo '<img alt="img" src="img/cost/', $row['cost'], '.png">';
            break;
        case 2.5:
            echo '<img alt="img" src="img/cost/', $row['cost'], '.png">';
            break;
        case 3:
            echo '<img alt="img" src="img/cost/', $row['cost'], '.png">';
            break;
        case 3.5:
            echo '<img alt="img" src="img/cost/', $row['cost'], '.png">';
            break;
        default:
            echo '<img alt="img" src="img/cost/', $row['cost'], '.png">';
            break;
    }
    echo '</div>';//cost_icon終了
    echo '</div>';//cost_unit終了
    echo '<div class="power_intelligence">', $row['power'], '/', $row['intelligence'], '</div>';
    echo '<div class="special_skill">';//special_skill開始

    if ($row['special_skill_none'] === '特技なし'){
        echo '<p class="special_skill_none">特技なし</p>';
    }

    if ($row['special_skill_ambush'] === '伏兵'){
        echo '<p class="special_skill_on">伏</p>';
    }

    if ($row['special_skill_guardrail'] === '防柵'){
        echo '<p class="special_skill_on">柵</p>';
    }

    if ($row['special_skill_revival'] === '復活'){
        echo '<p class="special_skill_on">活</p>';
    }

    if ($row['special_skill_tolerance'] === '忍'){
        echo '<p class="special_skill_on">忍</p>';
    }

    if ($row['special_skill_fighting_spirit'] === '気合'){
        echo '<p class="special_skill_on">気</p>';
    }

    if ($row['special_skill_sniping'] === '狙撃'){
        echo '<p class="special_skill_on">狙</p>';
    }

    if ($row['special_skill_enhancement'] === '昂揚'){
        echo '<p class="special_skill_on">昂</p>';
    }

    if ($row['special_skill_technique'] === '技巧'){
        echo '<p class="special_skill_on">技</p>';
    }

    if ($row['special_skill_vanguard'] === '先陣'){
        echo '<p class="special_skill_on">先</p>';
    }

    if ($row['special_skill_ogre'] === '鬼'){
        echo '<p class="special_skill_on">鬼</p>';
    }
    echo '</div>';//special_skill終了
    echo '</div>';//top_param_wrap終了
    echo '<div class="bottom_param_wrap">';
    echo '<div class="stratagem">';//stratagem開始
    echo '<a href="stratagem_search_insert.php?stratagem_name=', $row['stratagem_name'], '&id=', $row['id'],'">', $row['stratagem_name'], '【', $row['necessary_morale'], '】</a>';
    echo '</div>';//stratagem終了
    echo '<div class="btn_cover">';//btn_cover開始
    echo '<a class="favorite_btn favorite', $row['id'], '" href="favorite_insert.php?id=', $row['id'], '">★</a>';
    echo '<a class="deck_btn general', $row['id'], '" href="deck_create.php?generalId=', $row['id'], '">デッキ</a>';
    echo '</div>';//btn_cover終了
    echo '</div>';//bottom_param_wrap終了
    echo '</div>';//data_wrap3終了
    echo '</div>';//data_wrap終了
    echo '</div>';//list_wrap終了
    echo '</li>';//li終了
}
require 'general_list_footer.php';
?>

<?php
if(!empty($_SESSION['deck'])) {
foreach($_SESSION['deck'] as $row) {
    echo 
    "<script>
        function change_deckBtn() {
            if($('.general$row').hasClass('click')) {
                $('.general$row').removeClass('click');
            }else {
                $('.general$row').addClass('click');
            }
        }
        change_deckBtn();
</script>";}}?>
<?php require 'login_confirm_function.php'; ?>
</html>