<?php
//【重要】
/**
 * DB接続のための関数をfuncs.phpに用意
 * require_onceでfuncs.phpを取得
 * 関数を使えるようにする。
 */
try {
    $db_name = 'gs_db4';    //データベース名
    $db_id   = 'root';      //アカウント名
    $db_pw   = '';      //パスワード：MAMPは'root'
    $db_host = 'localhost'; //DBホスト
    $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
} catch (PDOException $e) {
    exit('DB Connection Error:' . $e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM menu_table;');
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //GETデータ送信リンク作成
        // <a>で囲う。

        $view .='<tr>';
        $view .='<td class="item_name"><label>'.$result['id'].'</td>';
        $view .='<td><a href="detail.php?id=' . $result['id']  . '"><div class="item_entry">'.$result['name'].'</a></label></td>';
        $view .='<td><a href="detail.php?id=' . $result['id']  . '"><div class="item_entry">'.$result['price'].'</a></label></td>';
        $view .='<td><a href="delete.php?id=' . $result['id']  . '" class="item_entry">[ 削除 ]</td></a>';
        $view .='</tr>';


    }
}

session_start();
require_once('funcs.php');
loginCheck();
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">

    <title>メニューマスタ一覧</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="../style.css">
    <style>

    </style>
</head>

<body id="main">

    <div class="title">メニューマスタ一覧<a href="logout.php" class="loginstatus">ログアウト</a><h>　　こんにちは　<?= $_SESSION['name'] ?>　さん</h>
    </div>

    <div class="hyoji">
    <table class="hyoji_table">
    <tr>
    <td class="item_name"><label>ID</td>
    <td><div class="item_entry">料理名</label></td>
    <td><div class="item_entry">値段</label></td>
    <td><div class="item_entry">削除</label></td>
    </tr>
    <?= $view ?>

    </table>



    <div class="button_flex">
    <a href="index.php" class="jump">メニューマスタ登録</a><br>
    <a href="../index.php" class="jump">注文画面へ</a>
    </div>
    </div>
</body>

</html>
