<?php
require_once '../../const.php';
$row = '';
$day = '';
$completion_msg = '';
$no_db = '';
$list = [];
$where = '';
$any_msg = 'any_msg_no';
$query = "SELECT * FROM m_book WHERE del_date IS NULL ";

if(empty($_POST['sql_where'])){
    $sql_where = '';
}else{
    $sql_where = $_POST['sql_where'];
}


// 完了メッセージの表示
if(!empty($_GET)){
    switch($_GET['transition']){
        case 'insert':
            $completion_msg = '登録完了';
            $any_msg = 'any_msg';
            break;

        case 'update':
            $completion_msg = '変更完了';
            $any_msg = 'any_msg';
            break;

        case 'delete':
            $completion_msg = '削除完了';
            $any_msg = 'any_msg';
            break;
    }
}

// 追加ボタンが押された時
if(isset($_POST['check']) && $_POST['check'] == 'list'){
    header("Location:./insert.php");
    exit;
}

// 値段の昇順・降順
if(isset($_POST['order']) && $_POST['order'] == 'asc'){
    $order = $_POST['sql_where'] . "ORDER BY price ASC , release_date DESC";
}elseif(isset($_POST['order']) && $_POST['order'] == 'desc'){
    $order = $_POST['sql_where'] . "ORDER BY price DESC , release_date DESC";
}else{
    $order = "ORDER BY release_date DESC";
}

// あいまい検索
if(isset($_POST['check']) && $_POST['check'] == 'search'){
    if($_POST['where'] !== ''){
        $where = "AND title LIKE '%" . $_POST['where'] . "%' ";
        $query = $query . $where . $order;
    }else{
        $where = '';
        $query = $query . $where . $order;
    }
}else{
    $where = $sql_where;
    $query = $query . $order;
}

// 一覧取得
$link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
mysqli_set_charset($link , 'utf-8');
$result = mysqli_query($link , $query);
$row = mysqli_fetch_assoc($result);
while(!is_null($row)){
    $list[] = $row;
    $row = mysqli_fetch_assoc($result);
}
mysqli_close($link);


// 年月日の設定
foreach($list as $l_key => $l_value){
    $day = explode('-' , $l_value['release_date']);
    $list[$l_key]['release_date'] = $day[0] . "年" . $day[1] . "月" . $day[2] . "日";
    
    if($l_value['purchase_date'] != ''){
        $day = explode('-' , $l_value['purchase_date']);
        $list[$l_key]['purchase_date'] = $day[0] . "年" . $day[1] . "月" . $day[2] . "日";
    }else{
        $list[$l_key]['purchase_date'] = '-';
    }
}

// 検索項目なかった時のメッセージ
if(empty($list)){
    $no_db = '検索対象が見つかりませんでした';
}

// csv作成
if(isset($_POST['check']) && $_POST['check'] == 'csv'){
    $sql = $_POST['sql'];
    header('Location:./download.php?sql=' . $sql);
    exit;

}

require_once './tpl/list.php';
?>