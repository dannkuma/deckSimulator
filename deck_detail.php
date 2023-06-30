<?php session_start(); ?>
<?php require 'header.php'; ?>
<script
      src="https://code.jquery.com/jquery-3.6.4.js"
      integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
      crossorigin="anonymous"></script>

<?php

const BTN_DIRECTION_LEFT = 'left';
const BTN_DIRECTION_RIGHT = 'right';

$url = '';//URL代入用
if(isset($_SERVER['HTTPS'])){//httpsであるか判別
    $url .= 'https://';
}else{
    $url .= 'http://';
}
$url .= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];//連結
if(isset($_SESSION['deck_url'])) {//セットされている
    unset($_SESSION['deck_url']);
    $_SESSION['deck_url'] = $url;
} else {//初回
    $_SESSION['deck_url'] = $url;
}

$pdo=new PDO('mysql:host=localhost;dbname=xs344307_eiketsu;charset=utf8',
'xs344307_user', 'password');
$total_cost=0;
$total_power=0;
$total_intelligence=0;
$total_blue=0;
$total_red=0;
$total_green=0;
$total_gray=0;
$total_purple=0;
$total_sengoku=0;
$total_edo=0;
$total_RomanceOfTheThreeKingdoms=0;
$total_peace=0;
$total_springAndAutumn=0;
$total_special=0;
$total_ambush=0;
$total_guardrail=0;
$total_revival=0;
$total_tolerance=0;
$total_fighting_spirit=0;
$total_sniping=0;
$total_enhancement=0;
$total_technique=0;
$total_vanguard=0;
$total_ogre=0;
foreach($_SESSION['deck'] as $key=>$row) {
    $key=$pdo->prepare('select * from general where id=?');
    $key->execute([$row]);
    foreach($key as $row) {
        $total_power+=$row['power'];
        $total_intelligence+=$row['intelligence'];
        $total_cost+=$row['cost'];
        if($row['color'] === 'blue') {
            $total_blue+=$row['cost'];
        } elseif($row['color'] === 'red') {
            $total_red+=$row['cost'];
        } elseif($row['color'] === 'green') {
            $total_green+=$row['cost'];
        } elseif($row['color'] === 'gray') {
            $total_gray+=$row['cost'];
        } else {
            $total_purple+=$row['cost'];
        }
        
        if($row['period'] === '戦国') {
            $total_sengoku+=$row['cost'];
        } elseif($row['period'] === '江戸・幕末') {
            $total_edo+=$row['cost'];
        } elseif($row['period'] === '三国志') {
            $total_RomanceOfTheThreeKingdoms+=$row['cost'];
        } elseif($row['period'] === '平安') {
            $total_peace+=$row['cost'];
        } elseif($row['period'] === '春秋戦国') {
            $total_springAndAutumn+=$row['cost'];
        } else {
            $total_special+=$row['cost'];
        }

        if(!$row['special_skill_ambush'] == null) {
            $total_ambush++;
        }

        if(!$row['special_skill_guardrail'] == null) {
            $total_guardrail++;
        }

        if(!$row['special_skill_revival'] == null) {
            $total_revival++;
        }

        if(!$row['special_skill_tolerance'] == null) {
            $total_tolerance++;
        }

        if(!$row['special_skill_fighting_spirit'] == null) {
            $total_fighting_spirit++;
        }

        if(!$row['special_skill_sniping'] == null) {
            $total_sniping++;
        }

        if(!$row['special_skill_enhancement'] == null) {
            $total_enhancement++;
        }

        if(!$row['special_skill_technique'] == null) {
            $total_technique++;
        }

        if(!$row['special_skill_vanguard'] == null) {
            $total_vanguard++;
        }

        if(!$row['special_skill_ogre'] == null) {
            $total_ogre++;
        }
    }
}
echo '<div class="deck_wrapper">';//デッキ開始
echo '<div class="close_deck_area">';//閉じるボタン開始
echo '<a href="move_page.php">戻る</a>';//閉じるボタン
echo '<div class="clear_right"></div>';//clear
echo '</div>';//閉じるボタン終了
echo '<div class="deck_list_header">';//見出し開始
echo '<h2 class="deck_list_header_text">デッキ詳細</h2>';
echo '</div>';//見出し終了
echo '<div class="deck_nav_area">';//ナビゲーション開始
echo '<div class="deck_remove_area">';//全て外す開始
echo '<a href="deck_clear.php" class="all_remove">全て外す</a>';//全て外すボタン
echo '</div>';//全て外す終了
echo '<div class="deck_total_cost_area">';//総コスト開始
echo '<p class="total_cost">総コスト：<span class="total_cost_int">';
echo sprintf('%.1f',$total_cost),PHP_EOL; 
echo '</span></p>';
echo '</div>';//総コスト終了
echo '<div class="deck_share_area">';//共有ボタン開始
echo '<a href="deck_share.php" class="deck_share_btn">デッキ画像生成</a>';
echo '</div>';//共有ボタン終了
echo '<div class="clear_left clear_right"></div>';//clear
echo '</div>';
echo '<div class="deck_list_wrapper">';
echo '<form class="deck_form" action="" method="post">';
echo '<div class="deck_list_header_wrap"><h3 class="deck_list_area_header">登録武将</h3></div>';
echo '<ul class="deck_list_area">';
echo '</ul>';
echo '<input type="submit" id="hidden_submit" class="hidden_submit">';
echo '<input type="hidden" name="clicked_card_index" value="">';
echo '<input type="hidden" name="clicked_btn_direction" value="">';
echo '<div class="clear_left"></div>';
echo '</form>';
echo '</div>';//デッキリスト終了
echo '<div class="deck_total_area_1">';//トータル最上段開始
echo '<div class="color_by_type_cost">';//色別コスト開始
echo '<h3 class="color_by_type_cost_header">◇勢力別コスト</h3>';
echo '<div class="total_color_block">';
if(!$total_blue == 0) {
    echo '<p class="total_color">蒼：', sprintf('%.1f',$total_blue),PHP_EOL, '</p>'; 
}

