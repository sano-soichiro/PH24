<?php
require_once './../../config.php';
require_once './function/function.php';
require_once PDF_PATH;

// 指定の方法以外でこのページを開いた時の処理
if(!isset($_COOKIE['id'])){
    header("location: ./entry.php");
    exit;
}

// ログイン画面から来た時の処理
if(isset($_COOKIE['id'])){
    $id = $_COOKIE['id'];
    $data = sql_table_read(HOST , USER_ID , PASSWORD , DB_NAME , "SELECT name , file_name FROM m_user WHERE id = '" . $id . "';");
}

// ログアウトする処理
if(isset($_GET['logout'])){
    setcookie('id' , '' , time() - 60);
    header('location: ./login.php');
    exit;
}

// ニュース記事を押したときの処理
if(isset($_GET['news_id'])){
    $mpdf = new \Mpdf\Mpdf([
        'fontdata' => [
            'ipa' => [
                'R' => 'ipag.ttf'
            ]
        ],
    
        'format' => 'A4-L',
        'mode' => 'ja',
    ]);

    $sql = "SELECT title , content FROM m_news WHERE id = " . $_GET['news_id'] . ";";
    $news = sql_table_read(HOST , USER_ID , PASSWORD , DB_NAME , $sql);
    $mpdf -> WriteHTML('<div class="title"><h1 class="title_info">' . $news[0]['title'] . '</h1></div>');
    $mpdf -> WriteHTML('<hr>');
    $mpdf -> WriteHTML('<p>' . $news[0]['content'] . '</p>');
    $mpdf -> WriteHTML(file_get_contents('./css/pdf.css') , 1);
    $mpdf -> Output('dl_' . date('YmdHis') . '.pdf' , 'D');
}

// 
$page = 1;
//1ページで区切る数
$punctuate = 5;
//データの全件数
$all_cases = sql_count(HOST , USER_ID , PASSWORD , DB_NAME , "SELECT COUNT(*) FROM m_news ORDER BY created_at DESC;");
//全ページ数
$all_pages = ceil($all_cases / $punctuate);
//最初のページ
$first_page = 1;
//表示するデータの最初の番号
$show_list_lead = 0;
// nextボタン・backボタンを管理する配列
$up_down_list = [
    'up' => ['page' => 2 , 'class' => 'link'],
    'down' => ['page' => 1 , 'class' => 'link_none']
];
//ページリンクを管理する配列
$page_link_list =  [];

//ページが5ページ以上ある時の配列を整理する処理
if($all_pages >= 5){
    for($i=$first_page; $i<$first_page+5; $i++){
        $page_link_list[$i-1]['page'] = $i;
        if($i == 1){
            $page_link_list[$i-1]['class'] = 'link_none_page';
        }
        else{
            $page_link_list[$i-1]['class'] = 'link_page';
        }
    }
}
//ページが5ページない時の配列を整理する処理
else{
    for($i=$first_page; $i<$all_pages+1; $i++){
        $page_link_list[$i-1]['page'] = $i;
        if($i == 1){
            $page_link_list[$i-1]['class'] = 'link_none_page';
        }
        else{
            $page_link_list[$i-1]['class'] = 'link_page';
        }
    }
}


//ページ遷移する処理
if(isset($_GET['page'])){
    $page = floor($_GET['page']);
    //最大のページを求められた場合
    if($page == $all_pages){
        $show_list_lead = $all_pages * $punctuate - $punctuate;
        $up_down_list['up']['page'] = $all_pages;
        $up_down_list['up']['class'] = 'link_none';
        $up_down_list['down']['page'] = $all_pages - 1;
        $up_down_list['down']['class'] = 'link';
    }
    //最初のページを求められた場合
    elseif($page == $first_page){
        $show_list_lead = $first_page * $punctuate - $punctuate;
        $up_down_list['up']['page'] = $first_page + 1;
        $up_down_list['down']['page'] = $first_page;
    }
    //既定のページ数より上のページを求められた場合
    elseif($page > $all_pages){
        header('location: ./index.php?page=' . $all_pages);
    }
    //1ページより下のページを求められた場合
    elseif($page < $first_page){
        header('location: ./index.php?page=' . $first_page);
    }
    //範囲内のページを求められた場合
    else{
        $show_list_lead = $page * $punctuate - $punctuate;
        $up_down_list['up']['page'] = $page + 1;
        $up_down_list['down']['page'] = $page - 1;
        $up_down_list['down']['class'] = 'link';
    }

    // ページリンクを整理する処理
    if($page != $first_page){
        $page_link_list =  [];
        //ページリンクが5ページより下だった時
        if($all_pages < 5){
            for($i=0; $i<$all_pages; $i++){
                $page_link_list[$i]['page'] = $i + 1;
                if($i + 1 == $page){
                    $page_link_list[$i]['class'] = 'link_none_page';
                }
                else{
                    $page_link_list[$i]['class'] = 'link_page';
                }
            }
        }
        //ページ数が5ページ以上の時
        else{
            //2ページ目のリンクの処理
            if($page == $first_page + 1){
                for($i=0; $i<5; $i++){
                    $page_link_list[$i]['page'] = $i + 1;
                    if($i + 1 == $page){
                        $page_link_list[$i]['class'] = 'link_none_page';
                    }
                    else{
                        $page_link_list[$i]['class'] = 'link_page';
                    }
                }
            }
            //最終・最終一歩手前のページリンクの処理
            elseif($page == $all_pages || $page == $all_pages - 1){
                for($i=$all_pages-5; $i<$all_pages; $i++){
                    $page_link_list[$i]['page'] = $i + 1;
                    if($i + 1 == $page){
                        $page_link_list[$i]['class'] = 'link_none_page';
                    }
                    else{
                        $page_link_list[$i]['class'] = 'link_page';
                    }
                }
            }
            //それ以外のページリンクの処理
            else{
                for($i=$page-3; $i<$page+2; $i++){
                    $page_link_list[$i]['page'] = $i + 1;
                    if($i + 1 == $page){
                        $page_link_list[$i]['class'] = 'link_none_page';
                    }
                    else{
                        $page_link_list[$i]['class'] = 'link_page';
                    }
                }
            }
        }
    }
}


//表示するデータを配列に入れていく処理
$sql = "SELECT id , title , created_at FROM m_news ORDER BY created_at DESC LIMIT " . $show_list_lead . " , " . $punctuate . ";";
$show_list = sql_table_read(HOST , USER_ID , PASSWORD , DB_NAME , $sql);


// 表示する画面
require_once './tpl/index.php';
exit;