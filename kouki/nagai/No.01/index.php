<?php
require_once './function/function.php';
require_once './../../const.php';

//1ページで区切る数
$punctuate = 5;
//データの全件数
$all_cases = sql_count(HOST , USER_ID , PASSWORD , DB_NAME , "SELECT COUNT(*) FROM m_book WHERE del_date IS NULL;");
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
            if($page == $first_page + 1){
                //2ページ目の時の処理
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
$show_list = sql_table_read(HOST , USER_ID , PASSWORD , DB_NAME , "SELECT title , volume , price , release_date FROM m_book WHERE del_date IS NULL  ORDER BY release_date DESC LIMIT " . $show_list_lead . " , " . $punctuate . ";");
foreach($show_list as $key => $value){
    $release_list[$key] = date_parse_from_format('Ymd' , $show_list[$key]['release_date']);
}


require_once './tpl/index.php';
exit;

