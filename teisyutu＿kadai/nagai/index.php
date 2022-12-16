<?php
require_once './../../const.php';
require_once './func/function.php';



if(isset($_POST['btn'])){
    $csv = $_FILES['upload_csv'];
    $list = csv_read_secound($csv['tmp_name']);

    move_uploaded_file($csv['tmp_name'] , './csv/' . $csv['name']);

    foreach($list as $key => $value){
        $id = sql_registration(HOST , USER_ID , PASSWORD , DB_NAME , "INSERT INTO m_book(title , volume ,  price , release_date , purchase_date , del_date) VALUES('" . $list[$key][0] . "' , " . $list[$key][1] . " , " . $list[$key][2] . " , '" . $list[$key][3] . "' , '" . $list[$key][4] . "' , '" . $list[$key][5] . "');");
    }

    require_once './tpl/complete.php';
    exit;
}


require_once './tpl/index.php';
exit;