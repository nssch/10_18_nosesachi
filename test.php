<?php
//ログインチェック
session_start();
include('functions.php');
checkSessionid();
//chk_kanri_flg_menu();

//menuきめる
if ($_SESSION['kanri_flg'] == 0) {
    $menu = menu();
} else {
    $menu = kanri_menu();
}

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
            width: 130px;
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

        .button {
            position: relative;
            background-color: #09b0fd;
            border-radius: 4px;
            color: #fff;
            line-height: 20px;
            -webkit-transition: none;
            transition: none;
            box-shadow: 0 3px 0 #09b0fd;
            text-shadow: 0 1px 1px rgba(0, 0, 0, .3);
            width: 50%;
            text-align: center;
            margin: 10px;
        }

        .button:hover {
            background-color: #31c8aa;
            box-shadow: 0 3px 0 #23a188;
        }

        .button:active {
            top: 3px;
            box-shadow: none;
        }
    </style>

</head>

<body>
    <header>
        <nav>
            <ul>
                <?= $menu ?>
                <!-- <li class="current"><a href="#">入力画面</a></li>
                <li><a href="select.php">メニュー選択画面</a></li>
                <li><a href="#">menu3</a></li>
                <li><a href="#">menu4</a></li>
                <li><a href="login.php">LOGOUT</a></li> -->
            </ul>
        </nav>
    </header>
    <div class="wrapper">
        <div class="column cat1">
            <div class="info">
                <h2>半年間の計画をたてます</h2>
                <p>現体重・目標体重を入力</p>
                <p>無理なく自分のペースで</p>
            </div>
        </div>
        <div class="column cat2">
            <div class="info">
                <form>
                    <h3>日付</h3>
                    <input type="date" name="date" id="date">
                    <h3>現体重</h3>
                    <input type="number" name="weight" id="weight">
                    <h3>半年間で何kg減らす？</h3>
                    <input type="number" name="loss" id="loss">kg

                </form>

                <div class="btnarea">
                    <input type="submit" value="start" id="submit" class="button">
                    <input type="clear" value="clear" id="clear" class="button">
                </div>

            </div>


        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        $(function() {
            //ローカルストレージに保存
            $('#submit').on('click', function() {
                var date = $('#date').val();
                var weight = $('#weight').val();
                var loss = $('#loss').val();
                var obj = {
                    "date": date,
                    "weight": weight,
                    "loss": loss
                }
                var json = JSON.stringify(obj);
                localStorage.setItem('info', json)
                //console.log(obj);
            });

            //clearクリックで消去
            $('#clear').on('click', function() {
                localStorage.removeItem('info');
                $('#date').val('');
                $('#weight').val('');
                $('#loss').val('');
            });

            //ページ読み込み。保存データ取得
            if (localStorage.getItem('info')) {
                var jsondata = localStorage.getItem('info');
                var objget = JSON.parse(jsondata);
                $('#date').val(objget.date);
                $('#weight').val(objget.weight);
                $('#loss').val(objget.loss);

            }




        });


        // $(document).ready(function () {
        //     // 登録ボタンクリック 
        //     $('#submit').click(function () {
        //         var time = new Date().getTime();
        //         var data = new Object();
        //         data.date = $('#date').val();
        //         data.weight = $('#weight').val();
        //         data.loss = $('#loss').val();
        //         var str = JSON.stringify(data);
        //         //ローカルストレージ
        //         localStorage.setItem(time, str);
        //         loadStorage();
        //     });

        //     /** データクリアボタンクリック */
        //     $('#clear').click(function () {
        //         localStorage.clear();
        //         alert("全てのデータを消去しました。");
        //         loadStorage();
        //     });

        //     if (localStorage.getItem('memo')) {
        //         var text = localStorage.getItem('memo');
        //         $('#text_area').val(text);


        /** リロードボタンクリック */
        //$('#reload').click(loadStorage);

        /** ローカルストレージデータ読み込み */
        //     function loadStorage() {
        //         $("#list tbody").empty();
        //         var rec = "";
        //         for (var i = 0; i < localStorage.length; i++) {
        //             var key = localStorage.key(i); //keyを取得
        //             var value = localStorage.getItem(key); //keyからJSON文字列を取得
        //             if (!value) {
        //                 continue;
        //             }
        //             try {
        //                 var data = JSON.parse(value); //JSONオブジェクトに変換
        //             } catch (event) {
        //                 continue;
        //             }
        //             var date = new Date();
        //             date.setTime(key);
        //             var dateStr = date.toDateString() + " " + date.toLocaleTimeString();
        //             rec += "<tr id='" + key + "'><td><button class='delete' href='#'>消去</button></td>";
        //             rec += "<td>" + data.name + "</td>";
        //             rec += "<td>" + data.detail + "</td>";
        //             rec += "<td><time datetime='" + dateStr + "'>" + dateStr + "</time></td>";
        //             rec += "</tr>";
        //         }
        //         $("#list tbody").append(rec);
        //         $('.delete').bind('click', delete_clickHandler);
        //     }

        //     //削除処理 
        //     function delete_clickHandler(event) {
        //         var target = $(event.target).parents('tr').attr('id');
        //         localStorage.removeItem(target);
        //         alert('削除しました。');
        //         loadStorage();
        //     }
        //     //登録済みデータ読み込み
        //     loadStorage();
        // });
    </script>


</body>

</html>