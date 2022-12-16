<?php
// ページに来た回かそうじゃないかの区別
if(isset($_POST['up']) && $_POST['up'] == 'ok'){
    require_once '../../const.php';
    $file = $_FILES['file'];
    $file_path = $file['tmp_name'];
    $up_list = [];
    $sample = 'INSERT INTO m_book (title,volume,price,release_date,purchase_date,del_date) VALUES (';
    $row = '';

    // csv系の処理
    $fp = fopen($file_path,'r');
    for($i=0;$row = fgets($fp);$i++){
        $up_list[$i] = explode(',',$row);
        // sqlに入力する際に文字列として入れる部分の改造
        $up_list[$i][0] = "'".$up_list[$i][0]."'";
        $up_list[$i][3] = "'".$up_list[$i][3]."'";
        $up_list[$i][4] = "'".$up_list[$i][4]."'";
        $up_list[$i][5] = "'".$up_list[$i][5]."'";
    }
    fclose($fp);

    // sql系の処理
    $link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
    mysqli_set_charset($link,'utf-8');
    // sqlに出力
    for($j=0;$j<$i;$j++){
        $up_list[$j][5] = str_replace("\r\n","",$up_list[$j][5]);
        $query = $sample.implode(',',$up_list[$j]).')';
        mysqli_query($link,$query);
    }
    mysqli_close($link);

    // 完了画面
    require_once './tpl/complete.php';
    exit;
}
require_once './tpl/index.php'
?>