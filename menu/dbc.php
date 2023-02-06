<?php

// function dbc()

// {
// $host = "localhost";
// $dbname = "gs_db4";
// $user = "root";
// $pass = "root";

// $dns = "mysql:host=$host
// dbname=$dbname;charset=utf8";

// try{

// $pdo = new PDO($dns, $user, $pass,
// [
// PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
// PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC

// ]);
// echo'成功！';
// return $pdo;

// }catch(PDOException $e){
//     exit($e->getMessage());
// }


// }

function dbc()
{
    try {
        $db_name = 'gs_db4';    //データベース名
        $db_id   = 'root';      //アカウント名
        $db_pw   = '';      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = 'localhost'; //DBホスト
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}

function fileSave($name,$price,$filename, $save_path){

$result = False;
$sql = "INSERT INTO menu_table (name, price,file_name, file_path)VALUE(?,?,?,?)";

try{
$stmt = dbc()->prepare($sql);
$stmt->bindValue(1,$name);
$stmt->bindValue(2,$price);
$stmt->bindValue(3,$filename);
$stmt->bindValue(4,$save_path);
// $stmt->bindValue(5,$caption);
$result = $stmt->execute();
return $result;
}catch(\Exception $e){
    echo($e->getMessage());
    return $result;
}

}


function getAllFile(){
$sql = "SELECT * FROM file_table";
$fileData = dbc()->query($sql);
return $fileData;


}



?>
