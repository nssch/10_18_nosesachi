<?php
session_start();
include('functions.php');  //関数を記述したファイル読み込み

var_dump($_POST);
// 入力チェック
if (
    !isset($_POST['weight']) || $_POST['weight'] == '' ||
    !isset($_POST['loss']) || $_POST['loss'] == '' ||
    !isset($_POST['date']) || $_POST['date'] == ''
) {
    exit('ParamError');
}

//POSTデータ取得
$weight = $_POST['weight'];
$loss = $_POST['loss'];
$date = $_POST['date'];



//db接続
$pdo = connectToDb();

//データ登録SQL作成
$sql = 'INSERT INTO mydata_table(weight, loss, date)VALUES(:a1, :a2, :a3)';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $weight, PDO::PARAM_INT);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $loss, PDO::PARAM_INT);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $date, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit('sqlError:' . $error[2]);
} else {
    //５．test.phpへリダイレクト
    header('Location: test.php');
}
