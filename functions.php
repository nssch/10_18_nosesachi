<?php
function connectToDb()
{
    $dbn = 'mysql:dbname=gsacfd04_db18;charset=utf8;port=3306;host=localhost';
    $user =  'root';
    $pwd = '';

    try {
        return new PDO($dbn, $user, $pwd);
    } catch (PDOException $e) {
        exit('dbError:' . $e->getMessage());
    }
}
//SQL処理エラー
function showSqlErrorMsg($stmt)
{
    $error = $stmt->errorInfo();
    exit('sqlError:' . $error[2]);
}

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}


//ログイン状態の確認
function checkSessionid()
{
    //失敗時はログイン画面へ
    if (!isset($_SESSION['session_id']) || $_SESSION['session_id'] != session_id()) {
        header('Location:login.php');
    } else {
        session_regenerate_id(true);
        $_SESSION['session_id'] = session_id();
    }
}

// menuを決める
// function menu($kanri_flg)
// {
//     if ($kanri_flg == 0) {
//         $menu = '<li class="current"><a href="#">入力画面</a></li>';
//         $menu .= '<li><a href="select.php">メニュー選択画面</a></li>';
//         $menu .= '<li><a href="#">作成中</a></li>';
//         $menu .= '<li><a href="#">作成中</a></li>';
//         $menu .= '<li><a href="login.php">ログアウト</a></li>';
//         return $menu;
//     } else {
//         $menu = '<li class="current"><a href="#">入力画面</a></li>';
//         $menu .= '<li><a href="select.php">メニュー選択画面</a></li>';
//         $menu .= '<li><a href="#">作成中</a></li>';
//         $menu .= '<li><a href="#">作成中</a></li>';
//         $menu .= '<li><a href="user_index.php">ユーザー登録</a></li>';
//         $menu .= '<li><a href="user_select.php">ユーザー一覧</a></li>';
//         $menu .= '<li><a href="login.php">ログアウト</a></li>';
//         return $menu;
//     }
// }


// function menu($kanri_flg)
// {
//     if ($kanri_flg == 0) {
//         $menu = '<li class="nav-item"><a class="nav-link" href="index.php">todo登録</a></li><li class="nav-item"><a class="nav-link" href="select.php">todo一覧</a></li>';
//         $menu .= '<li class="nav-item"><a class="nav-link" href="logout.php">ログアウト</a></li>';
//         return $menu;
//     } else {
//         $menu = '<li class="nav-item"><a class="nav-link" href="index.php">todo登録</a></li><li class="nav-item"><a class="nav-link" href="select.php">todo一覧</a></li><li class="nav-item"><a class="nav-link" href="user_index.php">ユーザー登録</a></li><li class="nav-item"><a class="nav-link" href="user_select.php">ユーザー一覧</a></li>';
//         $menu .= '<li class="nav-item"><a class="nav-link" href="logout.php">ログアウト</a></li>';
//         return $menu;
//     }
// }




function menu()
{
    $menu = '<li class="current"><a href="test.php">入力画面</a></li>';
    $menu .= '<li><a href="select.php">メニュー選択画面</a></li>';
    $menu .= '<li><a href="#">作成中</a></li>';
    $menu .= '<li><a href="#">作成中</a></li>';
    $menu .= '<li><a href="login.php">ログアウト</a></li>';
    return $menu;
}
function kanri_menu()
{
    $kanri_menu = '<li class="current"><a href="test.php">入力画面</a></li>';
    $kanri_menu .= '<li><a href="select.php">メニュー選択画面</a></li>';
    $kanri_menu .= '<li><a href="#">作成中</a></li>';
    $kanri_menu .= '<li><a href="#">作成中</a></li>';
    $kanri_menu .= '<li><a href="user_index.php">ユーザー登録</a></li>';
    $kanri_menu .= '<li><a href="user_select.php">ユーザー一覧</a></li>';
    $kanri_menu .= '<li><a href="login.php">ログアウト</a></li>';
    return $kanri_menu;
}
