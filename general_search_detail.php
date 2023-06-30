<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=xs344307_eiketsu;charset=utf8',
'xs344307_user', 'password');
$illustrator = $pdo->query('select distinct(illustration) from general order by illustration desc');
$cv = $pdo->query('select distinct(cv) from general order by cv desc');
$fetchIllustrator = $illustrator->fetchAll();
$fetchCv = $cv->fetchAll();
?>

<div class="search_wrapper">
<form class="search_form" action="general_search_insert.php" method="post">
    <div class="search_top_wrapper">
        <div class="sort_select_btn">
            <button class="top_button_1" type="button" onclick="change_sort_display('top_button_1')">基本</button>
            <button class="top_button_2" type="button" onclick="change_sort_display('top_button_2')">詳細</button>
            <button class="top_button_3" type="button" onclick="change_sort_display('top_button_3')">ソート</button>
        </div>
        <div class="select_btn">
                <button class="search_reset" type="button" onclick="location.href='http\://localhost//decksimulator/search_reset.php'">リセット</button>
                <input class="search_decision" type="submit" value="決定">
        </div>
    </div>
    <div class="search_body_wrapper1">
        <div class="search_color">
            <p class="search_color_header">◇勢力</p>
            <div class="search_color_button_area">
                <button class="small_button search_blue" type="button" name="blue" value="blue" onclick="request_and_click_change('blue')">蒼</button>
                <button class="small_button search_red" type="button" name="red" value="red" onclick="request_and_click_change('red')">緋</button>
                <button class="small_button search_green" type="button" name="green" value="green" onclick="request_and_click_change('green')">碧</button>
                <button class="small_button search_gray" type="button" name="gray" value="gray" onclick="request_and_click_change('gray')">玄</button>
                <button class="small_button search_purple" type="button" name="purple" value="purple" onclick="request_and_click_change('purple')">紫</button>
                <button class="small_button search_favorite" type="button" name="favorite" value="favorite"onclick="request_and_click_change('favorite')">★</button>
            </div>
        </div>
        <div class="search_period">
            <p class="search_period_header">◇時代勢力</p>
            <div class="search_period_button_area">
                <button class="big_button period_button" type="button" name="sengoku" value="戦国" onclick="request_and_click_change('sengoku')">戦国</button>
                <button class="big_button period_button" type="button" name="edo" value="江戸・幕末" onclick="request_and_click_change('edo')">江戸・幕末</button>
                <button class="big_button period_button" type="button" name="romanceOfTheThreeKingdoms" value="三国志" onclick="request_and_click_change('romanceOfTheThreeKingdoms')">三国志</button>
                <button class="big_button period_button" type="button" name="peace" value="平安" onclick="request_and_click_change('peace')">平安</button>
                <button class="big_button period_button" type="button" name="springAndAutumn" value="春秋戦国"  onclick="request_and_click_change('springAndAutumn')">春秋戦国</button>
                <button class="big_button period_button" type="button" name="period_special" value="特殊" onclick="request_and_click_change('period_special')">特殊</button>
            </div>
        </div>
        <div class="cost_and_type_of_solder">
            <div class="search_cost">
                <p class="search_cost_header">◇コスト</p>
                <div class="search_cost_button_area">
                    <button class="small_button" type="button" name="cost_one" value="1.0"  onclick="request_and_click_change('cost_one')">1.0</button>
                    <button class="small_button" type="button" name="cost_onePointFive" value="1.5" onclick="request_and_click_change('cost_onePointFive')">1.5</button>
                    <button class="small_button" type="button" name="cost_two" value="2.0" onclick="request_and_click_change('cost_two')">2.0</button>
                    <button class="small_button" type="button" name="cost_twoPointFive" value="2.5"  onclick="request_and_click_change('cost_twoPointFive')">2.5</button>
                    <button class="small_button" type="button" name="cost_three" value="3.0" onclick="request_and_click_change('cost_three')">3.0</button>
                    <button class="small_button" type="button" name="cost_threePointFive" value="3.5" onclick="request_and_click_change('cost_threePointFive')">3.5</button>
                    <button class="small_button" type="button" name="cost_four" value="4.0"  onclick="request_and_click_change('cost_four')">4.0</button>
            </div>
            </div>
            <div class="search_type_of_solder">
                <p class="search__type_of_solder_header">◇兵種</p>
                <div class="search_type_of_solder_button_area">
                    <button class="small_button" type="button" name="cavalry" value="騎兵"  onclick="request_and_click_change('cavalry')">騎</button>
                    <button class="small_button" type="button" name="spearman" value="槍兵" onclick="request_and_click_change('spearman')">槍</button>
                    <button class="small_button" type="button" name="bowman" value="弓兵" onclick="request_and_click_change('bowman')">弓</button>
                    <button class="small_button" type="button" name="masterSwordsman" value="剣豪" onclick="request_and_click_change('masterSwordsman')">剣</button>
                    <button class="small_button" type="button" name="gunSquad" value="鉄砲隊" onclick="request_and_click_change('gunSquad')">鉄</button>
                </div>
            </div>
        </div>
        <div class="special_skill_and_rarity">
            <div class="search_special_skill">
                <div class="special_skill_or_and_wrapper">
                    <p class="search_special_skill_header">◇特技</p>
                    <div class="special_skill_condition_wrapper">
                        <button type="button" class="special_skill_or condition" name="special_skill_or" value="or" onclick="input_and_condition_change('special_skill_or')">OR</button>
                        <button type="button" class="and_button special_skill_and" name="special_skill_and" value="and" onclick="input_and_condition_change('special_skill_and')">AND</button>
                    </div>
                </div>
                <div class="special_skill_button_area">
                    <button class="small_button" type="button" name="special_skill_none" value="特技なし" onclick="request_and_click_change('special_skill_none')">無</button>
                    <button class="small_button" type="button" name="special_skill_ambush" value="伏兵" onclick="request_and_click_change('special_skill_ambush')">伏</button>
                    <button class="small_button" type="button" name="special_skill_guardrail" value="防柵" onclick="request_and_click_change('special_skill_guardrail')">柵</button>
                    <button class="small_button" type="button" name="special_skill_revival" value="復活" onclick="request_and_click_change('special_skill_revival')">活</button>
                    <button class="small_button" type="button" name="special_skill_tolerance" value="忍" onclick="request_and_click_change('special_skill_tolerance')">忍</button>
                    <button class="small_button" type="button" name="special_skill_fighting_spirit" value="気合" onclick="request_and_click_change('special_skill_fighting_spirit')">気</button>
                    <button class="small_button" type="button" name="special_skill_sniping" value="狙撃" onclick="request_and_click_change('special_skill_sniping')">狙</button>
                    <button class="small_button" type="button" name="special_skill_enhancement" value="昂揚" onclick="request_and_click_change('special_skill_enhancement')">昂</button>
                    <button class="small_button" type="button" name="special_skill_technique" value="技巧" onclick="request_and_click_change('special_skill_technique')">技</button>
                    <button class="small_button" type="button" name="special_skill_vanguard" value="先陣" onclick="request_and_click_change('special_skill_vanguard')">先</button>
                    <button class="small_button" type="button" name="special_skill_ogre" value="鬼" onclick="request_and_click_change('special_skill_ogre')">鬼</button>
                </div>
            </div>
            <div class="search_rarity">
                <p class="search_rarity_header">◇レアリティ</p>
                <div class="rarity_button_area">
                <button class="small_button" type="button" name="rarity_normal" value="N" onclick="request_and_click_change('rarity_normal')">N</button>
                <button class="small_button" type="button" name="rare" value="R" onclick="request_and_click_change('rare')">R</button>
                <button class="small_button" type="button" name="super_rare" value="SR" onclick="request_and_click_change('super_rare')">SR</button>
                <button class="small_button" type="button" name="eiketsu_rare" value="ER" onclick="request_and_click_change('eiketsu_rare')">ER</button>
                </div>
            </div>
        </div>
        <div class="search_free_word">
            <p class="search_free_word_header">◇フリーワード検索（検索対象を指定可能）</p>
            <div class="free_word_button_area">
                <button class="big_button" type="button" name="general_name" value="name" onclick="request_and_click_change('general_name')">武将名</button>
                <button class="big_button" type="button" name="general_name_furigana" value="name_furigana" onclick="request_and_click_change('general_name_furigana')">武将名読み</button>
                <button class="big_button" type="button" name="stratagem_name" value="stratagem_name" onclick="request_and_click_change('stratagem_name')">計略名</button>
                <button class="big_button" type="button" name="stratagem_name_furigana" value="stratagem_name_furigana" onclick="request_and_click_change('stratagem_name_furigana')">計略名読み</button>
                <button class="big_button" type="button" name="stratagem_explanation" value="stratagem_explanation" onclick="request_and_click_change('stratagem_explanation')">計略説明</button>
            </div>
            <div class="free_word_text">
                <input type="text" name="free_word_text" placeholder="スペースでOR検索可能です">
            </div>
        </div>
    </div>
    <div class="search_body_wrapper2">
        <div class="search_intelligence_and_power">
            <div class="search_power">
                <p class="search_power_header">武力</p>
                <div class="power_select_area">
                    <div class="power_min">
                        <select name="power_min">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                    <div class="power_max">
                        <select name="power_max">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12" selected>12</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="search_intelligence">
                <p class="search_intelligence_header">知力</p>
                <div class="intelligence_select_area">
                    <div class="intelligence_min">
                        <select name="intelligence_min">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                    <div class="intelligence_max">
                        <select name="intelligence_max">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12" selected>12</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="search_number">
            <p class="search_number_header">◇登場弾</p>
            <div class="number_one">
                <p class="number_one_header">第1弾</p>
                <button class="big_button" type="button" name="number1_1" value="第1弾-1" onclick="request_and_click_change('number1_1')">第1弾-1</button>
                <button class="big_button" type="button" name="number1_2" value="第1弾-2" onclick="request_and_click_change('number1_2')">第1弾-2</button>
                <button class="big_button" type="button" name="number1_others" value='第1弾-ST", "第1弾-EX' onclick="request_and_click_change('number1_others')">その他</button>
            </div>
            <div class="number_two">
                <p class="number_two_header">第2弾</p>
                <button class="big_button" type="button" name="number2_1" value="第2弾-1" onclick="request_and_click_change('number2_1')">第2弾-1</button>
                <button class="big_button" type="button" name="number2_2" value="第2弾-2" onclick="request_and_click_change('number2_2')">第2弾-2</button>
                <button class="big_button" type="button" name="number2_others" value='第2弾-ST", "第2弾-EX' onclick="request_and_click_change('number2_others')">その他</button>
            </div>
        </div>
        <div class="search_appear">
            <p class="search_appear_header">◇カード種別</p>
            <div class="search_appear_button_area">
                <button class="small_button" type="button" name="appear_normal" value='%緋%" or number like "%蒼%" or number like "%碧%" or number like "%玄%" or number like "%紫%' onclick="request_and_click_change('appear_normal')">通常</button>
                <button class="small_button" type="button" name="EX" value="%EX%" onclick="request_and_click_change('EX')">EX</button>
                <button class="small_button" type="button" name="PL" value="%PL%" onclick="request_and_click_change('PL')">PL</button>
                <button class="small_button" type="button" name="ST" value="%ST%" onclick="request_and_click_change('ST')">ST</button>
            </div>
        </div>
        <div class="search_stratagem">
            <div class="stratagem_or_and_wrapper">
                <p class="search_stratagem_category_header">◇計略カテゴリー</p>
                <div class="stratagem_search_condition_wrapper">
                    <button type="button" class="or_button stratagem_category_or" name="stratagem_category_or" value="or" onclick="input_and_condition_change('stratagem_category_or')">OR</button>
                    <button type="button" class="and_button stratagem_category_and" name="stratagem_category_and" value="and" onclick="input_and_condition_change('stratagem_category_and')">AND</button>
                </div>
            </div>
            <div class="stratagem_button_area">
                <button class="big_button" type="button" name="reinforce" value="%強化%" onclick="request_and_click_change('reinforce')">強化</button>
                <button class="big_button" type="button" name="overall_reinforcement" value="%全体強化%" onclick="request_and_click_change('overall_reinforcement')">全体強化</button>
                <button class="big_button" type="button" name="recovery" value="%回復%" onclick="request_and_click_change('recovery')">回復</button>
                <button class="big_button" type="button" name="return" value="%復活%" onclick="request_and_click_change('return')">復活</button>
                <button class="big_button" type="button" name="interference" value="%妨害%" onclick="request_and_click_change('interference')">妨害</button>
                <button class="big_button" type="button" name="damage" value="%ダメージ%" onclick="request_and_click_change('damage')">ダメージ</button>
                <button class="big_button" type="button" name="dance" value="%舞い%" onclick="request_and_click_change('dance')">舞い</button>
                <button class="big_button" type="button" name="counteragent" value="%反計%" onclick="request_and_click_change('counteragent')">反計</button>
                <button class="big_button" type="button" name="formation" value="%陣形%" onclick="request_and_click_change('formation')">陣形</button>
                <button class="big_button" type="button" name="stash_tactic" value="%ため計略%" onclick="request_and_click_change('stash_tactic')">ため計略</button>
                <button class="big_button" type="button" name="whole_body" value="%渾身%" onclick="request_and_click_change('whole_body')">渾身</button>
                <button class="big_button" type="button" name="shikigami" value="%式神%" onclick="request_and_click_change('shikigami')">式神</button>
                <button class="big_button" type="button" name="stratagem_special" value="%特殊%" onclick="request_and_click_change('stratagem_special')">特殊</button>
            </div>
        </div>
        <div class="illustrator_and_cv_wrapper">
            <div class="search_illustrator">
                <p class="search_illustrator_header">◇イラストレーター</p>
                <select name="illustration">
                    <option value="illustration_all">全てのイラストレーター</option>
                    <?php
                    foreach($fetchIllustrator as $row) {
                        echo '<option value="', $row['illustration'], '">', $row['illustration'], '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="search_cv">
                <p class="search_cv_header">◇声優</p>
                <select name="cv">
                    <option value="cv_all">全ての声優</option>
                    <?php
                    foreach($fetchCv as $row) {
                        echo '<option value="', $row['cv'], '">', $row['cv'], '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="search_body_wrapper3">
        <p class="search_sort_header">◇ソート</p>
        <div class="sort_power_intelligence_wrapper">
            <div class="sort_power">
                <p>武力</p>
                <button class="condition_select medium_button" type="button" name="power" value="desc">▼</button>
                <button class="condition_select medium_button" type="button" name="power" value="asc">▲</button>
            </div>
            <div class="sort_intelligence">
                <p>知力</p>
                <button class="condition_select medium_button" type="button" name="intelligence" value="desc">▼</button>
                <button class="condition_select medium_button" type="button" name="intelligence" value="asc">▲</button>
            </div>
        </div>
        <div class="sort_cost_necessary_morale">
            <div class="sort_cost">
                <p>コスト</p>
                <button class="condition_select medium_button" type="button" name="cost" value="desc">▼</button>
                <button class="condition_select medium_button" type="button" name="cost" value="asc">▲</button>
            </div>
            <div class="sort_necessary_morale">
                <p>必要士気</p>
                <button class="condition_select medium_button" type="button" name="necessary_morale" value="desc">▼</button>
                <button class="condition_select medium_button" type="button" name="necessary_morale" value="asc">▲</button>
            </div>
        </div>
        <div class="japanese_order_wrapper">
            <div class="sort_japanese_order">
                <p>50音順</p>
                <button class="condition_select medium_button" type="button" name="name_furigana" value="desc">▼</button>
                <button class="condition_select medium_button" type="button" name="name_furigana" value="asc">▲</button>
            </div>
        </div>
    <ul class="sort_condition_wrapper">

    </ul>
    
    </form>
</div>

<?php
    if(empty($_SESSION['search']['special_skill_condition']) && !(isset($_SESSION['search']['special_skill_condition']))) {//特技のorもandセットされていない=初回
?>
<script>
    special_skill_condition_initial();
</script>
<?php
  }
?>

<?php
    if(empty($_SESSION['search']['stratagem_category_condition']) && !(isset($_SESSION['search']['stratagem_category_condition']))) {//特技のorもandセットされていない=初回
?>
<script>
    stratagem_category_condition_initial();
</script>
<?php
  }
?>

<?php
    if(isset($_SESSION['search']['special_skill_condition']['special_skill_or'])) {
?>
<script>
    special_skill_add_or();
</script>
<?php
  }
?>

<?php
    if(isset($_SESSION['search']['special_skill_condition']['special_skill_and'])) {
?>
<script>
    special_skill_add_and();
</script>
<?php
  }
?>

<?php
    if(isset($_SESSION['search']['stratagem_category_condition']['stratagem_category_or'])) {
?>
<script>
    stratagem_category_add_or();
</script>
<?php
  }
?>

<?php
    if(isset($_SESSION['search']['stratagem_category_condition']['stratagem_category_and'])) {
?>
<script>
    stratagem_category_add_and();
</script>
<?php
  }
?>

<?php
if(!empty($_SESSION['search'])) {//各ボタンにクリッククラスを与える
foreach($_SESSION['search'] as $key=>$row) {
    if(is_array($row)) {//配列である
        foreach($_SESSION['search'][$key] as $child_key=>$child_row) {
            if(!(is_numeric($child_key))) {
                echo 
                "<script>
                    function open_the_page_processing() {
                        $(\"*[name=$child_key]\").addClass('click');
                    }
                open_the_page_processing();
                </script>";
            }
        }
    }else {//配列ではない
        if(!($key == 'illustration') && !($key == 'cv') && !($key == 'power_min') && !($key == 'power_max')
    && !($key == 'intelligence_min') && !($key == 'intelligence_max')) {
        echo 
        "<script>
            function open_the_page_processing() {
                $(\"*[name=$key]\").addClass('click');
            }
        open_the_page_processing();
        </script>";
        }
    }
}}
?>

<?php
if(isset($_SESSION['search']['free_word_text']) && !(empty($_SESSION['search']['free_word_text']))) {//フリーワードがセットされている
    $text_count = count($_SESSION['search']['free_word_text']);
    if($text_count == 1) {
        $free_text = join('', $_SESSION['search']['free_word_text']);
        echo 
        "<script>
            function free_word_val_set() {
                $(\"*[name=free_word_text\").val('$free_text');
            }
        free_word_val_set();
        </script>";
    }else {
        $free_text = join(' ', $_SESSION['search']['free_word_text']);
        echo 
        "<script>
            function free_word_val_set() {
                $(\"*[name=free_word_text\").val('$free_text');
            }
        free_word_val_set();
        </script>";
    }
}
?>

<?php
if(isset($_SESSION['search']['power_max'])) {
    $power_max = $_SESSION['search']['power_max'];
    echo 
    "<script>
        function power_max_val_set() {
            $(\"*[name=power_max\").val($power_max);
        }
    power_max_val_set();
    </script>";
}
?>

<?php
if(isset($_SESSION['search']['power_min'])) {
    $power_min = $_SESSION['search']['power_min'];
    echo 
    "<script>
        function power_min_val_set() {
            $(\"*[name=power_min\").val($power_min);
        }
    power_min_val_set();
    </script>";
}
?>

<?php
if(isset($_SESSION['search']['intelligence_max'])) {
    $intelligence_max = $_SESSION['search']['intelligence_max'];
    echo 
    "<script>
        function intelligence_max_val_set() {
            $(\"*[name=intelligence_max\").val($intelligence_max);
        }
    intelligence_max_val_set();
    </script>";
}
?>

<?php
if(isset($_SESSION['search']['intelligence_min'])) {
    $intelligence_min = $_SESSION['search']['intelligence_min'];
    echo 
    "<script>
        function intelligence_min_val_set() {
            $(\"*[name=intelligence_min\").val($intelligence_min);
        }
    intelligence_min_val_set();
    </script>";
}
?>

<?php
if(isset($_SESSION['search']['illustration'])) {
    if(!($_SESSION['search']['illustration'] == 'illustration_all')) {
        $illustration = $_SESSION['search']['illustration'];
        echo 
        "<script>
            function illustration_val_set() {
                $(\"*[name=illustration\").val('$illustration');
            }
        illustration_val_set();
        </script>";
    }
}
?>

<?php
if(isset($_SESSION['search']['cv'])) {
    if(!($_SESSION['search']['cv'] == 'cv_all')) {
        $cv = $_SESSION['search']['cv'];
        echo 
        "<script>
            function cv_val_set() {
                $(\"*[name=cv\").val('$cv');
            }
        cv_val_set();
        </script>";
    }
}
?>

<?php
if(isset($_SESSION['search']['sort']) && !empty($_SESSION['search']['sort'])) {
    foreach($_SESSION['search']['sort'] as $key=>$row) {
        if(strpos($row,'desc') !== false) {
            if(strpos($row, 'power') !== false) {
                echo
                "<script>
                    function append_list_desc() {
                        $('ul').append('<li class=\"condition_block\">'+
                        '<p class=\"sort_number\">$key</p><p class=\"sort_text\">武力</p>'+
                        '<div class=\"condition_area\"><button type=\"button\" class=\"desc click\">▼</button>'+
                        '<button type=\"button\" class=\"asc\">▲</button></div>'+
                        '<div class=\"condition_move_area\"><button type=\"button\" class=\"change_down\">↓</button><button type=\"button\" class=\"change_up\">↑</button></div>'+
                        '<input type=\"hidden\" name=\"$key\" value=\"power_desc\">'+
                        '<button type=\"button\" class=\"remove\">×</button>'+
                        '</li>');
                    $('.sort_power').find('button[value=\"desc\"]').prop('disabled', true);
                    $('.sort_power').find('button[value=\"asc\"]').prop('disabled', true);
                    var name_1 = $('input[name=\"1\"]').prev().find('button.change_up');
                    if(!$(name_1).is(':disabled')) {
                        $(name_1).prop('disabled', true);
                        $(name_1).prev().prop('disabled', true);
                    }
                    var length = $('li').length;
                    if(length == 2) {
                        var name_2 = $('input[name=\"2\"]').prev().find('button.change_down');
                        $(name_1).prev().prop('disabled', false);
                        $(name_2).prop('disabled', true);
                    }else if(length == 3) {
                        var name_2 = $('input[name=\"2\"]').prev().find('button.change_down');
                        $(name_2).prop('disabled', false);
                        var name_3 = $('input[name=\"3\"]').prev().find('button.change_down');
                        $(name_3).prop('disabled', true);
                    }else if(length == 4) {
                        var name_3 = $('input[name=\"3\"]').prev().find('button.change_down');
                        $(name_3).prop('disabled', false);
                        var name_4 = $('input[name=\"4\"]').prev().find('button.change_down');
                        $(name_4).prop('disabled', true);
                    }else if(length == 5) {
                        var name_4 = $('input[name=\"4\"]').prev().find('button.change_down');
                        $(name_4).prop('disabled', false);
                        var name_5 = $('input[name=\"5\"]').prev().find('button.change_down');
                        $(name_5).prop('disabled', true);
                    }}
                append_list_desc();
                </script>";
            }elseif(strpos($row, 'intelligence') !== false) {
                echo
                "<script>
                    function append_list_desc() {
                        $('ul').append('<li class=\"condition_block\">'+
                        '<p class=\"sort_number\">$key</p><p class=\"sort_text\">知力</p>'+
                        '<div class=\"condition_area\"><button type=\"button\" class=\"desc click\">▼</button>'+
                        '<button type=\"button\" class=\"asc\">▲</button></div>'+
                        '<div class=\"condition_move_area\"><button type=\"button\" class=\"change_down\">↓</button><button type=\"button\" class=\"change_up\">↑</button></div>'+
                        '<input type=\"hidden\" name=\"$key\" value=\"intelligence_desc\">'+
                        '<button type=\"button\" class=\"remove\">×</button>'+
                        '</li>');
                        $('.sort_intelligence').find('button[value=\"desc\"]').prop('disabled', true);
                        $('.sort_intelligence').find('button[value=\"asc\"]').prop('disabled', true);
                        var name_1 = $('input[name=\"1\"]').prev().find('button.change_up');
                        if(!$(name_1).is(':disabled')) {
                            $(name_1).prop('disabled', true);
                            $(name_1).prev().prop('disabled', true);
                        }
                        var length = $('li').length;
                        if(length == 2) {
                            var name_2 = $('input[name=\"2\"]').prev().find('button.change_down');
                            $(name_1).prev().prop('disabled', false);
                            $(name_2).prop('disabled', true);
                        }else if(length == 3) {
                            var name_2 = $('input[name=\"2\"]').prev().find('button.change_down');
                            $(name_2).prop('disabled', false);
                            var name_3 = $('input[name=\"3\"]').prev().find('button.change_down');
                            $(name_3).prop('disabled', true);
                        }else if(length == 4) {
                            var name_3 = $('input[name=\"3\"]').prev().find('button.change_down');
                            $(name_3).prop('disabled', false);
                            var name_4 = $('input[name=\"4\"]').prev().find('button.change_down');
                            $(name_4).prop('disabled', true);
                        }else if(length == 5) {
                            var name_4 = $('input[name=\"4\"]').prev().find('button.change_down');
                            $(name_4).prop('disabled', false);
                            var name_5 = $('input[name=\"5\"]').prev().find('button.change_down');
                            $(name_5).prop('disabled', true);
                        }
                    }
                append_list_desc();
                </script>";
            }elseif(strpos($row, 'cost') !== false) {
                echo
                "<script>
                    function append_list_desc() {
                        $('ul').append('<li class=\"condition_block\">'+
                        '<p class=\"sort_number\">$key</p><p class=\"sort_text\">コスト</p>'+
                        '<div class=\"condition_area\"><button type=\"button\" class=\"desc click\">▼</button>'+
                        '<button type=\"button\" class=\"asc\">▲</button></div>'+
                        '<div class=\"condition_move_area\"><button type=\"button\" class=\"change_down\">↓</button><button type=\"button\" class=\"change_up\">↑</button></div>'+
                        '<input type=\"hidden\" name=\"$key\" value=\"cost_desc\">'+
                        '<button type=\"button\" class=\"remove\">×</button>'+
                        '</li>');
                        $('.sort_cost').find('button[value=\"desc\"]').prop('disabled', true);
                        $('.sort_cost').find('button[value=\"asc\"]').prop('disabled', true);
                        var name_1 = $('input[name=\"1\"]').prev().find('button.change_up');
                        if(!$(name_1).is(':disabled')) {
                            $(name_1).prop('disabled', true);
                            $(name_1).prev().prop('disabled', true);
                        }
                        var length = $('li').length;
                        if(length == 2) {
                            var name_2 = $('input[name=\"2\"]').prev().find('button.change_down');
                            $(name_1).prev().prop('disabled', false);
                            $(name_2).prop('disabled', true);
                        }else if(length == 3) {
                            var name_2 = $('input[name=\"2\"]').prev().find('button.change_down');
                            $(name_2).prop('disabled', false);
                            var name_3 = $('input[name=\"3\"]').prev().find('button.change_down');
                            $(name_3).prop('disabled', true);
                        }else if(length == 4) {
                            var name_3 = $('input[name=\"3\"]').prev().find('button.change_down');
                            $(name_3).prop('disabled', false);
                            var name_4 = $('input[name=\"4\"]').prev().find('button.change_down');
                            $(name_4).prop('disabled', true);
                        }else if(length == 5) {
                            var name_4 = $('input[name=\"4\"]').prev().find('button.change_down');
                            $(name_4).prop('disabled', false);
                            var name_5 = $('input[name=\"5\"]').prev().find('button.change_down');
                            $(name_5).prop('disabled', true);
                        }
                    }
                append_list_desc();
                </script>";
            }elseif(strpos($row, 'necessary_morale') !== false) {
                echo
                "<script>
                    function append_list_desc() {
                        $('ul').append('<li class=\"condition_block\">'+
                        '<p class=\"sort_number\">$key</p><p class=\"sort_text\">必要士気</p>'+
                        '<div class=\"condition_area\"><button type=\"button\" class=\"desc click\">▼</button>'+
                        '<button type=\"button\" class=\"asc\">▲</button></div>'+
                        '<div class=\"condition_move_area\"><button type=\"button\" class=\"change_down\">↓</button><button type=\"button\" class=\"change_up\">↑</button></div>'+
                        '<input type=\"hidden\" name=\"$key\" value=\"necessary_morale_desc\">'+
                        '<button type=\"button\" class=\"remove\">×</button>'+
                        '</li>');
                        $('.sort_necessary_morale').find('button[value=\"desc\"]').prop('disabled', true);
                        $('.sort_necessary_morale').find('button[value=\"asc\"]').prop('disabled', true);
                        var name_1 = $('input[name=\"1\"]').prev().find('button.change_up');
                        if(!$(name_1).is(':disabled')) {
                            $(name_1).prop('disabled', true);
                            $(name_1).prev().prop('disabled', true);
                        }
                        var length = $('li').length;
                        if(length == 2) {
                            var name_2 = $('input[name=\"2\"]').prev().find('button.change_down');
                            $(name_1).prev().prop('disabled', false);
                            $(name_2).prop('disabled', true);
                        }else if(length == 3) {
                            var name_2 = $('input[name=\"2\"]').prev().find('button.change_down');
                            $(name_2).prop('disabled', false);
                            var name_3 = $('input[name=\"3\"]').prev().find('button.change_down');
                            $(name_3).prop('disabled', true);
                        }else if(length == 4) {
                            var name_3 = $('input[name=\"3\"]').prev().find('button.change_down');
                            $(name_3).prop('disabled', false);
                            var name_4 = $('input[name=\"4\"]').prev().find('button.change_down');
                            $(name_4).prop('disabled', true);
                        }else if(length == 5) {
                            var name_4 = $('input[name=\"4\"]').prev().find('button.change_down');
                            $(name_4).prop('disabled', false);
                            var name_5 = $('input[name=\"5\"]').prev().find('button.change_down');
                            $(name_5).prop('disabled', true);
                        }
                    }
                append_list_desc();
                </script>";
            }else {
                echo
                "<script>
                    function append_list_desc() {
                        $('ul').append('<li class=\"condition_block\">'+
                        '<p class=\"sort_number\">$key</p><p class=\"sort_text\">50音順</p>'+
                        '<div class=\"condition_area\"><button type=\"button\" class=\"desc click\">▼</button>'+
                        '<button type=\"button\" class=\"asc\">▲</button></div>'+
                        '<div class=\"condition_move_area\"><button type=\"button\" class=\"change_down\">↓</button><button type=\"button\" class=\"change_up\">↑</button></div>'+
                        '<input type=\"hidden\" name=\"$key\" value=\"name_furigana_desc\">'+
                        '<button type=\"button\" class=\"remove\">×</button>'+
                        '</li>');
                        $('.sort_japanese_order').find('button[value=\"desc\"]').prop('disabled', true);
                        $('.sort_japanese_order').find('button[value=\"asc\"]').prop('disabled', true);
                        var name_1 = $('input[name=\"1\"]').prev().find('button.change_up');
                        if(!$(name_1).is(':disabled')) {
                            $(name_1).prop('disabled', true);
                            $(name_1).prev().prop('disabled', true);
                        }
                        var length = $('li').length;
                        if(length == 2) {
                            var name_2 = $('input[name=\"2\"]').prev().find('button.change_down');
                            $(name_1).prev().prop('disabled', false);
                            $(name_2).prop('disabled', true);
                        }else if(length == 3) {
                            var name_2 = $('input[name=\"2\"]').prev().find('button.change_down');
                            $(name_2).prop('disabled', false);
                            var name_3 = $('input[name=\"3\"]').prev().find('button.change_down');
                            $(name_3).prop('disabled', true);
                        }else if(length == 4) {
                            var name_3 = $('input[name=\"3\"]').prev().find('button.change_down');
                            $(name_3).prop('disabled', false);
                            var name_4 = $('input[name=\"4\"]').prev().find('button.change_down');
                            $(name_4).prop('disabled', true);
                        }else if(length == 5) {
                            var name_4 = $('input[name=\"4\"]').prev().find('button.change_down');
                            $(name_4).prop('disabled', false);
                            var name_5 = $('input[name=\"5\"]').prev().find('button.change_down');
                            $(name_5).prop('disabled', true);
                        }
                    }
                append_list_desc();
                </script>";
            }
        }else {
            if(strpos($row, 'power') !== false) {
                echo
                "<script>
                    function append_list_asc() {
                    $('ul').append('<li class=\"condition_block\">'+
                    '<p class=\"sort_number\">$key</p><p class=\"sort_text\">武力</p>'+
                    '<div class=\"condition_area\"><button type=\"button\" class=\"desc\">▼</button>'+
                    '<button type=\"button\" class=\"asc click\">▲</button></div>'+
                    '<div class=\"condition_move_area\"><button type=\"button\" class=\"change_down\">↓</button><button type=\"button\" class=\"change_up\">↑</button></div>'+
                    '<input type=\"hidden\" name=\"$key\" value=\"necessary_morale_asc\">'+
                    '<button type=\"button\" class=\"remove\">×</button>'+
                    '</li>');
                    $('.sort_power').find('button[value=\"desc\"]').prop('disabled', true);
                    $('.sort_power').find('button[value=\"asc\"]').prop('disabled', true);
                    var name_1 = $('input[name=\"1\"]').prev().find('button.change_up');
                    if(!$(name_1).is(':disabled')) {
                        $(name_1).prop('disabled', true);
                        $(name_1).prev().prop('disabled', true);
                    }
                    var length = $('li').length;
                    if(length == 2) {
                        var name_2 = $('input[name=\"2\"]').prev().find('button.change_down');
                        $(name_1).prev().prop('disabled', false);
                        $(name_2).prop('disabled', true);
                    }else if(length == 3) {
                        var name_2 = $('input[name=\"2\"]').prev().find('button.change_down');
                        $(name_2).prop('disabled', false);
                        var name_3 = $('input[name=\"3\"]').prev().find('button.change_down');
                        $(name_3).prop('disabled', true);
                    }else if(length == 4) {
                        var name_3 = $('input[name=\"3\"]').prev().find('button.change_down');
                        $(name_3).prop('disabled', false);
                        var name_4 = $('input[name=\"4\"]').prev().find('button.change_down');
                        $(name_4).prop('disabled', true);
                    }else if(length == 5) {
                        var name_4 = $('input[name=\"4\"]').prev().find('button.change_down');
                        $(name_4).prop('disabled', false);
                        var name_5 = $('input[name=\"5\"]').prev().find('button.change_down');
                        $(name_5).prop('disabled', true);
                    }
                }
                append_list_asc();
                </script>";
            }elseif(strpos($row, 'intelligence') !== false) {
                echo
                "<script>
                    function append_list_asc() {
                    $('ul').append('<li class=\"condition_block\">'+
                    '<p class=\"sort_number\">$key</p><p class=\"sort_text\">知力</p>'+
                    '<div class=\"condition_area\"><button type=\"button\" class=\"desc\">▼</button>'+
                    '<button type=\"button\" class=\"asc click\">▲</button></div>'+
                    '<div class=\"condition_move_area\"><button type=\"button\" class=\"change_down\">↓</button><button type=\"button\" class=\"change_up\">↑</button></div>'+
                    '<input type=\"hidden\" name=\"$key\" value=\"intelligence_asc\">'+
                    '<button type=\"button\" class=\"remove\">×</button>'+
                    '</li>');
                    $('.sort_intelligence').find('button[value=\"desc\"]').prop('disabled', true);
                    $('.sort_intelligence').find('button[value=\"asc\"]').prop('disabled', true);
                    var name_1 = $('input[name=\"1\"]').prev().find('button.change_up');
                    if(!$(name_1).is(':disabled')) {
                        $(name_1).prop('disabled', true);
                        $(name_1).prev().prop('disabled', true);
                    }
                    var length = $('li').length;
                    if(length == 2) {
                        var name_2 = $('input[name=\"2\"]').prev().find('button.change_down');
                        $(name_1).prev().prop('disabled', false);
                        $(name_2).prop('disabled', true);
                    }else if(length == 3) {
                        var name_2 = $('input[name=\"2\"]').prev().find('button.change_down');
                        $(name_2).prop('disabled', false);
                        var name_3 = $('input[name=\"3\"]').prev().find('button.change_down');
                        $(name_3).prop('disabled', true);
                    }else if(length == 4) {
                        var name_3 = $('input[name=\"3\"]').prev().find('button.change_down');
                        $(name_3).prop('disabled', false);
                        var name_4 = $('input[name=\"4\"]').prev().find('button.change_down');
                        $(name_4).prop('disabled', true);
                    }else if(length == 5) {
                        var name_4 = $('input[name=\"4\"]').prev().find('button.change_down');
                        $(name_4).prop('disabled', false);
                        var name_5 = $('input[name=\"5\"]').prev().find('button.change_down');
                        $(name_5).prop('disabled', true);
                    }
                }
                append_list_asc();
                </script>";
            }elseif(strpos($row, 'cost') !== false) {
                echo
                "<script>
                    function append_list_asc() {
                    $('ul').append('<li class=\"condition_block\">'+
                    '<p class=\"sort_number\">$key</p><p class=\"sort_text\">コスト</p>'+
                    '<div class=\"condition_area\"><button type=\"button\" class=\"desc\">▼</button>'+
                    '<button type=\"button\" class=\"asc click\">▲</button></div>'+
                    '<div class=\"condition_move_area\"><button type=\"button\" class=\"change_down\">↓</button><button type=\"button\" class=\"change_up\">↑</button></div>'+
                    '<input type=\"hidden\" name=\"$key\" value=\"cost_asc\">'+
                    '<button type=\"button\" class=\"remove\">×</button>'+
                    '</li>');
                    $('.sort_cost').find('button[value=\"desc\"]').prop('disabled', true);
                    $('.sort_cost').find('button[value=\"asc\"]').prop('disabled', true);
                    var name_1 = $('input[name=\"1\"]').prev().find('button.change_up');
                    if(!$(name_1).is(':disabled')) {
                        $(name_1).prop('disabled', true);
                        $(name_1).prev().prop('disabled', true);
                    }
                    var length = $('li').length;
                    if(length == 2) {
                        var name_2 = $('input[name=\"2\"]').prev().find('button.change_down');
                        $(name_1).prev().prop('disabled', false);
                        $(name_2).prop('disabled', true);
                    }else if(length == 3) {
                        var name_2 = $('input[name=\"2\"]').prev().find('button.change_down');
                        $(name_2).prop('disabled', false);
                        var name_3 = $('input[name=\"3\"]').prev().find('button.change_down');
                        $(name_3).prop('disabled', true);
                    }else if(length == 4) {
                        var name_3 = $('input[name=\"3\"]').prev().find('button.change_down');
                        $(name_3).prop('disabled', false);
                        var name_4 = $('input[name=\"4\"]').prev().find('button.change_down');
                        $(name_4).prop('disabled', true);
                    }else if(length == 5) {
                        var name_4 = $('input[name=\"4\"]').prev().find('button.change_down');
                        $(name_4).prop('disabled', false);
                        var name_5 = $('input[name=\"5\"]').prev().find('button.change_down');
                        $(name_5).prop('disabled', true);
                    }
                }
                append_list_asc();
                </script>";
            }elseif(strpos($row, 'necessary_morale') !== false) {
                echo
                "<script>
                    function append_list_asc() {
                    $('ul').append('<li class=\"condition_block\">'+
                    '<p class=\"sort_number\">$key</p><p class=\"sort_text\">必要士気</p>'+
                    '<div class=\"condition_area\"><button type=\"button\" class=\"desc\">▼</button>'+
                    '<button type=\"button\" class=\"asc click\">▲</button></div>'+
                    '<div class=\"condition_move_area\"><button type=\"button\" class=\"change_down\">↓</button><button type=\"button\" class=\"change_up\">↑</button></div>'+
                    '<input type=\"hidden\" name=\"$key\" value=\"necessary_morale_asc\">'+
                    '<button type=\"button\" class=\"remove\">×</button>'+
                    '</li>');
                    $('.sort_necessary_morale').find('button[value=\"desc\"]').prop('disabled', true);
                    $('.sort_necessary_morale').find('button[value=\"asc\"]').prop('disabled', true);
                    var name_1 = $('input[name=\"1\"]').prev().find('button.change_up');
                    if(!$(name_1).is(':disabled')) {
                        $(name_1).prop('disabled', true);
                        $(name_1).prev().prop('disabled', true);
                    }
                    var length = $('li').length;
                    if(length == 2) {
                        var name_2 = $('input[name=\"2\"]').prev().find('button.change_down');
                        $(name_1).prev().prop('disabled', false);
                        $(name_2).prop('disabled', true);
                    }else if(length == 3) {
                        var name_2 = $('input[name=\"2\"]').prev().find('button.change_down');
                        $(name_2).prop('disabled', false);
                        var name_3 = $('input[name=\"3\"]').prev().find('button.change_down');
                        $(name_3).prop('disabled', true);
                    }else if(length == 4) {
                        var name_3 = $('input[name=\"3\"]').prev().find('button.change_down');
                        $(name_3).prop('disabled', false);
                        var name_4 = $('input[name=\"4\"]').prev().find('button.change_down');
                        $(name_4).prop('disabled', true);
                    }else if(length == 5) {
                        var name_4 = $('input[name=\"4\"]').prev().find('button.change_down');
                        $(name_4).prop('disabled', false);
                        var name_5 = $('input[name=\"5\"]').prev().find('button.change_down');
                        $(name_5).prop('disabled', true);
                    }
                }
                append_list_asc();
                </script>";
            }else {
                echo
                "<script>
                    function append_list_asc() {
                    $('ul').append('<li class=\"condition_block\">'+
                    '<p class=\"sort_number\">$key</p><p class=\"sort_text\">50音順</p>'+
                    '<div class=\"condition_area\"><button type=\"button\" class=\"desc\">▼</button>'+
                    '<button type=\"button\" class=\"asc click\">▲</button></div>'+
                    '<div class=\"condition_move_area\"><button type=\"button\" class=\"change_down\">↓</button><button type=\"button\" class=\"change_up\">↑</button></div>'+
                    '<input type=\"hidden\" name=\"$key\" value=\"name_furigana_asc\">'+
                    '<button type=\"button\" class=\"remove\">×</button>'+
                    '</li>');
                    $('.sort_japanese_order').find('button[value=\"desc\"]').prop('disabled', true);
                    $('.sort_japanese_order').find('button[value=\"asc\"]').prop('disabled', true);
                    var name_1 = $('input[name=\"1\"]').prev().find('button.change_up');
                    if(!$(name_1).is(':disabled')) {
                        $(name_1).prop('disabled', true);
                        $(name_1).prev().prop('disabled', true);
                    }
                    var length = $('li').length;
                    if(length == 2) {
                        var name_2 = $('input[name=\"2\"]').prev().find('button.change_down');
                        $(name_1).prev().prop('disabled', false);
                        $(name_2).prop('disabled', true);
                    }else if(length == 3) {
                        var name_2 = $('input[name=\"2\"]').prev().find('button.change_down');
                        $(name_2).prop('disabled', false);
                        var name_3 = $('input[name=\"3\"]').prev().find('button.change_down');
                        $(name_3).prop('disabled', true);
                    }else if(length == 4) {
                        var name_3 = $('input[name=\"3\"]').prev().find('button.change_down');
                        $(name_3).prop('disabled', false);
                        var name_4 = $('input[name=\"4\"]').prev().find('button.change_down');
                        $(name_4).prop('disabled', true);
                    }else if(length == 5) {
                        var name_4 = $('input[name=\"4\"]').prev().find('button.change_down');
                        $(name_4).prop('disabled', false);
                        var name_5 = $('input[name=\"5\"]').prev().find('button.change_down');
                        $(name_5).prop('disabled', true);
                    }
                }
                append_list_asc();
                </script>";
            }
        }
    }
}
?>
<script>

window.onload = function() {
    $('.top_button_1').addClass('click');
    $('.search_body_wrapper1').addClass('select_on');
}

    $('body').on('click','.change_up', function() {
        var element =$(this).parent().parent('li');
        var prev_element = $(this).parent().parent('li').prev('li');//クリックしたボタンの親要素(li)の前の兄弟要素
        var name = $(element).find('input').attr('name');//元のname
        var prev_name = $(prev_element).find('input').attr('name');
        var text = $(element).find('.sort_number').text();
        var prev_text = $(prev_element).find('.sort_number').text();
        $(element).after(prev_element);//クリックしたliの後に前のli要素を移動する
        $(element).find('input').attr('name', prev_name);
        $(prev_element).find('input').attr('name', name);
        $(element).find('.sort_number').text(prev_text);
        $(prev_element).find('.sort_number').text(text);
        var li_count = $('li.condition_block').length;
        if(li_count == 2) {
            $('input[name="1"]').parent('li').find('.condition_move_area').find('.change_up').prop('disabled', true);
            $('input[name="2"]').parent('li').find('.condition_move_area').find('.change_up').prop('disabled', false);
            $('input[name="1"]').parent('li').find('.condition_move_area').find('.change_down').prop('disabled', false);
            $('input[name="2"]').parent('li').find('.condition_move_area').find('.change_down').prop('disabled', true);
        } else if(li_count == 3) {
            $('input[name="1"]').parent('li').find('.condition_move_area').find('.change_up').prop('disabled', true);
            $('input[name="1"]').parent('li').find('.condition_move_area').find('.change_down').prop('disabled', false);
            $('input[name="2"]').parent('li').find('.condition_move_area').find('.change_up').prop('disabled', false);
            $('input[name="2"]').parent('li').find('.condition_move_area').find('.change_down').prop('disabled', false);
            $('input[name="3"]').parent('li').find('.condition_move_area').find('.change_down').prop('disabled', true);
            $('input[name="3"]').parent('li').find('.condition_move_area').find('.change_up').prop('disabled', false);
        } else if(li_count == 4) {
            $('input[name="1"]').parent('li').find('.condition_move_area').find('.change_up').prop('disabled', true);
            $('input[name="1"]').parent('li').find('.condition_move_area').find('.change_down').prop('disabled', false);
            $('input[name="2"]').parent('li').find('.condition_move_area').find('.change_up').prop('disabled', false);
            $('input[name="2"]').parent('li').find('.condition_move_area').find('.change_down').prop('disabled', false);
            $('input[name="3"]').parent('li').find('.condition_move_area').find('.change_down').prop('disabled', false);
            $('input[name="3"]').parent('li').find('.condition_move_area').find('.change_up').prop('disabled', false);
            $('input[name="4"]').parent('li').find('.condition_move_area').find('.change_down').prop('disabled', true);
            $('input[name="4"]').parent('li').find('.condition_move_area').find('.change_up').prop('disabled', false);
        } else if(li_count == 5) {
            $('input[name="1"]').parent('li').find('.condition_move_area').find('.change_up').prop('disabled', true);
            $('input[name="1"]').parent('li').find('.condition_move_area').find('.change_down').prop('disabled', false);
            $('input[name="2"]').parent('li').find('.condition_move_area').find('.change_up').prop('disabled', false);
            $('input[name="2"]').parent('li').find('.condition_move_area').find('.change_down').prop('disabled', false);
            $('input[name="3"]').parent('li').find('.condition_move_area').find('.change_down').prop('disabled', false);
            $('input[name="3"]').parent('li').find('.condition_move_area').find('.change_up').prop('disabled', false);
            $('input[name="4"]').parent('li').find('.condition_move_area').find('.change_down').prop('disabled', false);
            $('input[name="4"]').parent('li').find('.condition_move_area').find('.change_up').prop('disabled', false);
            $('input[name="5"]').parent('li').find('.condition_move_area').find('.change_down').prop('disabled', true);
            $('input[name="5"]').parent('li').find('.condition_move_area').find('.change_up').prop('disabled', false);
        }
    });

$('body').on('click','.change_down', function() {
        var element =$(this).parent().parent('li');//クリックしたボタンの親要素(li)
        var next_element = $(this).parent().parent('li').next('li');
        var name = $(element).find('input').attr('name');//元のname
        var next_name = $(next_element).find('input').attr('name');//前のname
        var text = $(element).find('.sort_number').text();
        var next_text = $(next_element).find('.sort_number').text();
        $(element).before(next_element);//クリックしたliの前に後のli要素を移動する
        $(element).find('input').attr('name', next_name);
        $(next_element).find('input').attr('name', name);
        $(element).find('.sort_number').text(next_text);
        $(next_element).find('.sort_number').text(text);
        var li_count = $('li.condition_block').length;
        if(li_count == 2) {
            $('input[name="1"]').parent('li').find('.condition_move_area').find('.change_up').prop('disabled', true);
            $('input[name="2"]').parent('li').find('.condition_move_area').find('.change_up').prop('disabled', false);
            $('input[name="1"]').parent('li').find('.condition_move_area').find('.change_down').prop('disabled', false);
            $('input[name="2"]').parent('li').find('.condition_move_area').find('.change_down').prop('disabled', true);
        } else if(li_count == 3) {
            $('input[name="1"]').parent('li').find('.condition_move_area').find('.change_up').prop('disabled', true);
            $('input[name="1"]').parent('li').find('.condition_move_area').find('.change_down').prop('disabled', false);
            $('input[name="2"]').parent('li').find('.condition_move_area').find('.change_up').prop('disabled', false);
            $('input[name="2"]').parent('li').find('.condition_move_area').find('.change_down').prop('disabled', false);
            $('input[name="3"]').parent('li').find('.condition_move_area').find('.change_down').prop('disabled', true);
            $('input[name="3"]').parent('li').find('.condition_move_area').find('.change_up').prop('disabled', false);
        } else if(li_count == 4) {
            $('input[name="1"]').parent('li').find('.condition_move_area').find('.change_up').prop('disabled', true);
            $('input[name="1"]').parent('li').find('.condition_move_area').find('.change_down').prop('disabled', false);
            $('input[name="2"]').parent('li').find('.condition_move_area').find('.change_up').prop('disabled', false);
            $('input[name="2"]').parent('li').find('.condition_move_area').find('.change_down').prop('disabled', false);
            $('input[name="3"]').parent('li').find('.condition_move_area').find('.change_down').prop('disabled', false);
            $('input[name="3"]').parent('li').find('.condition_move_area').find('.change_up').prop('disabled', false);
            $('input[name="4"]').parent('li').find('.condition_move_area').find('.change_down').prop('disabled', true);
            $('input[name="4"]').parent('li').find('.condition_move_area').find('.change_up').prop('disabled', false);
        } else if(li_count == 5) {
            $('input[name="1"]').parent('li').find('.condition_move_area').find('.change_up').prop('disabled', true);
            $('input[name="1"]').parent('li').find('.condition_move_area').find('.change_down').prop('disabled', false);
            $('input[name="2"]').parent('li').find('.condition_move_area').find('.change_up').prop('disabled', false);
            $('input[name="2"]').parent('li').find('.condition_move_area').find('.change_down').prop('disabled', false);
            $('input[name="3"]').parent('li').find('.condition_move_area').find('.change_down').prop('disabled', false);
            $('input[name="3"]').parent('li').find('.condition_move_area').find('.change_up').prop('disabled', false);
            $('input[name="4"]').parent('li').find('.condition_move_area').find('.change_down').prop('disabled', false);
            $('input[name="4"]').parent('li').find('.condition_move_area').find('.change_up').prop('disabled', false);
            $('input[name="5"]').parent('li').find('.condition_move_area').find('.change_down').prop('disabled', true);
            $('input[name="5"]').parent('li').find('.condition_move_area').find('.change_up').prop('disabled', false);
        }
    }); 

    $('body').on('click','.desc', function() {
        var parent = $(this).parent('div');//クリックした要素の親要素を取得
        var input =$(parent).next().next().val();//親要素の兄弟のinputのvalueを取得
        $(this).next().removeClass('click');
        $(this).addClass('click');
        //valueの変更
        if(input.match("power")) {
            $(parent).next().next().val('power_desc');
        }else if(input.match("intelligence")) {
            $(parent).next().next().val('intelligence_desc');
        }else if(input.match("cost")) {
            $(parent).next().next().val('cost_asc');
        }else if(input.match("necessary_morale")) {
            $(parent).next().next().val('necessary_morale_desc');
        }else {
            $(parent).next().next().val('name_furigana_desc');
        }
    });

    $('body').on('click','.asc', function() {
        var parent = $(this).parent('div');//クリックした要素の親要素を取得
        var input =$(parent).next().next().val();//親要素の兄弟のinputのvalueを取得
        $(this).prev().removeClass('click');
        $(this).addClass('click');
        //valueの変更
        if(input.match("power")) {
            $(parent).next().next().val('power_asc');
        }else if(input.match("intelligence")) {
            $(parent).next().next().val('intelligence_asc');
        }else if(input.match("cost")) {
            $(parent).next().next().val('cost_asc');
        }else if(input.match("necessary_morale")) {
            $(parent).next().next().val('necessary_morale_asc');
        }else {
            $(parent).next().next().val('name_furigana_asc');
        }
    });

    $('body').on('click','.remove', function() {
        var parent = $(this).parent('li');//親要素の取得
        var category = $(this).prev().val();//inputのvalueからカテゴリの取得
        var name = $(parent).find('input').attr('name');
        if(name == 1) {
            if($('input[name="2"]').length) {
                var text_1 = $('input[name="1"]').parent('li').find('.sort_number').text();
                $('input[name="2"]').parent('li').find('.sort_number').text(text_1);
                $('input[name="2"]').attr('name', '1');
            }
            if($('input[name="3"]').length) {
                var text_2 = $('input[name="2"]').parent('li').find('.sort_number').text();
                $('input[name="3"]').parent('li').find('.sort_number').text(text_2);
                $('input[name="3"]').attr('name', '2');
            }
            if($('input[name="4"]').length) {
                var text_3 = $('input[name="3"]').parent('li').find('.sort_number').text();
                $('input[name="4"]').parent('li').find('.sort_number').text(text_3);
                $('input[name="4"]').attr('name', '3');
            }
            if($('input[name="5"]').length) {
                var text_4 = $('input[name="4"]').parent('li').find('.sort_number').text();
                $('input[name="5"]').parent('li').find('.sort_number').text(text_4);
                $('input[name="5"]').attr('name', '4');
            }
        } else if(name == 2) {
            if($('input[name="3"]').length) {
                var text_2 = $('input[name="2"]').parent('li').find('.sort_number').text();
                $('input[name="3"]').parent('li').find('.sort_number').text(text_2);
                $('input[name="3"]').attr('name', '2');
            }
            if($('input[name="4"]').length) {
                var text_3 = $('input[name="3"]').parent('li').find('.sort_number').text();
                $('input[name="4"]').parent('li').find('.sort_number').text(text_3);
                $('input[name="4"]').attr('name', '3');
            }
            if($('input[name="5"]').length) {
                var text_4 = $('input[name="4"]').parent('li').find('.sort_number').text();
                $('input[name="5"]').parent('li').find('.sort_number').text(text_4);
                $('input[name="5"]').attr('name', '4');
            }
        } else if(name == 3) {
            if($('input[name="4"]').length) {
                var text_3 = $('input[name="3"]').parent('li').find('.sort_number').text();
                $('input[name="4"]').parent('li').find('.sort_number').text(text_3);
                $('input[name="4"]').attr('name', '3');
            }
            if($('input[name="5"]').length) {
                var text_4 = $('input[name="4"]').parent('li').find('.sort_number').text();//コンテンツの取得
                $('input[name="5"]').parent('li').find('.sort_number').text(text_4);
                $('input[name="5"]').attr('name', '4');
            }
        } else if(name == 4) {//4番を閉じる
            if($('input[name="5"]').length) {
                var text_4 = $(this).parent('li').find('.sort_number').text();//コンテンツの取得
                $('input[name="5"]').parent('li').find('.sort_number').text(text_4);
                $('input[name="5"]').attr('name', '4');
            }
        }
        $(parent).remove();//liの削除
        if(category.match('power')) {
            $('button[name="power"]').prop('disabled', false);
        }else if(category.match('intelligence')) {
            $('button[name="intelligence"]').prop('disabled', false);
        }else if(category.match('cost')) {
            $('button[name="cost"]').prop('disabled', false);
        }else if(category.match('necessary_morale')) {
            $('button[name="necessary_morale"]').prop('disabled', false);
        }else {
            $('button[name="name_furigana"]').prop('disabled', false);
        }
    });

</script>
<?php
require 'footer.php';
?>