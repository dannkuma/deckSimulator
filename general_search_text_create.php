<?php session_start(); ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=eiketsu;charset=utf8',
'dannk', 'password');
if(isset($_SESSION['search']['color']) && !(empty($_SESSION['search']['color']))) {
    foreach($_SESSION['search']['color'] as $row) {
        $search_color_array[] = '"'. $row.'"';
    }
    $search_color_join = join(', ', $search_color_array);
    $search_color_text = '(color in('.$search_color_join. '))';
    $search_text_array[] = $search_color_text;
}

if(isset($_SESSION['search']['period']) && !(empty($_SESSION['search']['period']))) {//時代
    foreach($_SESSION['search']['period'] as $row) {
        $search_period_array[] = '"'. $row.'"';
    }
    $search_period_join = join(', ', $search_period_array);
    $search_period_text = '(period in('.$search_period_join. '))';
    $search_text_array[] = $search_period_text;
}

if(isset($_SESSION['search']['cost']) && !(empty($_SESSION['search']['cost']))) {//コスト
    foreach($_SESSION['search']['cost'] as $row) {
        $search_cost_array[] = '"'. $row. '"';
    }
    $search_cost_join = join(', ', $search_cost_array);
    $search_cost_text = '(cost in('. $search_cost_join. '))';
    $search_text_array[] = $search_cost_text;
}

if(isset($_SESSION['search']['type_of_solder']) && !(empty($_SESSION['search']['type_of_solder']))) {//兵種
    foreach($_SESSION['search']['type_of_solder'] as $row) {
        $search_type_of_solder_array[] = '"'. $row. '"';
    }
    $search_type_of_solder_join = join(', ', $search_type_of_solder_array);
    $search_type_of_solder_text ='(type_of_solder in('. $search_type_of_solder_join. '))';
    $search_text_array[] = $search_type_of_solder_text;
}


if(isset($_SESSION['search']['special_skill']) && !(empty($_SESSION['search']['special_skill']))) {//特技
    $search_special_skill_condition=[];
    if(isset($_SESSION['search']['special_skill_condition']['special_skill_or']) && !empty($_SESSION['search']['special_skill_condition']['special_skill_or'])) {
        foreach($_SESSION['search']['special_skill'] as $key=>$row) {
            $search_special_skill_array[] = '('. $key. '="'. $row. '")';
        }
        $search_special_skill_text = join(' or ', $search_special_skill_array);
    } else {
        foreach($_SESSION['search']['special_skill'] as $key=> $row) {
            $search_special_skill_array[] = '('. $key. '="'. $row. '")';
        }
        $search_special_skill_text = join(' and ', $search_special_skill_array);
    }
    $search_text_array[] = $search_special_skill_text;
}

if(isset($_SESSION['search']['rarity']) && !(empty($_SESSION['search']['rarity']))) {//レアリティ
    foreach($_SESSION['search']['rarity'] as $row) {
        $search_rarity_array[] = '"'. $row. '"';
    }
    $search_rarity_join = join(', ', $search_rarity_array);
    $search_rarity_text = '(rarity in('. $search_rarity_join. '))';
    $search_text_array[] = $search_rarity_text;
}

if(isset($_SESSION['search']['free_word_category']) && !(empty($_SESSION['search']['free_word_category']))
    &&isset($_SESSION['search']['free_word_text']) && !(empty($_SESSION['search']['free_word_text']))) {//フリーワード検索
        $search_free_word_condition=[];
        $count = count($_SESSION['search']['free_word_text']);
        if(isset($_SESSION['search']['free_word_category']['general_name']) || !(empty($_SESSION['search']['free_word_category']['general_name']))) {
            for($i = 1; $i <= $count; $i++) {
                $search_free_word_condition[] = 'name like :word'.$i;
            }
        }
        if(isset($_SESSION['search']['free_word_category']['general_name_furigana']) || !(empty($_SESSION['search']['free_word_category']['general_name_furigana']))) {
            for($i = 1; $i <= $count; $i++) {
                $search_free_word_condition[] = 'name_furigana like :word'.$i;
            }
        }
        if(isset($_SESSION['search']['free_word_category']['stratagem_name']) || !(empty($_SESSION['search']['free_word_category']['stratagem_name']))) {
            for($i = 1; $i <= $count; $i++) {
                $search_free_word_condition[] = 'stratagem_name like :word'.$i;
            }
        }
        if(isset($_SESSION['search']['free_word_category']['stratagem_name_furigana']) || !(empty($_SESSION['search']['free_word_category']['stratagem_name_furigana']))) {
            for($i = 1; $i <= $count; $i++) {
                $search_free_word_condition[] = 'stratagem_name_furigana like :word'.$i;
            }
        }
        if(isset($_SESSION['search']['free_word_category']['stratagem_explanation']) || !(empty($_SESSION['search']['free_word_category']['stratagem_explanation']))) {
            for($i = 1; $i <= $count; $i++) {
                $search_free_word_condition[] = 'stratagem_explanation like :word'.$i;
            }
        }
        $search_free_word_join = join(' or ', $search_free_word_condition);
        $search_free_word_text = '('. $search_free_word_join. ')';
        $search_text_array[] = $search_free_word_text;
}

