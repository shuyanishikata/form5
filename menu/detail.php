<?php
session_start();
require_once('funcs.php');
loginCheck();
/**
 * [ここでやりたいこと]
 * 1. クエリパラメータの確認 = GETで取得している内容を確認する
 * 2. select.phpのPHP<?php ?>の中身をコピー、貼り付け
 * 3. SQL部分にwhereを追加
 * 4. データ取得の箇所を修正。
 */

$id = $_GET['id'];
try {
    $db_name = 'gs_db4'; //データベース名
    $db_id   = 'root'; //アカウント名
    $db_pw   = ''; //パスワード：MAMPは'root'
    $db_host = 'localhost'; //DBホスト
    $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
} catch (PDOException $e) {
    exit('DB Connection Error:' . $e->getMessage());
}

$stmt = $pdo->prepare('SELECT * FROM menu_table WHERE id= :id ;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //PARAM_INTなので注意
$status = $stmt->execute();


//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    $result = $stmt->fetch();
}



?>
<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
(入力項目は「登録/更新」はほぼ同じになるから)
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>メニューマスタ更新</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="../style.css">

</head>

<body>
    <div class="title">メニューマスタ更新<a href="logout.php" class="loginstatus">ログアウト</a></div>
    <div class="hyoji">
    <form method="POST" action="update.php">
    <table class="hyoji_table">
    <tr>
    <td class="item_name"><label>料理名</td>
    <td><input type="text" name="name" value="<?= $result['name']?>" class="item_entry"></label></td>
    </tr>
    <tr>
    <td class="item_name"><label>値段</td>
    <td><input type="text" name="price" value="<?= $result['price']?>" class="item_entry"></label></td>
    </tr>
    <!-- <label>画像：<input type="file" name="image" value="<?= $result['image']?>"></label><br> -->
    </table>
    <input type="hidden" name="id" value="<?= $result['id']?>">
    <input type="submit" value="修正" class="button">
    </form>
    <div class="button_flex">
    <a href="select.php" class="jump">メニューマスタ管理</a><br>
    <a href="../index.php" class="jump">注文画面へ</a>
    </div>
</div>

</body>

</html>
