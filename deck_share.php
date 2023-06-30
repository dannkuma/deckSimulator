<?php session_start(); ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=xs344307_eiketsu;charset=utf8',
'xs344307_user', 'password');

$total_power = 0;
$total_intelligence = 0;
$total_cost = 0;
$total_blue_cost_val =0;
$total_red_cost_val =0;
$total_green_cost_val =0;
$total_gray_cost_val =0;
$total_purple_cost_val =0;
$total_sengoku_cost_val =0;
$total_edo_cost_val =0;
$total_RomanceOfTheThreeKingdoms_cost_val=0;
$total_peace_cost_val =0;
$total_springAndAutumn_cost_val =0;
$total_special_cost_val =0;
$total_ambush_count=0;
$total_guardrail_count=0;
$total_revival_count=0;
$total_tolerance_count=0;
$total_fighting_spirit_count=0;
$total_sniping_count=0;
$total_enhancement_val=0;
$total_technique_val=0;
$total_vanguard_count=0;
$total_ogre_count=0;
foreach($_SESSION['deck'] as $row) {
    $sql=$pdo->prepare('select * from general where id=?');
    $sql->execute([$row]);
    foreach($sql as $row) {
        $total_power+=$row['power'];
        $total_intelligence+=$row['intelligence'];
        $total_cost+=$row['cost'];
        if(!(empty($row['color']))) {//色別トータルコストの振り分け コンテンツの数字を変数に
            if($row['color'] == 'blue') {
                $total_blue_cost_val += $row['cost'];
            }elseif($row['color'] == 'red') {
                $total_red_cost_val += $row['cost'];
            }elseif($row['color'] == 'green') {
                $total_green_cost_val += $row['cost'];
            }elseif($row['color'] == 'gray') {
                $total_gray_cost_val += $row['cost'];
            }else{
                $total_purple_cost_val += $row['cost'];
            }
        }

        if(!(empty($row['period']))) {//色別トータルコストの振り分け コンテンツの数字を変数に
            if($row['period'] == '戦国') {
                $total_sengoku_cost_val += $row['cost'];
            }elseif($row['period'] == '江戸・幕末') {
                $total_edo_cost_val += $row['cost'];
            }elseif($row['period'] == '三国志') {
                $total_RomanceOfTheThreeKingdoms_cost_val += $row['cost'];
            }elseif($row['period'] == '平安') {
                $total_peace_cost_val += $row['cost'];
            }elseif($row['period'] == '春秋戦国'){
                $total_springAndAutumn_cost_val += $row['cost'];
            }else {
                $total_special_cost_val += $row['cost'];
            }
        }
        if(!(empty($row['special_skill_ambush']))) {//特技伏兵の振り分け li要素に入れるタグとコンテンツの数字を変数に
            $special_skill_array[] = '<p class="preview_special_skill">伏</p>';
            $total_ambush_count++;
        }
        if(!(empty($row['special_skill_guardrail']))) {//特技防柵の振り分け li要素に入れるタグとコンテンツの数字を変数に
            $special_skill_array[] = '<p class="preview_special_skill">柵</p>';
            $total_guardrail_count++;
        }
        if(!(empty($row['special_skill_revival']))) {//特技復活の振り分け li要素に入れるタグとコンテンツの数字を変数に
            $special_skill_array[] = '<p class="preview_special_skill">活</p>';
            $total_revival_count++;
        }
        if(!(empty($row['special_skill_tolerance']))) {//特技忍の振り分け li要素に入れるタグとコンテンツの数字を変数に
            $special_skill_array[] = '<p class="preview_special_skill">忍</p>';
            $total_tolerance_count++;
        }
        if(!(empty($row['special_skill_fighting_spirit']))) {//特技気合の振り分け li要素に入れるタグとコンテンツの数字を変数に
            $special_skill_array[] = '<p class="preview_special_skill">気</p>';
            $total_fighting_spirit_count++;
        }
        if(!(empty($row['special_skill_sniping']))) {//特技狙撃の振り分け li要素に入れるタグとコンテンツの数字を変数に
            $special_skill_array[] = '<p class="preview_special_skill">狙</p>';
            $total_sniping_count++;
        }
        if(!(empty($row['special_skill_enhancement']))) {//特技昂揚の振り分け li要素に入れるタグとコンテンツの数字を変数に
            $special_skill_array[] = '<p class="preview_special_skill">昂</p>';
            $total_enhancement_val += $row['cost'];
        }
        if(!(empty($row['special_skill_technique']))) {//特技技巧の振り分け li要素に入れるタグとコンテンツの数字を変数に
            $special_skill_array[] = '<p class="preview_special_skill">技</p>';
            $total_technique_val += $row['cost'];
        }
        if(!(empty($row['special_skill_vanguard']))) {//特技先陣の振り分け li要素に入れるタグとコンテンツの数字を変数に
            $special_skill_array[] = '<p class="preview_special_skill">先</p>';
            $total_vanguard_count++;
        }
        if(!(empty($row['special_skill_ogre']))) {//特技鬼の振り分け li要素に入れるタグとコンテンツの数字を変数に
            $special_skill_array[] = '<p class="preview_special_skill">鬼</p>';
            $total_ogre_count++;
        }
        if(isset($special_skill_array)) {//li要素に入れるpタグの連結
            $special_skill_join = join('', $special_skill_array);
            unset($special_skill_array);
        }

        //li要素からspecial_skillの開始タグまで
        $li_to_special_skill = '<li class="preview_deck_general">
        <p class="preview_general_image_wrap"><img alt="preview_general_image" src="img/flont_ ('. $row['id']. ').jpg" class="preview_general_image"></p>
        <p class="preview_general_period"><span>'. $row['period']. '</span></p>
        <section class="preview_general_list_content">
        <section class="preview_general_list_more_unit">
        <p class="preview_solder_icon"><img src="img/type_of_solder/'. $row['type_of_solder']. '.png" alt="preview_general_icon"></p>
        <div class="preview_general_list_special_skill">';

        //special_skillの終了からli要素の終了まで
        $special_skill_to_li ='</div>
        </section>
        <section class="preview_general_list_name_wrap"><p class="preview_general_list_name">'. $row['name']. '</p></section>
        </section>
        <p class="preview_general_cost"><img src="img/cost/'. $row['cost']. '.png" alt="cost_image"></p>
        <section class="preview_param_wrap">
        <p class="preview_power">'. $row['power']. '</p>
        <p class="preview_intelligence">'. $row['intelligence']. '</p>
        </section>
        </li>';
        if(isset($special_skill_join)) {//特技が存在する時
            //特技を格納した変数を開始と終了の変数の間に入れて連結する
            $li_text_join=$li_to_special_skill.$special_skill_join.$special_skill_to_li;
        }else {//特技が存在しない
            //開始と終了の変数を連結する
            $li_text_join=$li_to_special_skill.$special_skill_to_li;
        }
        $list_array[] = $li_text_join;//li用の配列に出来上がったli要素を追加する
    }
}

    $list_join = join('', $list_array);

    //色別コスト用配列の連結

    if(isset($total_blue_cost_val) && !($total_blue_cost_val == 0)) {
        $formatted_blue = sprintf("%.1f", $total_blue_cost_val);
        $total_blue_cost_text = '<p>蒼：'. $formatted_blue. '</p>';
        $total_color_cost_array[] = $total_blue_cost_text;
    }
    if(isset($total_red_cost_val) && !($total_red_cost_val == 0)) {
        $formatted_red = sprintf("%.1f", $total_red_cost_val);
        $total_red_cost_text = '<p>緋：'. $formatted_red. '</p>';
        $total_color_cost_array[] = $total_red_cost_text;
    }
    if(isset($total_green_cost_val) && !($total_green_cost_val == 0)) {
        $formatted_green = sprintf("%.1f", $total_green_cost_val);
        $total_green_cost_text = '<p>碧：'. $formatted_green. '</p>';
        $total_color_cost_array[] = $total_green_cost_text;
    }
    if(isset($total_gray_cost_val) && !($total_gray_cost_val == 0)) {
        $formatted_gray = sprintf("%.1f", $total_gray_cost_val);
        $total_gray_cost_text = '<p>玄：'. $formatted_gray. '</p>';
        $total_color_cost_array[] = $total_gray_cost_text;
    }
    if(isset($total_purple_cost_val) && !($total_purple_cost_val == 0)) {
        $formatted_purple = sprintf("%.1f", $total_purple_cost_val);
        $total_purple_cost_text = '<p>紫：'. $formatted_purple. '</p>';
        $total_color_cost_array[] = $total_purple_cost_text;
    }
    $total_color_cost_text_join = join('', $total_color_cost_array);

    //時代別コスト用配列の連結

    if(isset($total_sengoku_cost_val) && !($total_sengoku_cost_val == 0)) {
        $formatted_sengoku = sprintf("%.1f", $total_sengoku_cost_val);
        $total_sengoku_cost_text = '<p>戦国：'. $formatted_sengoku. '</p>';
        $total_period_cost_array[] = $total_sengoku_cost_text;
    }
    if(isset($total_edo_cost_val) && !($total_edo_cost_val == 0)) {
        $formatted_edo = sprintf("%.1f", $total_edo_cost_val);
        $total_edo_cost_text = '<p>江戸・幕末：'. $formatted_edo. '</p>';
        $total_period_cost_array[] = $total_edo_cost_text;
    }
    if(isset($total_RomanceOfTheThreeKingdoms_cost_val) && !($total_RomanceOfTheThreeKingdoms_cost_val == 0)) {
        $formatted_RomanceOfTheThreeKingdoms = sprintf("%.1f", $total_RomanceOfTheThreeKingdoms_cost_val);
        $total_RomanceOfTheThreeKingdoms_cost_text = '<p>三国志：'. $formatted_RomanceOfTheThreeKingdoms. '</p>';
        $total_period_cost_array[] = $total_RomanceOfTheThreeKingdoms_cost_text;
    }
    if(isset($total_peace_cost_val) && !($total_peace_cost_val == 0)) {
        $formatted_peace = sprintf("%.1f", $total_peace_cost_val);
        $total_peace_cost_text = '<p>平安：'. $formatted_peace. '</p>';
        $total_period_cost_array[] = $total_peace_cost_text;
    }
    if(isset($total_springAndAutumn_cost_val) && !($total_springAndAutumn_cost_val == 0)) {
        $formatted_springAndAutumn = sprintf("%.1f", $total_springAndAutumn_cost_val);
        $total_springAndAutumn_cost_text = '<p>春秋戦国：'. $formatted_springAndAutumn. '</p>';
        $total_period_cost_array[] = $total_springAndAutumn_cost_text;
    }
    if(isset($total_special_cost_val) && !($total_special_cost_val == 0)) {
        $formatted_special = sprintf("%.1f", $total_special_cost_val);
        $total_special_cost_text = '<p>特殊：'. $formatted_special. '</p>';
        $total_period_cost_array[] = $total_special_cost_text;
    }
    $total_period_cost_text_join = join('', $total_period_cost_array);


    if(isset($total_power)) {
        $total_power_text = '<p>'. $total_power. '</p>';
    }

    if(isset($total_intelligence)) {
        $total_intelligence_text = '<p>'. $total_intelligence. '</p>';
    }

    
