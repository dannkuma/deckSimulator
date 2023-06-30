
<?php
    const DB_HOST = 'mysql:host=localhost;dbname=xs344307_eiketsu;charset=utf8';
    const DB_USER = 'xs344307_user';
    const DB_PASSWORD = 'password';
    try{
        $pdo = new PDO(DB_HOST, DB_USER, DB_PASSWORD, [
            //必須オプション開始
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,//データベースが帰ってくる値を連想配列で取得します。
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,//例外を表示する
            //必須オプション終了
            PDO::ATTR_EMULATE_PREPARES => false, //SQLインジェクション対策
        ]);
    }catch(PDOException $e){
    /*catchには接続失敗時の処理を書きます。エラーの内容を$eで取得しているので
    getMessage関数でエラーの内容を表示させます。*/
        echo '接続失敗'. $e->getMessage() . "\n";
        exit();
    }
if(isset($_SESSION['user'])) {//ログイン確認   
    $sql=$pdo->prepare(
        'select * from favorite, general '.
        'where user_id=? and general_id=id');//user_idからgeneral_idを取得して、そのgeneral_id全てと一致するレコードをgeneralテーブルから取得する
    $sql->execute([$_SESSION['user']['id']]);
    
    foreach($sql as $row) {
        
        echo '<script>';
        echo 'function favorite_click(index) {
            $(".favorite"+index).addClass("click");
        }';
        echo 'favorite_click(', json_encode($row['id']), ')';
        echo '</script>';
    }
}