if(!$total_red == 0) {
    echo '<p class="total_color">緋：', sprintf('%.1f',$total_red),PHP_EOL, '</p>'; 
}

if(!$total_green == 0) {
    echo '<p class="total_color">碧：', sprintf('%.1f',$total_green),PHP_EOL, '</p>'; 
}

if(!$total_gray == 0) {
    echo '<p class="total_color">玄：', sprintf('%.1f',$total_gray),PHP_EOL, '</p>'; 
}

if(!$total_purple == 0) {
    echo '<p class="total_color">紫：', sprintf('%.1f',$total_purple),PHP_EOL, '</p>'; 
}
echo '</div>';
echo '</div>';//色別コスト終了
echo '<div class="period_by_type_cost">';//時代別コスト開始
echo '<h3 class="period_by_type_cost_header">◇時代勢力別コスト</h3>';
echo '<div class="total_period_block">';
if(!$total_sengoku == 0) {
    echo '<p class="total_period">戦国：', sprintf('%.1f',$total_sengoku),PHP_EOL, '</p>'; 
}

if(!$total_edo == 0) {
    echo '<p class="total_period">江戸・幕末：', sprintf('%.1f',$total_edo),PHP_EOL, '</p>'; 
}

if(!$total_RomanceOfTheThreeKingdoms== 0) {
    echo '<p class="total_period">三国志：', sprintf('%.1f',$total_RomanceOfTheThreeKingdoms),PHP_EOL, '</p>'; 
}

if(!$total_peace == 0) {
    echo '<p class="total_period">平安：', sprintf('%.1f',$total_peace),PHP_EOL, '</p>'; 
}

if(!$total_springAndAutumn == 0) {
    echo '<p class="total_period">春秋戦国：', sprintf('%.1f',$total_springAndAutumn),PHP_EOL, '</p>'; 
}

if(!$total_special == 0) {
    echo '<p class="total_period">特殊：', sprintf('%.1f',$total_special),PHP_EOL, '</p>'; 
}
echo '</div>';
echo '</div>';//時代別コスト終了
echo '<div class="clear_left"></div>';
echo '</div>';//トータル最上段終了
echo '<div class="deck_total_area_2">';//トータル2段目開始
echo '<div class="total_power_wrapper">';//総武力開始
echo '<h3 class="total_power_header">◇総武力</h3>';
echo '<p class="total_power">', $total_power, '</p>';
echo '</div>';//総武力終了
echo '<div class="total_intelligence_wrapper">';//総知力開始tota
echo '<h3 class="total_intelligence_header">◇総知力</h3>';
echo '<p class="total_intelligence">', $total_intelligence, '</p>';
echo '</div>';//総知力終了
echo '<div class="clear_left"></div>';
echo '</div>';//トータル2段目終了
echo '<div class="deck_total_area_3">';//トータル3段目開始
echo '<div class="total_special_skill">';//総特技開始
echo '<h3 class="total_special_skill_header">◇特技合計</h3>';
echo '<div class="total_special_skill_wrapper">';
if(!$total_ambush == 0) {
    echo '<div class="total_special_skill_area"><p class="special_skill_block">伏兵</p><span class="quantity">×', $total_ambush, '</span><div class="clear_right"></div></div>';
}

