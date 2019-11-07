<?php
session_start();
include('user_functions.php');  //関数を記述したファイル読み込み

//var_dump($_POST);
// 入力チェック
if (
    !isset($_POST['name']) || $_POST['name'] == '' ||
    !isset($_POST['email']) || $_POST['email'] == '' ||
    !isset($_POST['lpw']) || $_POST['lpw'] == '' ||
    !isset($_POST['kanri_flg']) || $_POST['kanri_flg'] == '' ||
    !isset($_POST['life_flg']) || $_POST['life_flg'] == ''
) {
    exit('ParamError');
}

//POSTデータ取得
$name = $_POST['name'];
$email = $_POST['email'];
$lpw = $_POST['lpw'];
$kanri_flg = $_POST['kanri_flg'];
$life_flg = $_POST['life_flg'];


//db接続
$pdo = connectToDb();

//データ登録SQL作成
$sql = 'INSERT INTO user02_table(id, name, email, lpw,kanri_flg,life_flg)VALUES(NULL, :a1, :a2, :a3, :a4, :a5)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $email, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a4', $kanri_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a5', $life_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit('sqlError:' . $error[2]);
} else {
    //５．user_index.phpへリダイレクト
    header('Location: user_index.php');
}
