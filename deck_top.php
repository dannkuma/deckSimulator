<script
      src="https://code.jquery.com/jquery-3.6.4.js"
      integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
      crossorigin="anonymous"></script>
<?php
if(empty($_SESSION['deck'])) {
    unset($_SESSION['deck']);
}
if(isset($_SESSION['deck'])) {//デッキ登録あり
    $_SESSION['deck'] = array_values($_SESSION['deck']);
    echo '<div class="top_deck_list_wrapper">';
    echo '<ul class="top_deck_list_area">';
    echo '</ul>';
    echo '<div class="top_deck_detail_area">';
    echo '<div class="top_deck_btn_area">';
    echo '<a class="deck_detail_btn" href="deck_detail.php">デッキ詳細</a>';
    echo '</div>';
    echo '<p class="top_total_cost">総コスト<span class="top_cost_text_none">';
    if(isset($_SESSION['deck'])) {
        $pdo=new PDO('mysql:host=localhost;dbname=xs344307_eiketsu;charset=utf8',
'xs344307_user', 'password');
        $totalCost = 0;
        foreach($_SESSION['deck'] as $key=>$row) {
            $sql=$pdo->prepare('select * from general where id=?');
            $sql->execute([$row]);
            foreach($sql as $row) {
                $totalCost+=$row['cost'];
            }
        }
        echo sprintf('%.1f',$totalCost),PHP_EOL;
    } else {
        '0.0';
    }
    echo '</span></p>';
    echo '<div class="clear"></div>';
    echo '<div class="clear"></div>';
    echo '</div>';
    echo '</div>';    
    foreach ($_SESSION['deck'] as $key => $row) {
        if($key<=7) {
            echo 
            "<script>
                function change_topDeck() {
                    $('.top_deck_list_area').append('<li class=\"top_deck_general_$row top_deck_list\">".
                    "<a class=\"top_deck_general_detail\" href=\"general_detail_insert.php?id=$row\">".
                    "<img alt=\"image\" src=\"img/icon/icon_ ($row).png\"></a>".
                    "<a class=\"top_deck_remove\" href=\"deck_create.php?generalId=$row\">外す</a>".
                    "</li>');
                }
                change_topDeck();
            </script>";
        } else {
            $array_search = array_search($row, $_SESSION['deck']);//リクエストパラメータのキーを返す
            unset($_SESSION['deck'][$array_search]);//キーを指定してdeck配列から値を削除
            unset($_SESSION['deck'][$key]);
            echo
            "<script>
                alert(\"登録できる武将は8人までです\");
            </script>";
        }
    }
} else {//デッキ登録なし
    echo '<div class="top_deck_list_none">';
    echo '<div class="top_deck_guide_none">';
    echo '<h1 class="deck_list_header_none">◇ デッキシミュレーター ◇</h1>';
    echo '<p class="deck_list_text_none">各武将の「デッキ」ボタンで武将を登録できます</p>';
    echo '<div class="clear"></div>';
    echo '</div>';
    echo '<div class="top_deck_detail_area_none">';
    echo '<div class="top_deck_btn_area_none">';
    echo '<button class="deck_detail_btn_none" type="button" disabled>デッキ詳細</button>';
    echo '</div>';
    echo '<p class="top_total_cost_none">総コスト<span class="top_cost_text_none">0.0</span></p>';
    echo '<div class="clear"></div>';
    echo '<div class="clear"></div>';
    echo '</div>';
    echo '<div class="clear"></div>';
    echo '</div>';
}
?>

