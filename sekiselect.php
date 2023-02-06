<?php
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
?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>座席選択</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="./style.css">
    <style>

    </style>
    <script type="text/javascript"> 

    </script>




</head>

<body>

    <div class="title">座席選択</div>
    <div class="hyoji">
    <form  method="POST" name="menuform" action="index.php">
    <table class="hyoji_table">
    <tr>
    <td class="item_name"><label>座席選択</td>
    <td>
    <select name="name" class="item_entry" >
    <option value="" selected disabled>席番号</option>
      <?php foreach($kind as $i => $v){ ?>
        <option value="<?php echo $i ?>"><?php echo $v ?></option>
      <?php } ?>
    </select>
    </td>
    </tr>
    <tr>
    </table>
            <input type="submit" value="注文画面へ" class="button">
    </form>

</div>
</body>

</html>


