<?php

session_start();
require_once('funcs.php');
db_conn();

loginCheck();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>メニューマスタ登録</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="../style.css">
    <style>

    </style>
    <script type="text/javascript"> 
    function check(){
        var flag = 0;
        // 設定開始（チェックする項目を設定してください）
        if(document.menuform.price.value.match(/[^0-9]+/)){
            flag = 1;
        }
        // 設定終了
        if(flag){
            window.alert('値段に数字以外が入力されています'); // 数字以外が入力された場合は警告ダイアログを表示
            return false; // 送信を中止
        }
        else{
            return true; // 送信を実行
        }
    }
    </script>

</head>

<body>

    <div class="title">メニューマスタ登録<a href="logout.php" class="loginstatus">ログアウト</a></div>
    <div class="hyoji">
    <form  enctype="multipart/form-data" method="POST" name="menuform" action="file_upload.php" onSubmit="return check()">
    <table class="hyoji_table">
    <tr>
    <td class="item_name"><label>料理名</td>
    <td><input type="text" name="name" class="item_entry" placeholder="input menu"></label></td>
    </tr>
    <tr>
    <td class="item_name"><label>値段</td>
    <td><input type="text" name="price" class="item_entry" placeholder="input price"></label></td>
    </tr>
    <tr>
    <td class="item_name"><label>画像</td>
    <td>
    <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
    <input name="img" type="file" accept="image/*" />
    </label></td>
    </tr>  
    <!-- <label>画像：<input type="file" name="image" value="<?= $result['image']?>"></label><br> -->
    </table>
            <input type="submit" value="登録" class="button">
    </form>
    <div class="button_flex">
    <a href="select.php" class="jump">メニューマスタ一覧</a><br>
    <a href="../index.php" class="jump">注文画面へ</a>
    </div>
</div>
</body>

</html>
