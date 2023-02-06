<?php
session_start();
require_once('funcs.php');
loginCheck();

require_once "./dbc.php";

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

// $caption = filter_input(INPUT_POST,'caption',
// FILTER_SANITIZE_SPECIAL_CHARS);

// if(empty($caption)){
//     array_push($err_msgs, 'キャプションを入力してください');
// }

// if(strlen($caption) > 140){
//     array_push($err_msgs,  'キャプションは140文字以内で入力してください。');
// }

// if($filesize > 1048576 || $file_err == 2){
//     echo 'ファイルサイズは1MB未満にしてください。';
//     echo '<br>';
// }

$allow_ext = array('jpg','jpeg','png');
$file_ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array(strtolower($file_ext), $allow_ext)) {
    array_push($err_msgs,'画像ファイルを添付してください。');
}

if(count($err_msgs)===0){



if(is_uploaded_file($tmp_path)){
    if(move_uploaded_file($tmp_path, $save_path)){
          $mmss =  $filename . 'を'.$upload_dir.'にアップしました。';
    $result = fileSave($name,$price,$filename, $save_path);
    
if($result){
    echo 'データベースに保存しました！';
}else{
    echo 'データベースへの保存が失敗しました！';
}



}else{
    echo 'ファイルが保存できませんでした。';
    }
}else{
        echo 'ファイルが選択されていません。';
        echo '<br>';
    }

}else{
    foreach($err_msgs as $msg){
        $mmss = $msg;
    } 
}


?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>メニューマスタ登録</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="../style.css">



</head>

<body>

    <div class="title">メニューマスタ登録</div>
    <div class="hyoji">
    <div class="menu_all">

    <?= $mmss ?>

    </div>
    <div class="button_flex">
    <a href="index.php" class="jump">メニューマスタ登録</a><br>

    </div>
</div>
</body>

</html>