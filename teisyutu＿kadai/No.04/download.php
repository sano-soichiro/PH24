<?php
require_once '../../const.php';

// csv表示一覧取得
$link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
mysqli_set_charset($link , 'utf-8');
$query = $_GET['sql'];
$result = mysqli_query($link , $query);
$row = mysqli_fetch_assoc($result);
while(!is_null($row)){
    $list[] = $row;
    $row = mysqli_fetch_assoc($result);
}
mysqli_close($link);

// csvダウンロード
$file_day = date('YmdHis');
$filename = "book_" . $file_day . ".csv";

// ファイルタイプにMIMEタイプを指定
header('Content-Type: application/octet-stream');

// ファイルのダウンロード、リネームを指示
header('Content-Disposition: attachment; filename="'.$filename.'"');

// csv書き込み
echo 'id,タイトル,巻数,値段,発売日,購入日,削除日' . "\n";
foreach($list as $csv_list => $value){
    echo $value['id'] . "," . $value['title'] . "," . $value['volume'] . "," . $value['price'] . "," . $value['release_date'] . "," . $value['purchase_date'] . "," . $value['del_date'] . "\n";
}
?>