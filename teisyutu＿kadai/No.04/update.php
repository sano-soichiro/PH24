<?php
require_once '../../const.php';
require_once './function/function.php';

$title = ''; $volume = ''; $price = ''; $release_date = ''; $purchase_date = '';
$t_err = '';$v_err = '';$p_err = '';$r_err = '';$pu_err = '';
$infomation = '';
$err_msg = [];
$check_flg = 0;

// 変更箇所idの取得
if(empty($_GET)){
    $id = $_POST['id'];
}else{
    $id = $_GET['id'];
}

// 変更をやめるとき
if(isset($_POST['check']) && $_POST['check'] == 'list'){
    header('Location:./list.php');
    exit;
}

// 変更する箇所の取得
$link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
if($link){
    mysqli_set_charset($link , 'utf8');
    $query = "SELECT * FROM m_book WHERE id = " . $id;
    $result = mysqli_query($link , $query);
    $infomation = mysqli_fetch_assoc($result);
    $infomation['release_date'] = str_replace('-' , '' , $infomation['release_date']);
    $infomation['purchase_date'] = str_replace('-' , '' , $infomation['purchase_date']);
    mysqli_close($link);
    $title = $infomation['title']; $volume = $infomation['volume']; $price = $infomation['price']; $release_date = $infomation['release_date']; $purchase_date = $infomation['purchase_date'];
}

// 更新ボタンが押された時
if(isset($_POST['check']) && $_POST['check'] == 'update'){
    $check_list = [];
    $title = $_POST['title']; $volume = $_POST['volume']; $price = $_POST['price']; $release_date = $_POST['release_date']; $purchase_date = $_POST['purchase_date'];
    $post_list = [$title , $volume , $price , $release_date , $purchase_date];
    $sorting = [ ['blank'] , ['blank' , 'numeric'] , ['blank' , 'numeric'] , ['blank' , 'numeric' , 'day'] , ['numeric' , 'day'] ];

    // チェック判定
    foreach($post_list as $post_key => $post_value){
        $check_list[0] = $post_value;
        foreach($sorting[$post_key] as $sort_value){
            $check_list[] = $sort_value;
        }
        $err_list[$post_key] = err_check($check_list);
        $check_list = [];
    }

    // チェック項目通過の確認
    foreach($err_list as $err_val){
        if(!empty($err_val)){
            $check_flg = 1;
        }
    }

    if($purchase_date == '' && empty($err_list[0]) && empty($err_list[1]) && empty($err_list[2]) && empty($err_list[3])){
        $check_flg = 0;
    }

    // エラーメッセージ取得
    foreach($err_list as $key => $value){
        foreach($value as $e_key => $e_value){
            switch($key){
                case 0:
                    if($e_key != 'blank'){
                        $t_err .= $e_value;
                        break;
                    }else{
                        $t_err .= $e_value;
                        break 2;
                    }
                case 1:
                    if($e_key != 'blank'){
                        $v_err .= $e_value;
                        break;
                    }else{
                        $v_err .= $e_value;
                        break 2;
                    }
                case 2:
                    if($e_key != 'blank'){
                        $p_err .= $e_value;
                        break;
                    }else{
                        $p_err .= $e_value;
                        break 2;
                    }
                case 3:
                    if($e_key != 'blank'){
                        $r_err .= $e_value;
                        break;
                    }else{
                        $r_err .= $e_value;
                        break 2;
                    }
                case 4:
                    if($purchase_date != ''){
                        if($e_key != 'blank'){
                            $pu_err .= $e_value;
                            break;
                        }else{
                            $pu_err .= $e_value;
                            break 2;
                        }
                    }else{
                        break 2;
                    }
            }
        }
    }

    // チェックをすべてクリアした時
    if($check_flg == 0){
        $link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
        if($link){
            mysqli_set_charset($link , 'utf8');
            $query = "UPDATE m_book SET title = '" . $title . "', volume = " . $volume . ", price =" . $price . ", release_date =" . $release_date . ", purchase_date =" . $purchase_date . " WHERE id =" . $id;
            if($purchase_date == ''){
                $query = "UPDATE m_book SET title = '" . $title . "', volume = " . $volume . ", price =" . $price . ", release_date =" . $release_date . ", purchase_date = NULL WHERE id =" . $id;
            }
            $result = mysqli_query($link , $query);
            if($result == false){
                echo '正しく実行されていません';
            }
            mysqli_close($link);
        }

        if(!empty($_FILES)){
            $upload_file = $_FILES['upload_file'];
            move_uploaded_file($upload_file['tmp_name'] , DIR_IMG . $id . '.jpg');
        }

        header('Location:./list.php?transition=update');
        exit;
    }

    // エラーの時に変更前の情報を取得
    $title = $infomation['title']; $volume = $infomation['volume']; $price = $infomation['price']; $release_date = $infomation['release_date']; $purchase_date = $infomation['purchase_date'];
}

require_once './tpl/update.php';
?>