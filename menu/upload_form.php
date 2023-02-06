<?php

require_once "./dbc.php";
$files = getAllFile();



?>
<!-- ①フォームの説明 -->
<!-- ②$_FILEの確認 -->
<!-- ③バリデーション -->
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>アップロードフォーム</title>
  </head>
  <style>
    body {
      padding: 30px;
      margin: 0 auto;
      width: 50%;
    }
    textarea {
      width: 98%;
      height: 60px;
    }
    .file-up {
      margin-bottom: 10px;
    }
    .submit {
      text-align: right;
    }
    .btn {
      display: inline-block;
      border-radius: 3px;
      font-size: 18px;
      background: #67c5ff;
      border: 2px solid #67c5ff;
      padding: 5px 10px;
      color: #fff;
      cursor: pointer;
    }
  </style>
  <body>
  <div class="title">メニューマスタ登録</div>
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

<div>
<?php foreach($files as $file): ?>
  <img src="<?php echo "{$file['file_path']}"; ?>" alt="">
  <p><?php echo "{$file['description']}"; ?></p>
<?php endforeach; ?>
</div>


  </body>
</html>
