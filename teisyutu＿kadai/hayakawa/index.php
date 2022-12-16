<?php

if(isset($_POST['upload']) && $_POST['upload'] == 'upload'){

$upload_file = $_FILES['upload_file'];
move_uploaded_file($upload_file['tmp_name'],'./csv/m_book.csv');

$fp = fopen('./csv/m_book.csv','r');
while($val = fgets($fp)){
    $value = explode(',',$val);
    $list[] = $value;
}
fclose($fp);

// データベース接続してる
require_once '../../const.php';
$link = mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME );
mysqli_set_charset($link,'utf8');

//複数行INSERTしてる
foreach($list as $key => $row){
    $insert_sql = "INSERT INTO m_book ( title , volume , price , release_date , purchase_date , del_date) VALUES('" . $list[$key][0] . "'," . $list[$key][1] . "," . $list[$key][2] . ",'" . $list[$key][3] . "','" . $list[$key][4] . "','" . $list[$key][5]. "')";
    mysqli_query($link,$insert_sql);
}

//完了画面へ移動する
mysqli_close($link);
header("location:./complete.php");
exit;
}

require_once "./tpl/index.php";
?>