<?php

function h($str){
 return htmlspecialchars($str,ENT_QUOTES);  

}



//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=gs_db4;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DBConnectError'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bn_table;");
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{


while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {

  $view .='<tr>';
  $view .='<td class="item_name"><label>'.h($result['name']).'番席</td>';
  $view .='<td><a href="detail.php?id=' . $result['id']  . '"><div class="item_entry">'.h($result['content']).'</a></label></td>';
  $view .='<td><a href="detail.php?id=' . $result['id']  . '"><div class="item_entry">'.h($result['url1']).'</a></label></td>';
  $view .='<td><a href="delete.php?id=' . $result['id']  . '" class="item_entry">[ 削除 ]</td></a>';
  $view .='</tr>';


}
}
?>




<html lang="jp">

<head>
    <meta charset="utf-8">
    <title>注文一覧</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
</head>



<body>
  <div class="title">注文一覧</div>
  <div class="hyoji">
    <div id="contact" method="post" action="write.php">

      <table class="hyoji_table">
      <tr>
      <td class="item_name"><label>席</td>
      <td  width="200px"><div class="item_entry">品名</label></td>
      <td><div class="item_entry">個数</label></td>
      <td><div class="item_entry">削除</label></td>
      <?= $view ?>
      </tr>
      </table>

      <div class="button_flex">
      <a href="index.php" class="jump">注文画面に戻る</a><br>
      <a href="menu/login.php" class="jump">管理者メニュー</a>
      </div>

    </div>
  </div>
  </div>
</body>


</html>