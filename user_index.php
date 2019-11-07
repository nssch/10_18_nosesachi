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
    <style>
        header {
            height: 60px;
            display: inline-block;
            align-items: center;
            justify-content: center;
            padding-right: 100px;
            padding-left: 100px;

        }

        nav {
            display: flex;
            align-items: center;
            justify-content: center;

        }

        nav ul {
            position: relative;
            left: 10%;
            display: table;
            margin: 0 auto;
            padding: 0;
            width: 80%;
            text-align: center;

        }

        nav ul li {
            display: table-cell;
            width: 150px;
        }

        nav ul li a {
            display: block;
            width: 100%;
            height: 100%;
            padding: 10px 0;
            text-decoration: none;
            color: #aaa;
        }

        nav ul li.current {
            font-weight: bold;
            border-top: 5px solid #00B0F0;
        }

        nav ul li.current a {
            color: #00B0F0;
        }

        nav ul li a:hover {
            color: #0089BB;
            background-color: #FBFBDD;
        }

        nav ul li:hover {
            border-top: 5px solid #F8E750;
        }
    </style>
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