if(!$total_guardrail == 0) {
    echo '<div class="total_special_skill_area"><p class="special_skill_block">防柵</p><span class="quantity">×', $total_guardrail, '</span><div class="clear_right"></div></div>';
}

if(!$total_revival == 0) {
    echo '<div class="total_special_skill_area"><p class="special_skill_block">復活</p><span class="quantity">×', $total_revival, '</span><div class="clear_right"></div></div>';
}

if(!$total_tolerance == 0) {
    echo '<div class="total_special_skill_area"><p class="special_skill_block">忍</p><span class="quantity">×', $total_tolerance, '</span><div class="clear_right"></div></div>';
}

if(!$total_fighting_spirit == 0) {
    echo '<div class="total_special_skill_area"><p class="special_skill_block">気合</p><span class="quantity">×', $total_fighting_spirit, '</span><div class="clear_right"></div></div>';
}

if(!$total_sniping == 0) {
    echo '<div class="total_special_skill_area"><p class="special_skill_block">狙撃</p><span class="quantity">×', $total_sniping, '</span><div class="clear_right"></div></div>';
}

if(!$total_enhancement == 0) {
    echo '<div class="total_special_skill_area"><p class="special_skill_block">昂揚</p><span class="quantity">×', $total_enhancement, '</span><div class="clear_right"></div></div>';
}

if(!$total_technique == 0) {
    echo '<div class="total_special_skill_area"><p class="special_skill_block">技巧</p><span class="quantity">×', $total_technique, '</span><div class="clear_right"></div></div>';
}

if(!$total_vanguard == 0) {
    echo '<div class="total_special_skill_area"><p class="special_skill_block">先陣</p><span class="quantity">×', $total_vanguard, '</span><div class="clear_right"></div></div>';
}

if(!$total_ogre == 0) {
    echo '<div class="total_special_skill_area"><p class="special_skill_block">鬼</p><span class="quantity">×', $total_ogre, '</span><div class="clear_right"></div></div>';
}
echo '<div class="clear_left clear_right"></div>';
echo '</div>';
echo '</div>';//総特技終了
echo '</div>';//トータル3段目終了
echo '</div>';//デッキ終了


if(
    !empty($_POST)
    && array_key_exists('clicked_card_index', $_POST)
    && array_key_exists('clicked_btn_direction', $_POST)
) {
    $clickedCardIndex = $_POST['clicked_card_index'];
    $tmp = $_SESSION['deck'][$clickedCardIndex];
    if($_POST['clicked_btn_direction'] === BTN_DIRECTION_LEFT) {
        $_SESSION['deck'][$clickedCardIndex] = $_SESSION['deck'][$clickedCardIndex -1];
        $_SESSION['deck'][$clickedCardIndex -1] = $tmp;

    }elseif ($_POST['clicked_btn_direction'] === BTN_DIRECTION_RIGHT) {
        $_SESSION['deck'][$clickedCardIndex] = $_SESSION['deck'][$clickedCardIndex +1];
        $_SESSION['deck'][$clickedCardIndex +1] = $tmp;
    }
}