if(isset($_SESSION['search']['power_min']) && !(empty($_SESSION['search']['power_min'])) && isset($_SESSION['search']['power_max']) && !(empty($_SESSION['search']['power_max']))) {
    if(is_array($_SESSION['search']['power_min']) && is_array($_SESSION['search']['power_max'])) {
        $power_min_implode = implode("", $_SESSION['search']['power_min']);
        $power_max_implode = implode("", $_SESSION['search']['power_max']);
        $search_power_between_text = '(power between '. $power_min_implode. ' and '. $power_max_implode. ')';
    }else {
        $search_power_between_text = '(power between '. $_SESSION['search']['power_min']. ' and '. $_SESSION['search']['power_max']. ')';
    }
    $search_text_array[] = $search_power_between_text;
}

if(isset($_SESSION['search']['intelligence_min']) && !(empty($_SESSION['search']['intelligence_min'])) && isset($_SESSION['search']['intelligence_max']) && !(empty($_SESSION['search']['intelligence_max']))) {
    if(is_array($_SESSION['search']['intelligence_min']) && is_array($_SESSION['search']['intelligence_max'])) {
        $intelligence_min_implode = implode("", $_SESSION['search']['intelligence_min']);
        $intelligence_max_implode = implode("", $_SESSION['search']['intelligence_max']);
        $search_intelligence_between_text = '(intelligence between '. $intelligence_min_implode. ' and '. $intelligence_max_implode. ')';
    }else {
        $search_intelligence_between_text = '(intelligence between '. $_SESSION['search']['intelligence_min']. ' and '. $_SESSION['search']['intelligence_max']. ')';
    }
    $search_text_array[] = $search_intelligence_between_text;
}

if(isset($_SESSION['search']['number']) && !(empty($_SESSION['search']['number']))) {
    foreach($_SESSION['search']['number'] as $row) {
        $search_number_array[] = '"'. $row. '"';
    }
    $search_number_join = join(', ', $search_number_array);
    $search_number_text = '(appear in('. $search_number_join. '))';
    $search_text_array[] = $search_number_text;
}

if(isset($_SESSION['search']['appear']) && !(empty($_SESSION['search']['appear']))) {
    foreach($_SESSION['search']['appear'] as $row) {
        $search_appear_tentative[] = 'number like '. '"'.$row.'"';
    }
    $search_appear_join = join(' or ', $search_appear_tentative);
    $search_appear_text = '('. $search_appear_join. ')';
    $search_text_array[] = $search_appear_text;
}

if(isset($_SESSION['search']['stratagem_category']) && !(empty($_SESSION['search']['stratagem_category']))) {//特技
    $search_stratagem_category_condition=[];
    if(isset($_SESSION['search']['stratagem_category_condition']['stratagem_category_or']) && !(empty($_SESSION['search']['stratagem_category_condition']['stratagem_category_or']))) {//orの時
        foreach($_SESSION['search']['stratagem_category'] as $row) {
            $search_stratagem_category_condition[] = 'stratagem_category like '. '"'. $row. '"';
        }
        $search_stratagem_category_join = join(' or ', $search_stratagem_category_condition); 
        $search_stratagem_category_text = '('. $search_stratagem_category_join. ')';
    } else {//andの時
        foreach($_SESSION['search']['stratagem_category'] as $row) {
            $search_stratagem_category_condition[] = 'stratagem_category like '. '"'. $row. '"';
        }
        $search_stratagem_category_join = join(' and ', $search_stratagem_category_condition);
        $search_stratagem_category_text = '('. $search_stratagem_category_join. ')';
    }
    $search_text_array[] = $search_stratagem_category_text;
}

