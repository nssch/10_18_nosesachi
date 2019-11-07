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

//2. データ表示SQL作成
$sql = 'SELECT*FROM mydata_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//データ表示
$view = '';



//3. データ表示
// $view = '';
// if ($status == false) {
//     //execute（SQL実行時にエラーがある場合）
//     $error = $stmt->errorInfo();
//     exit('sqlError:' . $error[2]);
// } else {
//     //Selectデータの数だけ自動でループしてくれる
//     //http://php.net/manual/ja/pdostatement.fetch.php
//     while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
//         $view .= '<div class="card">';
//         $view .= '<div class="card-body">';
//         $view .= '<h4 class="card-title">' . $result['name'];
//         $view .= '</h4>';
//         $view .= '<a href="detail.php?id=' . $result['id'] . '" class="badge badge-primary">Edit</a>';
//         $view .= '<a href="delete.php?id=' . $result['id'] . '" class="badge badge-danger">Delete</a>';
//         $view .= '<p class="card-text">' . $result['comment'];
//         $view .= '</p>';
//         $view .= '<p class="card-text">' . '☆' . $result['hoshi'];
//         $view .= '</p>';
//         $view .= '<a href="' . $result['url'] . '" class="card-link">' . 'link';
//         $view .= '</a>';
//         $view .= '</div>';
//         $view .= '</div>';
//     }
// }
//評価を★で表示させたかったが失敗
// if ($result['hoshi'] == '1') {
//     echo '★';
// } else if ($result['hoshi'] == '2') {
//     echo '★★';
// } else if ($result['hoshi'] == '3') {
//     echo '★★★';
// } else if ($result['hoshi'] == '4') {
//     echo '★★★★';
// } else if ($result['hoshi'] == '5') {
//     echo '★★★★★';
// }
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
                <?= $menu ?>
                <!-- <li class="current"><a href="#">menu1</a></li>
                <li><a href="#">menu2</a></li>
                <li><a href="#">menu3</a></li>
                <li><a href="#">menu4</a></li>
                <li><a href="login.php"></a>LOGOUT</li> -->
            </ul>
        </nav>
    </header>

    <div class="kekka">
        <h1>計算結果</h1>
    </div>

    <div class="wrapper">
        <div class="column cat1">
            <div class="info">
                <h2>活動量改善メニュー作成中</h2>

            </div>
        </div>
        <div class="column cat2">
            <div class="info">
                <h2>食習慣改善メニュー作成中</h2>
            </div>
        </div>
    </div>

</body>

</html>