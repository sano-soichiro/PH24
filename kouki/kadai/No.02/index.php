<?php
require_once '../../const.php';
$pager = [];
$bookmark = 0;
$mark = '';
$now = 0;
$a_f_hide = '';
$a_l_hide = '';
$a_n_hide = '';
$page_link = [];
$book_list = [];



// 初めて訪れた際
if(isset($_GET['markstr'])){
    $mark = $_GET['markstr'];
    $now = $_GET['now'];
    
    // ログアウト
    if($_GET['markstr'] == 'out'){
        setcookie('id',$list['login_id'],time()-100);
        header('Location:./login.php');
        exit;
    }
}

$now = floor($now);

// cokkieの有無
if(isset($_COOKIE['id'])){
    // 名前の取得
    $link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    if($link){
        mysqli_set_charset($link , 'utf-8');
        $sel_sql = "SELECT name FROM m_member WHERE '".$_COOKIE['id']."' LIKE login_id;";
        $result = mysqli_query($link , $sel_sql);
        $name = mysqli_fetch_assoc($result);
        mysqli_close($link);
    }

    // なんページできるかの確認
    $link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    if($link){
        mysqli_set_charset($link , 'utf-8');
        $sql = 'SELECT count(*) FROM m_book WHERE del_date IS NULL';
        $result = mysqli_query($link , $sql);
        $work = mysqli_fetch_assoc($result);
        mysqli_close($link);
    }
    $bookmark = $work['count(*)'] / 5;
    $bookmark = ceil($bookmark);

    // 現在ページの更新
    if($mark == 'before'){
        if($now >= 0){
            $now = $now - 1;
        }
    }elseif($mark == 'next'){
        if($now < $bookmark){
            $now = $now + 1;
        }
    }

    // 表示ページの取得
    $link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    if($link){
        mysqli_set_charset($link , 'utf-8');
        $lim = $now * 5;
        $sql = 'select title , volume , price , release_date from m_book WHERE del_date IS NULL ORDER BY release_date DESC LIMIT '.$lim.' , 5';
        $result = mysqli_query($link , $sql);
        $work = mysqli_fetch_assoc($result);
        while($work){
            $book_list[] = $work;
            $work = mysqli_fetch_assoc($result);
        }
        mysqli_close($link);
    }

    // ページ指定リンク作成
    for($i=0;$i<$bookmark;$i++){
        if($i >= 5){
            break;
        }
        if($bookmark - 2 > $now && $now > 1){
            $page_link[$i]['link'] = $now - 2 + $i;
        }elseif($bookmark - 2 <= $now && $now < $bookmark && $bookmark > 5){
            $page_link[$i]['link'] = $bookmark - 5 + $i;
        }else{
            $page_link[$i]['link'] = $i;
        }
        // 現在ページのリンク消去
        if($now == $page_link[$i]['link']){
            $a_n_hide = 'ima';
            $page_link[$i]['hide'] = $a_n_hide;
        }else{
            $a_n_hide = '';
            $page_link[$i]['hide'] = $a_n_hide;
        }
    }

    // urlパラメータに頭おかしい値が入ったとき
    if($now > $bookmark || $now < 0 || !is_numeric($now)){
        $now = 0;
        $page_link[0]['hide'] = 'ima';
    }

    // リンクの消去
    if($now == 0){
        $a_f_hide = 'sentou';
    }elseif($now == $bookmark - 1){
        $a_l_hide = 'saigo';
    }
}else{
    header('Location:./entry.php');
    exit;
}

require_once './tpl/index.php';
?>