if(isset($_SESSION['search']['illustration']) && !($_SESSION['search']['illustration'] == 'illustration_all')) {
    $search_illustration_text = '(illustration="'. $_SESSION['search']['illustration']. '")';
    $search_text_array[] = $search_illustration_text;
}

if(isset($_SESSION['search']['cv']) && !($_SESSION['search']['cv'] == 'cv_all')) {
    $search_cv_text = '(cv="'. $_SESSION['search']['cv']. '")';
    $search_text_array[] = $search_cv_text;
}

if(isset($_SESSION['search']['sort']) && !empty($_SESSION['search']['sort'])) {
    ksort($_SESSION['search']['sort']);
    foreach($_SESSION['search']['sort'] as $row) {
        if(strpos($row,'desc') !== false){
            if(strpos($row,'power') !== false) {
                $search_sort_array[] = 'power desc';
            }elseif(strpos($row,'intelligence') !== false) {
                $search_sort_array[] = 'intelligence desc';
            }elseif(strpos($row,'cost') !== false) {
                $search_sort_array[] = 'cost desc';
            }elseif(strpos($row,'necessary_morale') !== false) {
                $search_sort_array[] = 'necessary_morale desc';
            }else {
                $search_sort_array[] = 'name_furigana desc';
            }
        }else {
            if(strpos($row,'power') !== false) {
                $search_sort_array[] = 'power asc';
            }elseif(strpos($row,'intelligence') !== false) {
                $search_sort_array[] = 'intelligence asc';
            }elseif(strpos($row,'cost') !== false) {
                $search_sort_array[] = 'cost asc';
            }elseif(strpos($row,'necessary_morale') !== false) {
                $search_sort_array[] = 'necessary_morale asc';
            }else {
                $search_sort_array[] = 'name_furigana asc';
            }
        }
    }
    $search_sort_join = join(', ', $search_sort_array);
    $search_sort_text = 'order by '. $search_sort_join;
}
if(!(empty($search_text_array))) {
    $search_text_join = join(' and ', $search_text_array);
    unset($_SESSION['search_text']);
}

    if(!(isset($_SESSION['search']['favorite'])) && isset($search_text_join) && !(isset($search_sort_text))) {//その他のみok
        $_SESSION['search_text'] = 'select * from general where '. $search_text_join. ' order by id asc';
    }elseif(isset($_SESSION['search']['favorite']) && isset($search_text_join) && isset($search_sort_text)) {//全選択
        $text_sql = 'select general_id from favorite';
        $sql_count = $pdo->query($text_sql);
        if(isset($_SESSION['user']['id']) && !($sql_count->rowCount() == 0)) {//ログイン済みで武将が登録されているok
            $_SESSION['search_text'] = 'select * from favorite, general where user_id="'. $_SESSION['user']['id']. '" and general_id=id and '. $search_text_join. ' '. $search_sort_text. ', id asc';
        }else {//ログインしていない、または武将が登録されていない、または両方
            $_SESSION['search_text'] = 'select * from general where '. $search_text_join. ' '. $search_sort_text. ', id asc';
        }
    }elseif(isset($_SESSION['search']['favorite']) && isset($search_text_join)) {//お気に入り、その他
        $text_sql = 'select general_id from favorite';
        $sql_count = $pdo->query($text_sql);
        if(isset($_SESSION['user']['id']) && !($sql_count->rowCount() == 0))  {//ログイン済みで武将が登録されている
            $_SESSION['search_text'] = 'select * from favorite, general where user_id="'. $_SESSION['user']['id']. '" and general_id=id and '. $search_text_join. ' order by id asc';
        }else {//ログインしていない、または武将が登録されていない、または両方
            $_SESSION['search_text'] = 'select * from general where '. $search_text_join. 'order by id asc';
        }
    }elseif(isset($search_sort_text) && isset($search_text_join)) {//その他、ソート
        $_SESSION['search_text'] = 'select * from general where '. $search_text_join. ' '. $search_sort_text. ', id asc';
    }elseif(isset($_SESSION['search']['favorite']) && !isset($search_text_join)) {
        $_SESSION['search_text'] = 'select general_id from favorite';
    }

    header('Location:https://dannkmamemame.com/general_search_output.php');
exit();
?>