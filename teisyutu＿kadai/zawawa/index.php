<?php
//関数・定数の呼び出し
require_once './initial_setting.php';

if(isset($_POST['button']) && $_POST['button'] == 'submit'){
    $_upload_file = $_FILES['upload_file'];
    $array = open_csv($_upload_file['tmp_name']);
    $colomn = ['title','volume','price','release_date','purchase_date','del_date'];
    $sql = create_insert_sql('m_book',$colomn,$array);
    require_once 'db_run.php';
}

require_once './tpl/index.php';
?>