<?php

$file = $_FILES['image'];
$filename = basename($file['name']);
$tmp_path = $file['tmp_name'];
$file_err = $file['error'];
$filesize = $file['size'];
$upload_dir = 'images/';

$allow_ext = array('jpg', 'jpeg', 'png');
$file_ext = pathinfo($filename);
if(!in_array(strtolower($file_ext), $allow_ext)){
    echo '画像ファイルを添付してください。';
}

// var_dump($file);

if(is_uploaded_file($tmp_path)){
if(move_uploaded_file($tmp_path, $upload_dir, $filename)){
echo $filename . 'をアップしました。';
}
echo 'ファイルが保存できませんでした。';
}else{
    echo 'ファイルが選択されていません。';
    echo '<br>';
}

?>

