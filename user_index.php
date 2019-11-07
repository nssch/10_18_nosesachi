<?php
//ログインチェック
session_start();
include('functions.php');
checkSessionid();


//db接続
$pdo = connectToDb();


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
                <li><a href="select.php">メニュー選択画面</a></li>
                <li><a href="#">作成中</a></li>
                <li><a href="#">作成中</a></li>
                <li><a href="user_index.php">ユーザー登録</a></li>
                <li><a href="user_select.php">ユーザー一覧</a></li>
                <li><a href="login.php">ログアウト</a></li>
            </ul>
        </nav>
    </header>

    <div>
        <form action="user_insert.php" method="POST">
            <div class="cp_iptxt">
                <label class="ef">
                    <input type="text" placeholder="名前" name="name">
                </label>
            </div>
            <div class="cp_iptxt">
                <label class="ef">
                    <input type="text" placeholder="EMAIL" name="email">
                </label>
            </div>
            <div class="cp_iptxt">
                <label class="ef">
                    <input type="text" placeholder="Password" name="lpw">
                </label>
            </div>
            <div class="cp_iptxt">
                <label class="ef">
                    <select name="kanri_flg" id="kanri_flg">
                        <option value="0">一般</option>
                        <option value="1">管理者</option>
                    </select>
                </label>
            </div>
            <div class="cp_iptxt">
                <label class="ef">
                    <select name="life_flg" id="life_flg">
                        <option value="0">アクティブ</option>
                        <option value="1">非アクティブ</option>
                    </select>
                </label>
            </div>
            <div class="submit">
                <input type="submit" value="登録" id="button-blue" />
                <div class="ease"></div>
            </div>

        </form>
    </div>
</body>

</html>