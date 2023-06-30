<?php session_start(); ?>
<?php
foreach($_REQUEST as $key=>$row) {
    if($key == 'blue'|| $key =='red'|| $key =='green'|| $key =='gray'|| $key =='purple') {
        if(isset($_SESSION['search']['color'][$key])) {
            unset($_SESSION['search']['color'][$key]);
        } else {
            $_SESSION['search']['color'][$key] = $_REQUEST[$key];
        }
    }elseif($key == 'favorite') {
        if(isset($_SESSION['search'][$key])) {
            unset($_SESSION['search'][$key]);
        } else {
            $_SESSION['search'][$key] = $_REQUEST[$key];
        }
    }elseif($key == 'sengoku'|| $key =='edo'|| $key =='romanceOfTheThreeKingdoms'|| $key =='peace'|| $key =='springAndAutumn'|| $key =='period_special') {
        if(isset($_SESSION['search']['period'][$key])) {
            unset($_SESSION['search']['period'][$key]);
        } else {
            $_SESSION['search']['period'][$key] = $_REQUEST[$key];
        }
    }elseif($key == 'cost_one'|| $key =='cost_onePointFive'|| $key =='cost_two'|| $key =='cost_twoPointFive'|| $key =='cost_three'|| $key =='cost_threePointFive'|| $key =='cost_four') {
        if(isset($_SESSION['search']['cost'][$key])) {
            unset($_SESSION['search']['cost'][$key]);
        } else {
            $_SESSION['search']['cost'][$key] = $_REQUEST[$key];
        }
    }elseif($key =='cavalry'|| $key =='spearman'|| $key =='bowman'|| $key =='masterSwordsman'|| $key =='gunSquad') {
        if(isset($_SESSION['search']['type_of_solder'][$key])) {
            unset($_SESSION['search']['type_of_solder'][$key]);
        } else {
            $_SESSION['search']['type_of_solder'][$key] = $_REQUEST[$key];
        }
    }elseif($key =='special_skill_none'|| $key =='special_skill_ambush'|| $key =='special_skill_guardrail'|| $key =='special_skill_revival'|| $key =='special_skill_tolerance'|| $key =='special_skill_fighting_spirit'||
    $key =='special_skill_sniping'|| $key =='special_skill_enhancement'|| $key =='special_skill_technique'|| $key =='special_skill_vanguard'|| $key =='special_skill_ogre') {
        if(isset($_SESSION['search']['special_skill'][$key])) {
            unset($_SESSION['search']['special_skill'][$key]);
        } else {
            $_SESSION['search']['special_skill'][$key] = $_REQUEST[$key];
        }
    }elseif($key =='special_skill_and') {
        unset($_SESSION['search']['special_skill_condition']['special_skill_or']);
        $_SESSION['search']['special_skill_condition'][$key] = $row;
    }elseif($key == 'special_skill_or') {
        unset($_SESSION['search']['special_skill_condition']['special_skill_and']);
        $_SESSION['search']['special_skill_condition'][$key] = $row;
    }elseif($key =='rarity_normal'|| $key =='rare'|| $key =='super_rare'|| $key =='eiketsu_rare') {
        if(isset($_SESSION['search']['rarity'][$key])) {
            unset($_SESSION['search']['rarity'][$key]);
        } else {
            $_SESSION['search']['rarity'][$key] = $_REQUEST[$key];
        }
    }elseif($key =='normal'|| $key =='rare'|| $key =='superRare'|| $key =='eiketsuRare') {
        if(isset($_SESSION['search']['rarity'][$key])) {
            unset($_SESSION['search']['rarity'][$key]);
        } else {
            $_SESSION['search']['rarity'][$key] = $_REQUEST[$key];
        }
    }elseif($key =='number1_1'|| $key =='number1_2'|| $key =='number1_others'|| $key =='number2_1'|| $key =='number2_2'|| $key =='number2_others') {
        if(isset($_SESSION['search']['number'][$key])) {
            unset($_SESSION['search']['number'][$key]);
        } else {
            $_SESSION['search']['number'][$key] = $_REQUEST[$key];
        }
    }elseif($key =='appear_normal'|| $key =='EX'|| $key =='PL'|| $key =='ST') {
        if(isset($_SESSION['search']['appear'][$key])) {
            unset($_SESSION['search']['appear'][$key]);
        } else {
            $_SESSION['search']['appear'][$key] = $_REQUEST[$key];
        }
    }elseif($key =='reinforce'|| $key =='overall_reinforcement'|| $key =='recovery'|| $key =='return'|| $key =='interference'||
    $key == 'damage'|| $key =='dance'|| $key =='counteragent'|| $key =='formation'|| $key =='stash_tactic'|| $key =='whole_body'|| $key =='shikigami'|| $key =='stratagem_special') {
        if(isset($_SESSION['search']['stratagem_category'][$key])) {
            unset($_SESSION['search']['stratagem_category'][$key]);
        } else {
            $_SESSION['search']['stratagem_category'][$key] = $_REQUEST[$key];
        }
    }elseif($key =='stratagem_category_or'|| $key =='stratagem_category_and') {
        unset($_SESSION['search']['stratagem_category_condition']);
        $_SESSION['search']['stratagem_category_condition'][$key] = $_REQUEST[$key];
    }elseif($key =='power_min' || $key =='power_max' || $key =='intelligence_max' || $key =='intelligence_min') {
        $_SESSION['search'][$key] = $_REQUEST[$key];
    }elseif($key =='illustration') {
        $_SESSION['search']['illustration'] = $row;
    }elseif($key =='cv') {
        $_SESSION['search']['cv'] = $row;
    }elseif($key == '1' || $key == '2' || $key == '3' || $key == '4' || $key == '5') {
        $sort[$key] = $row;
        if(isset($_SESSION['search']['sort'])) {
            unset($_SESSION['search']['sort']);
            foreach($sort as $key2=>$row2) {
                $_SESSION['search']['sort'][$key2] = $row2;
            }
        }else {
            $_SESSION['search']['sort'][$key] = $row;
        }
    }elseif($key =='free_word_text') {
        if(!$row == "") {
        $chars = htmlspecialchars($row);
        $replace_text = str_replace('　',' ', $chars);
        $array = explode(' ', $replace_text);
        if(isset($_SESSION['search'][$key])) {
            unset($_SESSION['search'][$key]);
            $_SESSION['search'][$key] = $array;
        } else {
            $_SESSION['search'][$key] = $array;
        }}
    }elseif($key =='general_name'|| $key =='general_name_furigana'|| $key =='stratagem_name'|| $key =='stratagem_name_furigana'|| $key =='stratagem_explanation') {
        if(isset($_SESSION['search']['free_word_category'][$key])) {
            unset($_SESSION['search']['free_word_category'][$key]);
        } else {
            $_SESSION['search']['free_word_category'][$key] = $_REQUEST[$key];
        }
    }
}

header('Location:https://dannkmamemame.com/general_search_text_create.php');
exit();

?>