$array_count = count($_SESSION['deck']);
foreach($_SESSION['deck'] as $key => $row) {
    if($key == 0 && $array_count>1) {//一番左かつ他にも武将がいる
    $sql=$pdo->prepare('select * from general where id=?');
    $sql->execute([$row]);
    $value=$sql->fetch(PDO::FETCH_ASSOC);
    $type_of_solder_json = json_encode($value['type_of_solder']);
    $name_json = json_encode($value['name']);
    $cost_json = json_encode($value['cost']);
    $power_json = json_encode($value['power']);
    $intelligence_json = json_encode($value['intelligence']);
    $period_json = json_encode($value['period']);
    $row_json = json_encode($row);
    $key_json = json_encode($key);
    ?>
    <script>
        function create_deckList_right() {
            var type_of_solder = JSON.parse('<?php echo $type_of_solder_json; ?>');
            var row = JSON.parse('<?php echo $row_json; ?>');
            var key = JSON.parse('<?php echo $key_json; ?>');
            var name = JSON.parse('<?php echo $name_json; ?>');
            var cost = JSON.parse('<?php echo $cost_json; ?>');
            var power = JSON.parse('<?php echo $power_json; ?>');
            var intelligence = JSON.parse('<?php echo $intelligence_json; ?>');
            var period = JSON.parse('<?php echo $period_json; ?>');
            $('.deck_list_area').append('<li class=\"deck_general_'+row+' deck_list\">'+
            '<a href="general_detail_insert.php?id='+row+'" class="general_detail_link">'+
            '<img alt=\"image\" src=\"img/flont_ ('+row+').jpg\" class=\"deck_list_image\">'+
            '</a>'+
            '<div class=\"deck_main_area\">'+
                '<div class=\"deck_top_area\">'+
                    '<div class=\"deck_period_area\"'+
                        '<p>'+period+'</p>'+
                    '</div>'+
                    '<div class="deck_info_area">'+
                    '<div class=\"deck_feature\">'+
                        '<div class=\"deck_type_of_solder\">'+
                            '<img class=\"deck_solder_icon\" alt=\"type_of_solder\" src=\"img/type_of_solder/'+type_of_solder+'.png\">'+
                        '</div>'+//兵種終わり
                        '<div class=\"deck_special_skill_icon\">'+
                        '<?php 
                            if(!empty($value['special_skill_none'])) {
                                echo '<p class=\"deck_special_skill_none\">特技なし</p>';
                            }
                        ?>'+
                        '<?php 
                            if(!empty($value['special_skill_ambush'])) {
                                echo '<p class=\"deck_special_skill_on\">伏</p>';
                            }
                            ?>'+
                        '<?php 
                            if(!empty($value['special_skill_guardrail'])) {
                                echo '<p class=\"deck_special_skill_on\">柵</p>';
                            }
                            ?>'+
                        '<?php 
                            if(!empty($value['special_skill_revival'])) {
                                echo '<p class=\"deck_special_skill_on\">活</p>';
                            }
                            ?>'+
                        '<?php 
                            if(!empty($value['special_skill_tolerance'])) {
                                echo '<p class=\"deck_special_skill_on\">忍</p>';
                            }
                            ?>'+
                        '<?php 
                            if(!empty($value['special_skill_fighting_spirit'])) {
                                echo '<p class=\"deck_special_skill_on\">気</p>';
                            }
                            ?>'+
                        '<?php 
                            if(!empty($value['special_skill_sniping'])) {
                                echo '<p class=\"deck_special_skill_on\">狙</p>';
                            }
                            ?>'+
                        '<?php 
                            if(!empty($value['special_skill_enhancement'])) {
                                echo '<p class=\"deck_special_skill_on\">昂</p>';
                            }
                            ?>'+
                        '<?php 
                            if(!empty($value['special_skill_technique'])) {
                                echo '<p class=\"deck_special_skill_on\">技</p>';
                            }
                            ?>'+
                        '<?php
                            if(!empty($value['special_skill_vanguard'])) {
                                echo '<p class=\"deck_special_skill_on\">先</p>';
                            }
                            ?>'+
                        '<?php 
                            if(!empty($value['special_skill_ogre'])) {
                                echo '<p class=\"deck_special_skill_on\">鬼</p>';
                            }
                            ?>'+
                            '</div>'+//特技終わり
                    '</div>'+//feature終わり
                    '<div class=\"deck_general_name\">'+
                        '<p>'+name+'</p>'+
                    '</div>'+//name終わり
                    '</div>'+//deck_info終わり
                '</div>'+//deck_top終わり
                '<div class=\"clear_left\"></div>'+
                '<div class=\"deck_cost_area\">'+
                            '<img alt=\"deck_cost\" src=\"img/cost/'+cost+'.png\" class=\"deck_cost_icon\">'+
                '</div>'+//コスト終わり
                '<div class=\"deck_param_area\">'+
                            '<p class=\"deck_power\">'+power+'</p>'+
                            '<p class=\"deck_intelligence\">'+intelligence+'</p>'+
                '</div>'+//deck_param終わり
                '<div class=\"move_btn_area\">'+
                '<button class=\"left_btn\" type=\"button\" onclick=\"submitByLeftBtn('+key+');\" disabled>←</button>'+
                    '<button class=\"right_btn\" type=\"button\" onclick=\"submitByRightBtn('+key+');\">→</button>'+
                '</div>'+//矢印エリア終わり
                '<div class=\"remove_btn_area\">'+
                    '<a class=\"deck_remove\" href=\"deck_val_remove.php?generalId='+row+'\">外す</a>'+
                '</div>'+//削除エリア終わり
            '</li>');
        }
            create_deckList_right();
    </script>
    <?php
    } elseif($key === $array_count-1 && $array_count>1) {//一番右かつ他にも武将がいる
        $sql=$pdo->prepare('select * from general where id=?');
    $sql->execute([$row]);
    $value=$sql->fetch(PDO::FETCH_ASSOC);
    $type_of_solder_json = json_encode($value['type_of_solder']);
    $name_json = json_encode($value['name']);
    $cost_json = json_encode($value['cost']);
    $power_json = json_encode($value['power']);
    $intelligence_json = json_encode($value['intelligence']);
    $period_json = json_encode($value['period']);
    $row_json = json_encode($row);
    $key_json = json_encode($key);
    ?>
    <script>
        function create_deckList_right() {
            var type_of_solder = JSON.parse('<?php echo $type_of_solder_json; ?>');
            var row = JSON.parse('<?php echo $row_json; ?>');
            var key = JSON.parse('<?php echo $key_json; ?>');
            var name = JSON.parse('<?php echo $name_json; ?>');
            var cost = JSON.parse('<?php echo $cost_json; ?>');
            var power = JSON.parse('<?php echo $power_json; ?>');
            var intelligence = JSON.parse('<?php echo $intelligence_json; ?>');
            var period = JSON.parse('<?php echo $period_json; ?>');
            $('.deck_list_area').append('<li class=\"deck_general_'+row+' deck_list\">'+
            '<img alt=\"image\" src=\"img/flont_ ('+row+').jpg\" class=\"deck_list_image\">'+
            '<div class=\"deck_main_area\">'+
                '<div class=\"deck_top_area\">'+
                '<div class=\"deck_period_area\">'+
                    '<p>'+period+'</p>'+
                '</div>'+
                    '<div class="deck_info_area">'+
                    '<div class=\"deck_feature\">'+
                        '<div class=\"deck_type_of_solder\">'+
                            '<img class=\"deck_solder_icon\" alt=\"type_of_solder\" src=\"img/type_of_solder/'+type_of_solder+'.png\">'+
                        '</div>'+//兵種終わり
                        '<div class=\"deck_special_skill_icon\">'+
                        '<?php 
                            if(!empty($value['special_skill_none'])) {
                                echo '<p class=\"deck_special_skill_none\">特技なし</p>';
                            }
                        ?>'+
                        '<?php 
                            if(!empty($value['special_skill_ambush'])) {
                                echo '<p class=\"deck_special_skill_on\">伏</p>';
                            }
                            ?>'+
                        '<?php 
                            if(!empty($value['special_skill_guardrail'])) {
                                echo '<p class=\"deck_special_skill_on\">柵</p>';
                            }
                            ?>'+
                        '<?php 
                            if(!empty($value['special_skill_revival'])) {
                                echo '<p class=\"deck_special_skill_on\">活</p>';
                            }
                            ?>'+
                        '<?php 
                            if(!empty($value['special_skill_tolerance'])) {
                                echo '<p class=\"deck_special_skill_on\">忍</p>';
                            }
                            ?>'+
                        '<?php 
                            if(!empty($value['special_skill_fighting_spirit'])) {
                                echo '<p class=\"deck_special_skill_on\">気</p>';
                            }
                            ?>'+
                        '<?php 
                            if(!empty($value['special_skill_sniping'])) {
                                echo '<p class=\"deck_special_skill_on\">狙</p>';
                            }
                            ?>'+
                        '<?php 
                            if(!empty($value['special_skill_enhancement'])) {
                                echo '<p class=\"deck_special_skill_on\">昂</p>';
                            }
                            ?>'+
                        '<?php 
                            if(!empty($value['special_skill_technique'])) {
                                echo '<p class=\"deck_special_skill_on\">技</p>';
                            }
                            ?>'+
                        '<?php
                            if(!empty($value['special_skill_vanguard'])) {
                                echo '<p class=\"deck_special_skill_on\">先</p>';
                            }
                            ?>'+
                        '<?php 
                            if(!empty($value['special_skill_ogre'])) {
                                echo '<p class=\"deck_special_skill_on\">鬼</p>';
                            }
                            ?>'+
                            '</div>'+//特技終わり
                    '</div>'+//feature終わり
                    '<div class=\"deck_general_name\">'+
                        '<p>'+name+'</p>'+
                    '</div>'+//name終わり
                    '</div>'+//deck_info終わり
                '</div>'+//deck_top終わり
                '<div class=\"clear_left\"></div>'+
                '<div class=\"deck_cost_area\">'+
                            '<img alt=\"deck_cost\" src=\"img/cost/'+cost+'.png\" class=\"deck_cost_icon\">'+
                '</div>'+//コスト終わり
                '<div class=\"deck_param_area\">'+
                            '<p class=\"deck_power\">'+power+'</p>'+
                            '<p class=\"deck_intelligence\">'+intelligence+'</p>'+
                '</div>'+//deck_param終わり
                '<div class=\"move_btn_area\">'+
                    '<button class=\"left_btn\" type=\"button\" onclick=\"submitByLeftBtn('+key+');\">←</button>'+
                    '<button class=\"right_btn\" type=\"button\" onclick=\"submitByRightBtn('+key+');\" disabled>→</button>'+
                '</div>'+//矢印エリア終わり
                '<div class=\"remove_btn_area\">'+
                    '<a class=\"deck_remove\" href=\"deck_val_remove.php?generalId='+row+'\">外す</a>'+
                '</div>'+//削除エリア終わり
            '</li>');
        }
            create_deckList_right();
    </script>
    <?php
    } elseif($array_count === 1) {//登録武将が一枚の時
        $sql=$pdo->prepare('select * from general where id=?');
    $sql->execute([$row]);
    $value=$sql->fetch(PDO::FETCH_ASSOC);
    $type_of_solder_json = json_encode($value['type_of_solder']);
    $name_json = json_encode($value['name']);
    $cost_json = json_encode($value['cost']);
    $power_json = json_encode($value['power']);
    $intelligence_json = json_encode($value['intelligence']);
    $period_json = json_encode($value['period']);
    $row_json = json_encode($row);
    $key_json = json_encode($key);
    ?>
    <script>
        function create_deckList_right() {
            var type_of_solder = JSON.parse('<?php echo $type_of_solder_json; ?>');
            var row = JSON.parse('<?php echo $row_json; ?>');
            var key = JSON.parse('<?php echo $key_json; ?>');
            var name = JSON.parse('<?php echo $name_json; ?>');
            var cost = JSON.parse('<?php echo $cost_json; ?>');
            var power = JSON.parse('<?php echo $power_json; ?>');
            var intelligence = JSON.parse('<?php echo $intelligence_json; ?>');
            var period = JSON.parse('<?php echo $period_json; ?>');
            $('.deck_list_area').append('<li class=\"deck_general_'+row+' deck_list\">'+
            '<img alt=\"image\" src=\"img/flont_ ('+row+').jpg\" class=\"deck_list_image\">'+
            '<div class=\"deck_main_area\">'+
                '<div class=\"deck_top_area\">'+
                '<div class=\"deck_period_area\">'+
                    '<p>'+period+'</p>'+
                '</div>'+
                    '<div class="deck_info_area">'+
                    '<div class=\"deck_feature\">'+
                        '<div class=\"deck_type_of_solder\">'+
                            '<img class=\"deck_solder_icon\" alt=\"type_of_solder\" src=\"img/type_of_solder/'+type_of_solder+'.png\">'+
                        '</div>'+//兵種終わり
                        '<div class=\"deck_special_skill_icon\">'+
                        '<?php 
                            if(!empty($value['special_skill_none'])) {
                                echo '<p class=\"deck_special_skill_none\">特技なし</p>';
                            }
                        ?>'+
                        '<?php 
                            if(!empty($value['special_skill_ambush'])) {
                                echo '<p class=\"deck_special_skill_on\">伏</p>';
                            }
                            ?>'+
                        '<?php 
                            if(!empty($value['special_skill_guardrail'])) {
                                echo '<p class=\"deck_special_skill_on\">柵</p>';
                            }
                            ?>'+
                        '<?php 
                            if(!empty($value['special_skill_revival'])) {
                                echo '<p class=\"deck_special_skill_on\">活</p>';
                            }
                            ?>'+
                        '<?php 
                            if(!empty($value['special_skill_tolerance'])) {
                                echo '<p class=\"deck_special_skill_on\">忍</p>';
                            }
                            ?>'+
                        '<?php 
                            if(!empty($value['special_skill_fighting_spirit'])) {
                                echo '<p class=\"deck_special_skill_on\">気</p>';
                            }
                            ?>'+
                        '<?php 
                            if(!empty($value['special_skill_sniping'])) {
                                echo '<p class=\"deck_special_skill_on\">狙</p>';
                            }
                            ?>'+
                        '<?php 
                            if(!empty($value['special_skill_enhancement'])) {
                                echo '<p class=\"deck_special_skill_on\">昂</p>';
                            }
                            ?>'+
                        '<?php 
                            if(!empty($value['special_skill_technique'])) {
                                echo '<p class=\"deck_special_skill_on\">技</p>';
                            }
                            ?>'+
                        '<?php
                            if(!empty($value['special_skill_vanguard'])) {
                                echo '<p class=\"deck_special_skill_on\">先</p>';
                            }
                            ?>'+
                        '<?php 
                            if(!empty($value['special_skill_ogre'])) {
                                echo '<p class=\"deck_special_skill_on\">鬼</p>';
                            }
                            ?>'+
                            '</div>'+//特技終わり
                    '</div>'+//feature終わり
                    '<div class=\"deck_general_name\">'+
                        '<p>'+name+'</p>'+
                    '</div>'+//name終わり
                    '</div>'+//deck_info終わり
                '</div>'+//deck_top終わり
                '<div class=\"clear_left\"></div>'+
                '<div class=\"deck_cost_area\">'+
                            '<img alt=\"deck_cost\" src=\"img/cost/'+cost+'.png\" class=\"deck_cost_icon\">'+
                '</div>'+//コスト終わり
                '<div class=\"deck_param_area\">'+
                            '<p class=\"deck_power\">'+power+'</p>'+
                            '<p class=\"deck_intelligence\">'+intelligence+'</p>'+
                '</div>'+//deck_param終わり
                '<div class=\"move_btn_area\">'+
                '</div>'+//矢印エリア終わり
                '<div class=\"remove_btn_area\">'+
                    '<a class=\"deck_remove\" href=\"deck_val_remove.php?generalId='+row+'\">外す</a>'+
                '</div>'+//削除エリア終わり
            '</li>');
        }
            create_deckList_right();
    </script>
    <?php
    } else {//両矢印表示
        $sql=$pdo->prepare('select * from general where id=?');
        $sql->execute([$row]);
        $value=$sql->fetch(PDO::FETCH_ASSOC);
        $type_of_solder_json = json_encode($value['type_of_solder']);
        $name_json = json_encode($value['name']);
        $cost_json = json_encode($value['cost']);
        $power_json = json_encode($value['power']);
        $intelligence_json = json_encode($value['intelligence']);
        $period_json = json_encode($value['period']);
        $row_json = json_encode($row);
        $key_json = json_encode($key);
        ?>
        <script>
            function create_deckList_right() {
                var type_of_solder = JSON.parse('<?php echo $type_of_solder_json; ?>');
                var row = JSON.parse('<?php echo $row_json; ?>');
                var key = JSON.parse('<?php echo $key_json; ?>');
                var name = JSON.parse('<?php echo $name_json; ?>');
                var cost = JSON.parse('<?php echo $cost_json; ?>');
                var power = JSON.parse('<?php echo $power_json; ?>');
                var intelligence = JSON.parse('<?php echo $intelligence_json; ?>');
                var period = JSON.parse('<?php echo $period_json; ?>');
                $('.deck_list_area').append('<li class=\"deck_general_'+row+' deck_list\">'+
                '<img alt=\"image\" src=\"img/flont_ ('+row+').jpg\" class=\"deck_list_image\">'+
                '<div class=\"deck_main_area\">'+
                    '<div class=\"deck_top_area\">'+
                    '<div class=\"deck_period_area\">'+
                        '<p>'+period+'</p>'+
                    '</div>'+
                    '<div class="deck_info_area">'+
                        '<div class=\"deck_feature\">'+
                            '<div class=\"deck_type_of_solder\">'+
                                '<img class=\"deck_solder_icon\" alt=\"type_of_solder\" src=\"img/type_of_solder/'+type_of_solder+'.png\">'+
                            '</div>'+//兵種終わり
                            '<div class=\"deck_special_skill_icon\">'+
                            '<?php 
                                if(!empty($value['special_skill_none'])) {
                                    echo '<p class=\"deck_special_skill_none\">特技なし</p>';
                                }
                            ?>'+
                            '<?php 
                                if(!empty($value['special_skill_ambush'])) {
                                    echo '<p class=\"deck_special_skill_on\">伏</p>';
                                }
                                ?>'+
                            '<?php 
                                if(!empty($value['special_skill_guardrail'])) {
                                    echo '<p class=\"deck_special_skill_on\">柵</p>';
                                }
                                ?>'+
                            '<?php 
                                if(!empty($value['special_skill_revival'])) {
                                    echo '<p class=\"deck_special_skill_on\">活</p>';
                                }
                                ?>'+
                            '<?php 
                                if(!empty($value['special_skill_tolerance'])) {
                                    echo '<p class=\"deck_special_skill_on\">忍</p>';
                                }
                                ?>'+
                            '<?php 
                                if(!empty($value['special_skill_fighting_spirit'])) {
                                    echo '<p class=\"deck_special_skill_on\">気</p>';
                                }
                                ?>'+
                            '<?php 
                                if(!empty($value['special_skill_sniping'])) {
                                    echo '<p class=\"deck_special_skill_on\">狙</p>';
                                }
                                ?>'+
                            '<?php 
                                if(!empty($value['special_skill_enhancement'])) {
                                    echo '<p class=\"deck_special_skill_on\">昂</p>';
                                }
                                ?>'+
                            '<?php 
                                if(!empty($value['special_skill_technique'])) {
                                    echo '<p class=\"deck_special_skill_on\">技</p>';
                                }
                                ?>'+
                            '<?php
                                if(!empty($value['special_skill_vanguard'])) {
                                    echo '<p class=\"deck_special_skill_on\">先</p>';
                                }
                                ?>'+
                            '<?php 
                                if(!empty($value['special_skill_ogre'])) {
                                    echo '<p class=\"deck_special_skill_on\">鬼</p>';
                                }
                                ?>'+
                                '</div>'+
                        '</div>'+//feature終わり
                        '<div class=\"deck_general_name\">'+
                            '<p>'+name+'</p>'+
                        '</div>'+//name終わり
                        '</div>'+//deck_info終わり
                    '</div>'+//deck_top終わり
                    '<div class=\"clear_left\"></div>'+
                    '<div class=\"deck_cost_area\">'+
                                '<img alt=\"deck_cost\" src=\"img/cost/'+cost+'.png\" class=\"deck_cost_icon\">'+
                    '</div>'+//コスト終わり
                    '<div class=\"deck_param_area\">'+
                                '<p class=\"deck_power\">'+power+'</p>'+
                                '<p class=\"deck_intelligence\">'+intelligence+'</p>'+
                    '</div>'+//deck_param終わり
                    '<div class=\"move_btn_area\">'+
                        '<button class=\"left_btn\" type=\"button\" onclick=\"submitByLeftBtn('+key+');\">←</button>'+
                        '<button class=\"right_btn\" type=\"button\" onclick=\"submitByRightBtn('+key+');\">→</button>'+
                    '</div>'+//矢印エリア終わり
                    '<div class=\"remove_btn_area\">'+
                        '<a class=\"deck_remove\" href=\"deck_val_remove.php?generalId='+row+'\">外す</a>'+
                    '</div>'+//削除エリア終わり
                '</li>');
            }
                create_deckList_right();
        </script>
    <?php
        }
}
?>

<script>
    function submitByLeftBtn(index){
        const btnDirectionLeft = 'left';
        $("input[name='clicked_card_index']").val(index);
        $("input[name='clicked_btn_direction']").val(btnDirectionLeft);
        $("#hidden_submit").click();

    }

    function submitByRightBtn(index){
        const btnDirectionLeft = 'right';
        $("input[name='clicked_card_index']").val(index);
        $("input[name='clicked_btn_direction']").val(btnDirectionLeft);
        $("#hidden_submit").click();

    }
</script>

