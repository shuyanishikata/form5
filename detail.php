<?php



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

$stmt = $pdo->prepare('SELECT * FROM gs_bn_table WHERE id= :id ;');
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



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>注文修正</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">

</head>




<body>
    <div class="title">注文修正</div>
    <div class="hyoji"> 
    <form id="contact" method="post" action="update.php">

    <input type="text" name="name" class="item_name"  value="<?= $result['name']?>"  style="width:25px;">
    番席
    </input>
    <input type="text" name="url1" class="item_entry"  value="<?= $result['url1']?>">
    <br>
    <textarea type="text" name="content" placeholder="comment" class="item_entry"><?= $result['content']?></textarea><br />
    <input type="hidden" name="id" value="<?= $result['id']?>">
    <input type="submit" value="修正" class="button">
    <br>

    </form>
    <div class="button_flex">
    <a href='select.php' class="jump">注文一覧</a><br>
    <a href="menu/login.php" class="jump">管理者メニュー</a>
    </div>
    </div>
    </div>


    
</body>
</html>
