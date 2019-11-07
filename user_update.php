<?php

// 関数ファイル読み込み
include('user_functions.php');


//入力チェック(受信確認処理追加) 
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
$id = $_POST['id'];


//DB接続します(エラー処理追加)
$pdo = connectToDb();  //connecttodbはfunctions.phpで定義しているもの


//データ登録SQL作成
$sql = 'UPDATE user02_table SET name=:a1,email=:a2,lpw=:a3,kanri_flg=:a4,life_flg=:a5 WHERE id=:id';  //WHERE id=:id入れないと全データが変わってしまう
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);
$stmt->bindValue(':a2', $email, PDO::PARAM_STR);
$stmt->bindValue(':a3', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':a4', $kanri_flg, PDO::PARAM_INT);
$stmt->bindValue(':a5', $life_flg, PDO::PARAM_INT);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();


//4．データ登録処理後
if ($status == false) {
    showSqlErrorMsg($stmt);
} else {
    header('Location:user_select.php');
    exit;
}
