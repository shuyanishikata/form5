<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>管理者ログイン</title>
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

    <script>
window.addEventListener('DOMContentLoaded', function(){

	// (1)パスワード入力欄とボタンのHTMLを取得
	let btn_passview = document.getElementById("btn_passview");
	let input_pass = document.getElementById("input_pass");

	// (2)ボタンのイベントリスナーを設定
	btn_passview.addEventListener("click", (e)=>{

		// (3)ボタンの通常の動作をキャンセル（フォーム送信をキャンセル）
		e.preventDefault();

		// (4)パスワード入力欄のtype属性を確認
		if( input_pass.type === 'password' ) {

			// (5)パスワードを表示する
			input_pass.type = 'text';
			btn_passview.textContent = '非表示';

		} else {

			// (6)パスワードを非表示にする
			input_pass.type = 'password';
			btn_passview.textContent = '表示';
		}
	});

});
    </script>


</head>

<body>

    <div class="title">管理者ログイン</div>
    <div class="hyoji">
    <form  method="POST" name="menuform" action="login_act.php">
    <table class="hyoji_table">
    <tr>
    <td class="item_name"><label>ユーザーID</td>
    <td><input type="text" name="lid" class="item_entry" placeholder="user id"></label></td>
    </tr>
    <tr>
    <td class="item_name"><label>パスワード</td>
    <td><input type="password" name="lpw" class="item_entry" placeholder="pass" id="input_pass"></label></td>
    <td><button id="btn_passview">表示</button></td>
    </tr>
    <!-- <label>画像：<input type="file" name="image" value="<?= $result['image']?>"></label><br> -->
    </table>
            <input type="submit" value="ログイン" class="button">
    </form>
    <div class="button_flex">
    <!-- <a href="select.php" class="jump">メニューマスタ一覧</a><br> -->
    <a href="../index.php" class="jump">注文画面へ</a>
    </div>
</div>
</body>

</html>


