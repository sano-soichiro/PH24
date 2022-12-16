<?php
//関数の呼び出し
require_once './func.php';
$list = get_data('./sample.csv');

//帰ってきた値のチェック
if($list === false){
    require_once './tpl_error.php';
    exit;
}

//allokの時のview部分の呼び出し
require_once './tpl_index.php';
?>