$html_to_ul_start = '<html lang="ja">
<style>
    html {
        width: 387px;
        margin: 0 auto;
        background-color: rgba(2, 2, 2, 0.766);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    h2 {
        font-size: 18px;
    }

    ul {
        list-style-type: none;
        width: 325px;
        display: flex;
        border: 0.5px solid gray;
        border-radius: 2px;
        background-color: ##DCD1BE;
    }

    ul p {
        font-size: 12px;
        color: rgb(71, 70, 70);
        font-weight: 550;
    }

    li {
        width: 40.8px;
        border: 0.1px solid gray;
        /* margin-top: -0.5px; */
        /* margin-bottom: -0.5px; */
        margin-right: -0.5px;
    }

    .preview_wrap {
        width: 100%;
        background-color: #DCCFBC;
        border: 0.5px solid gray;
        border-radius: 10px;
        padding: 10px;
    }

    .preview_total_cost {
        width: 170px;
        text-align: center;
        margin: 0 auto;
        border: 2px double gray;
        /* border-top-left-radius: 30px; */
        /*要素の左上角にborder-radius30pxを指定*/
        border-top-right-radius: 10px;
        /*要素の右上角にborder-radius90pxを指定*/
        /* border-bottom-right-radius: 30px; */
        /*要素の右下角にborder-radius30pxを指定*/
        border-bottom-left-radius: 10px;
        /*要素の左下角にborder-radius90pxを指定*/
        margin-bottom: 5px;
        font-size: 14px;
        color: rgb(71, 70, 70);
    }

    .total_cost_val {
        color: rgb(196, 2, 2);
    }

    .preview_main_content_wrap {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .preview_deck_list_header {
        width: 30px;
        border: 2px double gray;
        padding-top: 8px;
        padding-bottom: 8px;
        text-align: center;
        color: rgb(71, 70, 70);
    }

    /* 後で消す */
    .preview_general_image_wrap {
        font-size: 8px;
        width: 100%;
        height: 63px;
    }

    .preview_general_image {
        width: 100%;
        height: 100%;
    }

    .preview_general_list_content {
        display: flex;
        width: 100%;
        height: 120px;
    }

    .preview_general_period {
        background-color: black;
        color: white;
        text-align: center;
        font-size: 8px;
        display: flex;
        justify-content: center;
    }

    .preview_general_period span {
        white-space: nowrap;
        transform: scale(0.7);
    }

    .preview_general_list_more_unit,
    .preview_general_list_name_wrap {
        width: 50%;
        text-align: center;
        padding-top: 2px;
    }

    .preview_solder_icon {
        width: 100%;
        height: 20px;
        display: flex;
        justify-content: space-around;
        align-items: center;
    }

    .preview_solder_icon img {
        width: 18.5px;
        height: 18.5px;
    }

    .preview_general_list_special_skill {
        width: 100%;
        margin-top: 2px;
    }

    .preview_special_skill {
        font-size: 10px;
        width: 80%;
        margin: 0 auto;
        border: 0.5px solid gray;
        border-radius: 1px;
        margin-bottom: 1px;
        background-color: black;
        color: white;
        border-bottom-right-radius: 8px;
    }

    .preview_general_list_name_wrap {
        display: flex;
    }

    .preview_general_list_name {
        width: 95%;
        font-size: 14px;
        line-height: 18px;
    }

    .preview_general_cost img {
        width: 100%;
    }

    .preview_param_wrap {
        width: 100%;
        display: flex;
        border-top: 1px solid gray;
    }

    .preview_power,
    .preview_intelligence {
        width: 50%;
        height: 18px;
        text-align: center;
    }

    .preview_power {
        background-color: black;
        color: white;
    }

    .preview_total_cost_wrap,
    .total_param_wrap {
        margin-top: 20px;
        display: flex;
        justify-content: space-between;
    }

    .middle_block {
        width: 48%;
    }

    .middle_block p {
        font-size: 12px;
        text-align: right;
        color: #AF2F3B;
        font-weight: 700;
    }

    .block_header {
        font-size: 14px;
        color: rgb(71, 70, 70);
        display: flex;
        align-items: center;
    }

    .block_header::after {
        content: "";
        flex-grow: 1;
        display: block;
        height: 1px;
        background: #333;
        margin-left: 0.5rem;
    }

    .preview_special_skill_header {
        font-size: 14px;
        color: rgb(71, 70, 70);
        display: flex;
        align-items: center;
    }

    .preview_special_skill_header::after {
        content: "";
        flex-grow: 1;
        display: block;
        height: 1px;
        background: #333;
        margin-left: 0.5rem;

    }

    .total_special_skill_wrap p {
        font-size: 12px;
    }

    .preview_count_skill {
        display: flex;
        justify-content: left;
        border-bottom: 0.2px dotted rgb(71, 70, 70);
        padding-bottom: 5px;
    }

    .count_skill_wrap {
        width: 32%;
        display: flex;
        flex-wrap: wrap;

    }

    .count_skill_block {
        width: 30px;
        text-align: center;
        height: 18px;
        line-height: 18px;
        border: 1.7px solid black;
        border-radius: 4px;
        background-color: #DDCBA8;
    }

    .count_skill_unit {
        color: #AF2F3B;
        font-weight: 700;
        height: 14px;
        align-self: flex-end;
        font-size: 14px;
    }

    .count_span {
        color: black;
        font-size: 10px;
    }

    .preview_skill {
        display: flex;
        flex-wrap: wrap;
        padding-top: 5px;
    }

    .skill_wrap {
        width: 32%;
        display: flex;
        margin-bottom: 4px;
    }

    .skill_block {
        width: 30px;
        text-align: center;
        height: 18px;
        line-height: 18px;
        border: 1.7px solid black;
        border-radius: 4px;
        background-color: #DDCBA8;
    }

    .skill_unit {
        color: #AF2F3B;
        font-weight: 700;
        height: 14px;
        align-self: flex-end;
        font-size: 14px;
    }

    .share_close_area {
        text-align: right;
    }

    .share_close_btn {
        text-decoration: none;
        color: white;
        font-size: 26px;
    }

    .share_close_btn:hover {
        opacity: 0.7;
    }
</style>

<p class="share_close_area">
<a href="deck_detail.php" class="share_close_btn">×</a>
</p>

<section class="preview_wrap">
<h2 class="preview_total_cost">総コスト：<span class="total_cost_val">6.0</span></h2>
<section class="preview_main_content_wrap">
    <h2 class="preview_deck_list_header">登録武将</h2>
    <ul class="preview_deck_list_wrap">';

    $ul_end_to_total_intelligence = '</ul>
    </section>
    <section class="preview_total_cost_wrap">
        <section class="preview_total_color_cost_wrap middle_block">
            <h2 class="block_header">◇勢力別コスト</h2>
            '. $total_color_cost_text_join.'
        </section>
        <section class="preview_total_period_cost_wrap middle_block">
            <h2 class="block_header">◇時代勢力別コスト</h2>
            '. $total_period_cost_text_join. '
        </section>
    </section>
    <section class="total_param_wrap">
        <section class="preview_total_power_wrap middle_block">
            <h2 class="block_header">◇総武力</h2>
            '. $total_power_text. '
        </section>
        <section class="preview_total_intelligence_wrap middle_block">
            <h2 class="block_header">◇総知力</h2>
            '. $total_intelligence_text. '
        </section>
    </section>';

    //特技合計用配列の連結

    if(isset($total_ambush_count) && !($total_ambush_count == 0)) {
        $total_ambush_text = '<div class="skill_wrap"><p class="skill_block">伏兵</p><p class="skill_unit">×'. $total_ambush_count. '</p></div>';
        $total_special_skill_array[] = $total_ambush_text;
    }
    if(isset($total_guardrail_count) && !($total_guardrail_count == 0)) {
        $total_guardrail_text = '<div class="skill_wrap"><p class="skill_block">防柵</p><p class="skill_unit">×'. $total_guardrail_count. '</p></div>';
        $total_special_skill_array[] = $total_guardrail_text;
    }
    if(isset($total_revival_count) && !($total_revival_count) == 0) {
        $total_revival_text = '<div class="skill_wrap"><p class="skill_block">復活</p><p class="skill_unit">×'. $total_revival_count. '</p></div>';
        $total_special_skill_array[] = $total_revival_text;
    }
    if(isset($total_tolerance_count) && !($total_tolerance_count) == 0) {
        $total_tolerance_text = '<div class="skill_wrap"><p class="skill_block">忍</p><p class="skill_unit">×'. $total_tolerance_count. '</p></div>';
        $total_special_skill_array[] = $total_tolerance_text;
    }
    if(isset($total_fighting_spirit_count) && !($total_fighting_spirit_count) == 0) {
        $total_fighting_spirit_text = '<div class="skill_wrap"><p class="skill_block">気合</p><p class="skill_unit">×'. $total_fighting_spirit_count. '</p></div>';
        $total_special_skill_array[] = $total_fighting_spirit_text;
    }
    if(isset($total_sniping_count) && !($total_sniping_count) == 0) {
        $total_sniping_text = '<div class="skill_wrap"><p class="skill_block">狙撃</p><p class="skill_unit">×'. $total_sniping_count. '</p></div>';
        $total_special_skill_array[] = $total_sniping_text;
    }
    if(isset($total_enhancement_val) && !($total_enhancement_val) == 0) {
        $total_enhancement_text = '<div class="count_skill_wrap"><p class="skill_block">昂揚</p><p class="skill_unit">×'. $total_enhancement_val. '<span class="count_span">コスト</span></p></div>';
        $total_special_skill_count_array[] = $total_enhancement_text;
    }
    if(isset($total_technique_val) && !($total_technique_val) == 0) {
        $total_technique_text = '<div class="count_skill_wrap"><p class="skill_block">技巧</p><p class="skill_unit">×'. $total_technique_val. '<span class="count_span">コスト</span></p></div>';
        $total_special_skill_count_array[] = $total_technique_text;
    }
    if(isset($total_vanguard_count) && !($total_vanguard_count) == 0) {
        $total_vanguard_text = '<div class="skill_wrap"><p class="skill_block">先陣</p><p class="skill_unit">×'. $total_vanguard_count. '</p></div>';
        $total_special_skill_array[] = $total_vanguard_text;
    }
    if(isset($total_ogre_count) && !($total_ogre_count) == 0) {
        $total_ogre_text = '<div class="skill_wrap"><p class="skill_block">鬼</p><p class="skill_unit">×'. $total_ogre_count. '</p></div>';
        $total_special_skill_array[] = $total_ogre_text;
    }

    if(isset($total_special_skill_array)) {//コストをカウントしない特技の連結
        $total_special_skill_join = join('', $total_special_skill_array);
    }

    if(isset($total_special_skill_count_array)) {//コストをカウントする特技の連結
        $total_special_skill_count_join = join('', $total_special_skill_count_array);
    }

    
    $skill_wrap_to_count_skill = '<section class="total_special_skill_wrap">
    <h2 class="preview_special_skill_header">◇特技合計</h2>
    <div class="preview_count_skill">';
    $count_skill_bottom = '</div>';
    $preview_skill_top = '<div class="preview_skill">';
    $preview_skill_bottom_to_html_end = '</div>
    </section>
    </section>
    </html>';

    if(isset($total_special_skill_count_join)) {
        $special_skill_count = $skill_wrap_to_count_skill. $total_special_skill_count_join. $count_skill_bottom;
    }else {
        $special_skill_count = $skill_wrap_to_count_skill. $count_skill_bottom;
    }

    if(isset($total_special_skill_join)) {
        $special_skill_to_html_end = $preview_skill_top. $total_special_skill_join. $preview_skill_bottom_to_html_end;
    }else {
        $special_skill_to_html_end = $preview_skill_top. $preview_skill_bottom_to_html_end;
    }

    $html = $html_to_ul_start. $list_join. $ul_end_to_total_intelligence. $special_skill_count. $special_skill_to_html_end;

?>
<?php

header('X-FRAME-OPTIONS:DENY');

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<script
      src="https://code.jquery.com/jquery-3.6.4.js"
      integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
      crossorigin="anonymous">
    </script>
    <script src="/decksimulator/html2canvas.min.js"></script>
</head>
<body>
    <?php echo $html?>

    <script>
    // HTML要素をキャプチャして画像に変換
    html2canvas(document.querySelector('.preview_wrap'), {
        className: 'preview_wrap',//取得する要素のクラスを指定
        scale: 2,//作成する画像のサイズを指定
        backgroundColor: 'rgba(2, 2, 2, 0.766)'//画像の背景色を設定する
    }
    ).then(function(canvas) {
        // 変換された画像データを取得
        var image = canvas.toDataURL();
        // 画像を表示するためのimg要素を作成
        var img = document.createElement('img');
        //imgのwidthを指定
        img.style.width = '387px';
        //src属性にURLを渡す
        img.src = image;

        // 画像を表示するための要素に追加
        document.body.appendChild(img);
        $('.preview_wrap').remove();
    });

    document.documentElement.style.zoom = "150%"; // 倍率を200%に設定
    </script>
    <style>
    </style>
</body>
</html>

