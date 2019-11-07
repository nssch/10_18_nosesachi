<?php
//ログインチェック
session_start();
include('user_functions.php');
//checkSessionid();



// getで送信されたidを取得  aタグでid取得しているのでGET
$id = $_GET['id'];

//DB接続します
$pdo = connectToDb();  //connecttodbはfunctions.phpで定義しているもの


//データ登録SQL作成，指定したidのみ表示する
$sql = 'SELECT*FROM user02_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//データ表示
if ($status == false) {
    // エラーのとき
    showSqlErrorMsg($stmt);
} else {
    // エラーでないとき
    $rs = $stmt->fetch();
    //var_dump($rs);
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">

</head>

<body>
    <header>
        <nav>
            <ul>
                <li class="current"><a href="test.php">入力画面</a></li>
                <li><a href="select.php">メニュー選択</a></li>
                <li><a href="#">作成中</a></li>
                <li><a href="#">作成中</a></li>
                <li><a href="user_index.php">ユーザー登録</a></li>
                <li><a href="user_select.php">ユーザー一覧</a></li>
                <li><a href="login.php">ログアウト</a></li>
            </ul>
        </nav>
    </header>

    <div>
        <form action="user_update.php" method="POST">
            <div class="cp_iptxt">
                <label class="ef">
                    <input type="text" placeholder="名前" name="name" value="<?= $rs['name'] ?>">
                </label>
            </div>
            <div class="cp_iptxt">
                <label class="ef">
                    <input type="text" placeholder="EMAIL" name="email" value="<?= $rs['email'] ?>">
                </label>
            </div>
            <div class="cp_iptxt">
                <label class="ef">
                    <input type="text" placeholder="Password" name="lpw" value="<?= $rs['lpw'] ?>">
                </label>
            </div>
            <div class="cp_iptxt">
                <label class="ef">
                    <select name="kanri_flg" id="kanri_flg" value="<?= $rs['kanri_flg'] ?>">
                        <option <?= $rs['kanri_flg'] != '0' ?: 'selected' ?> value="0">一般</option>
                        <option <?= $rs['kanri_flg'] != '1' ?: 'selected' ?> value="1">管理者</option>
                    </select>
                </label>
            </div>
            <div class="cp_iptxt">
                <label class="ef">
                    <select name="life_flg" id="life_flg" value="<?= $rs['life_flg'] ?>">
                        <option <?= $rs['life_flg'] != '0' ?: 'selected' ?> value="0">アクティブ</option>
                        <option <?= $rs['life_flg'] != '1' ?: 'selected' ?> value="1">非アクティブ</option>
                    </select>
                </label>
            </div>
            <div class="submit">
                <input type="submit" value="登録" id="button-blue" />
                <div class="ease"></div>
            </div>

            <input type="hidden" name="id" value="<?= $rs['id'] ?>">

        </form>
    </div>

</body>

</html>