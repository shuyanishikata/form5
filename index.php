<?php

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
$select = '';
$auto_input = '';
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $view .='<div class="menubox" id="menu'.$result['id'].'">';
        $view .='<div class="menu_id">【'.$result['id'].'】</div>';
        $view .='<div class="menu_ryori">'.$result['name'].'</div>';
        $view .='<div class="menu_nedan">'.$result['price'].'円</div>';
        $view .='<div class="menu_gazou"><img src="menu/'.$result['file_path'].'" alt="" width="200px" ></div>';
        $view .='</div>';


        // $view .='<tr>';
        // $view .='<td class="item_name"><label>'.$result['id'].'</td>';
        // $view .='<td><div class="item_entry">'.$result['name'].'</label></td>';
        // $view .='<td><div class="item_entry">'.$result['price'].'円</label></td>';
        // $view .='</tr>';

        $select .= '<option value="'.$result['name'].'">'.$result['id'] . '：' .$result['name'] . '：' . $result['price'].'円'.'</option>' ;
    

        // $auto_input .='$("#menu'.$result['id'].'").on("click", function () {';
        // $auto_input .='    pdf.setAttribute("value", "'.$result['name'].'" );';
        $auto_input .='$("#menu'.$result['id'].'").on("click", function () {
        $("#コメント").text("'.$result['name'].'"); });';
            

    }
}

$kind = array();
$kind[1] = '1番席';
$kind[2] = '2番席';
$kind[3] = '3番席';
$kind[4] = '4番席';
$kind[5] = '5番席';
$kind[6] = '6番席';
$kind[7] = '7番席';
$kind[8] = '8番席';
$kind[9] = '9番席';
$kind[10] = '10番席';
$kind[11] = '11番席';
$kind[12] = '12番席';
// 


session_start();
$zaseki = $_POST['name'];
$_SESSION['zaseki'] = $zaseki;
// require_once('funcs.php');
// $pdo = db_conn();

// $stmt = $pdo->prepare('SELECT * FROM
//                         zaseki_table
//                         WHERE zaseki = :zaseki 
//                         ');
// $stmt->bindValue(':zaseki', $zaseki, PDO::PARAM_STR);
// $status = $stmt->execute();

// if ($status === false) {
//     sql_error($stmt);
// }

// if ($val['zaseki'] != '' /*&& password_verify($lpw, $val['lpw'])*/) {
//     //Login成功時 該当レコードがあればSESSIONに値を代入
//     $_SESSION['chk_ssid'] = session_id();
//     $_SESSION['zaseki'] = $val['name'];
// } else {
//     //Login失敗時(Logout経由)
//     header('Location: loginmiss.php');
// }

?>

<script type="text/javascript">
            function check(){
                if (order.content.value == "" || order.name.value == "" || order.url1.value == ""){
                    //条件に一致する場合(メールアドレスが空の場合)
                    alert("未入力項目をご確認ください");    //エラーメッセージを出力
                    return false;    //送信ボタン本来の動作をキャンセルします
                }else{
                    //条件に一致しない場合(メールアドレスが入力されている場合)
                    return true;    //送信ボタン本来の動作を実行します
                }
            }
</script>


</html>
<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>注文画面</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
</head>




<body>
    <div class="title">注文画面<a href="sekiselect.php" class="loginstatus">座席変更</a><h>　　いらっしゃいませ　<?= $_SESSION['zaseki'] ?>　番席</h><a href="staff.php" class="loginstatus">店員を呼ぶ</a></div>
    <div class="hyoji">
    <div class="menu_all">
            <div class="subtitle">メニュー一覧</div>
            <p class="説明">メニューをタップすると、注文フォームに反映されます。席番号と個数を入力して、登録ボタンから注文してください。</p>
            <div class="menuflex">    
            <!-- <div class="menubox">
                    <p>【select】</p>
                    <div class="menu_id">ID</div>
                    <div class="menu_ryori">料理名</div>
                    <div class="menu_nedan">値段</div>
                    <div class="menu_gazou">画像</div>
                </div> -->
            <?= $view ?>
            </div>

            <!-- <table class="hyoji_table">
                    <tr>
                    <td class="item_name"><label>ID</td>
                    <td><div class="item_entry">料理名</label></td>
                    <td><div class="item_entry">値段</label></td>
                    </tr>

            </table> -->


    </div>

    <!-- <div class="menubox">
                <p>【select】</p>
            <div class="menu_id">ID</div>
            <div class="menu_ryori">料理名</div>
            <div class="menu_nedan">値段</div>
            <div class="menu_gazou">画像</div>
    </div> -->

    <div class="menu_all">
    <form id="contact" method="post" action="insert.php" name="order">
    <div class="subtitle">注文</div><br>
    <!-- <select name="name" class="item_entry" >
    <option value="" selected disabled>席番号</option>
      <?php foreach($kind as $i => $v){ ?>
        <option value="<?php echo $i ?>"><?php echo $v ?></option>
      <?php } ?>
    </select> -->

    <input type="number" id="tentacles"  name="name" class="item_entry" min="1" max="12" placeholder="席番号"  value="<?= $_SESSION['zaseki'] ?>">番席

    <!-- <select name="url1" class="item_entry">
    <option  value="" selected disabled>select the menu</option>
    <?= $select ?>
    </select> -->


    <!-- <input type="text" name="content" placeholder="ご注文の品" class="item_entry" id="コメント" value=""> -->
    <br>
    <textarea type="text" name="content" placeholder="ご注文の品" class="item_entry" id="コメント"></textarea>

    <br>
    <input type="number" id="tentacles"  name="url1" class="item_entry" min="1" max="10" placeholder="個数">
        
    <!-- <p>*****この部品は未完成です*****</p><br>
    <?php
        for ($i = 1; $i <= 10; $i++) {
        echo $i.'<input type="text" class="item_entry" name="order'.$i.'" id="order'.$i.'" value=""></input>';
        }
    ?><br>
    <p>*******************************</p> -->
    <br>
    <input type="submit" value="登録" class="button" onClick="return check();">
    <br>

    </div>

    </form>
    <div class="button_flex">
    <a href='select.php' class="jump">注文一覧</a><br>
    <a href="menu/login.php" class="jump">管理者メニュー</a>
    </div>    
    </div>

    </div>
    </div>


    
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

let pdf = document.getElementById("コメント");
    <?= $auto_input ?>



</script>
