<?php

//1. POSTデータ取得
$name   = $_POST['name'];
$price  = $_POST['price'];

$file = $_FILES['img'];
$filename = basename($file['name']);
$tmp_path = $file['tmp_name'];
$file_err = $file['error'];
$filesize = $file['size'];
$upload_dir = 'images/';
$save_filename = date('YmdHis') . $filename;
$err_msgs = array();
$save_path = $upload_dir . $save_filename;


//2. DB接続します
//*** function化する！  *****************
// try {
//     $db_name = 'gs_db3'; //データベース名
//     $db_id   = 'root'; //アカウント名
//     $db_pw   = ''; //パスワード：MAMPは'root'
//     $db_host = 'localhost'; //DBホスト
//     $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
// } catch (PDOException $e) {
//     exit('DB Connection Error:' . $e->getMessage());
// }

require_once('funcs.php');
$pdo = db_conn();


//３．データ登録SQL作成
// if ($_SERVER['REQUEST_METHOD'] != 'POST') {
// } else {
//     if (!empty($_FILES['image']['name'])) {
//         $image_name = $_FILES['image']['name'];
//         $image_type = $_FILES['image']['type'];
//         $image_content = file_get_contents($_FILES['image']['tmp_name']);
//         $image_size = $_FILES['image']['size'];

$stmt = $pdo->prepare(
    'INSERT INTO
                        menu_table(
                            name, price ,file_name, file_path
                            )
                        VALUES (
                            :name, :price ,:file_name, :file_path
                            );'
);

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':price',$price, PDO::PARAM_INT);
// $stmt->bindValue(':image',$image, PDO::PARAM_STR);
// $stmt->bindValue(':image_content',$image_content, PDO::PARAM_STR);
// $stmt->bindValue(':image_type',$image_type, PDO::PARAM_STR);
// $stmt->bindValue(':image_size',$image_size, PDO::PARAM_INT);
// $stmt->bindValue(':image_type',$image_type, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

// }

//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    //*** function化する！*****************
    header('Location: index.php');
    exit();
}

// }
