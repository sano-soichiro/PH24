<?php
//関数・定数の呼び出し
require_once './initial_setting.php';

//初期設定
$num_per_page = 5; //１ページあたりの表示件数

//何件あるかをDBで求めます。
//初期化
$data = [];
//データベースに接続する
$link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
//sqlを設定する
$sql = "select count(*) as 'count' from m_book where del_date is null";
//sqlを実行する
$result = db_run($link,$sql);
//フェッチ処理
$data = get_data($result);

//ページャーナンバー個数を求めます
$pager_count = get_pager_num($data[0]['count'],$num_per_page);

//検索結果が何件か
$sub_msg = '登録されている '.$data[0]['count'].' 件のデータ';
//一件も該当しない場合
if(count($data) == 0){
   $no_hit_msg = "データが登録されていません。";
}

//「今何ページ目なのか」を司る変数の初期設定
if(!isset($_GET['now_page'])){
   $_GET['now_page'] = 1;
}
else{
   if($_GET['now_page'] < 1 || $_GET['now_page'] > $pager_count || (!is_numeric($_GET['now_page']))){
      $_GET['now_page'] = 1;
   }
}

//データを取り出す
//初期化
$data = [];
//データベースに接続する
$link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
//sqlを設定する
$sql = "SELECT * FROM m_book WHERE del_date IS NULL ORDER BY release_date DESC";
//何行目から何件分？
//何行目から
$start_row = ($_GET['now_page'] - 1) * $num_per_page; 
$sql = $sql." LIMIT ".$start_row.",".$num_per_page;
//sqlを実行する
$result = db_run($link,$sql);
//フェッチ処理
$data = get_data($result);
$display_data = $data;

//ページナンバーのclass属性値を格納するための配列
$color = set_pager_class($_GET['now_page'],$pager_count);
$button = set_pager_class_button($_GET['now_page'],$pager_count);
$pager_list = pager_number($_GET['now_page'],$pager_count,$num_per_page);

require_once './tpl/index.php';
?>