<?php
require_once './sample.php';
$pager = [];
$bookmark = 0;
$mark = '';
$now = 0;
$a_f_hide = '';
$a_l_hide = '';
$a_n_hide = '';
$page_link = [];

// 初めて訪れた際
if(isset($_GET['markstr'])){
    $mark = $_GET['markstr'];
    $now = $_GET['now'];
}

// なんページできるかの確認
foreach($user_list as $key => $value){
    if($key % 5 == 0 && $key != 0){
        $bookmark = $bookmark + 1;
    }
    $pager[$bookmark][] = $value;
}

// ページ指定リンク作成
foreach($pager as $page_key => $page_val){
    $page_link[$page_key]['link'] = $page_key + 1;
    // 現在ページのリンク消去
    if($now == $page_key){
        $a_n_hide = 'ima';
        $page_link[$page_key]['hide'] = $a_n_hide;
    }else{
        $a_n_hide = '';
        $page_link[$page_key]['hide'] = $a_n_hide;
    }
}

// 現在のページ設定
if($mark == 'before'){
    foreach($page_link as $pakey => $paval){
        if($paval['hide'] == 'ima'){
            $page_link[$pakey]['hide'] = '';
        }
    }
    $a_n_hide = 'ima';
    $page_link[$now - 1]['hide'] = $a_n_hide;
}
elseif($mark == 'next'){
    foreach($page_link as $pakey => $paval){
        if($paval['hide'] == 'ima'){
            $page_link[$pakey]['hide'] = '';
        }
    }
    $a_n_hide = 'ima';
    $page_link[$now + 1]['hide'] = $a_n_hide;
}


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

// urlパラメータに頭おかしい値が入ったとき
if($now > $bookmark || $now < 0 || !is_numeric($now)){
    $now = 0;
    $page_link[0]['hide'] = 'ima';
}

// リンクの消去
if($now == 0){
    $a_f_hide = 'sentou';
}elseif($now == $bookmark){
    $a_l_hide = 'saigo';
}

require_once './tmp/index.php';
?>