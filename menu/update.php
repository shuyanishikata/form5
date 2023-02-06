<?php




//1. POSTデータ取得
$name   = $_POST['name'];
$price  = $_POST['price'];
// $image  = $_POST['image'];
$id = $_POST['id'];

//2. DB接続します
//*** function化する！  *****************
// try {
//     $db_name = 'gs_db4'; //データベース名
//     $db_id   = 'root'; //アカウント名
//     $db_pw   = ''; //パスワード：MAMPは'root'
//     $db_host = 'localhost'; //DBホスト
//     $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
// } catch (PDOException $e) {
//     exit('DB Connection Error:' . $e->getMessage());
// }

try {
    $db_name = 'gs_db4'; //データベース名
    $db_id   = 'root'; //アカウント名
    $db_pw   = ''; //パスワード：MAMPは'root'
    $db_host = 'localhost'; //DBホスト
    $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
} catch (PDOException $e) {
    exit('DB Connection Error:' . $e->getMessage());
}


// require_once('funcs.php');
// $pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare(
    'UPDATE
                        menu_table SET
                        name = :name ,
                        price = :price

                        WHERE id = :id;');




// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':price', $price, PDO::PARAM_INT);
// $stmt->bindValue(':image', $image, PDO::PARAM_STR); 
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    //*** function化する！*****************
    header('Location: select.php');
    exit();
}
