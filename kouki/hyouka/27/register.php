<?php
session_start();
require_once './../../config.php';
require_once './function/function.php';

// エラー文を格納する変数
$err = [
    'password' => '',
    'img' => ''
];

// 指定の方法で来てなかったときの処理
if(!isset($_GET['login_id']) &&  !isset($_POST['btn'])){
    header("location: ./entry.php");
    exit;
}


// ログインIDをチェックする処理
if(isset($_GET['login_id'])){
    $sql = "SELECT id , name FROM m_user WHERE hash_login_id = '" . $_GET['login_id'] . "';";
    // 指定されたlogin_idが存在しなかったとき
    if(!$data = sql_table_read(HOST , USER_ID , PASSWORD , DB_NAME , $sql)){
        header("location: ./entry.php");
        exit;
    }

    // idをcsvに避難させる処理
    csv_writing('./csv/id.csv' , $data[0]['id']);
}


// 登録ボタンを押したときの処理
if(isset($_POST['btn'])){
    // idを取得
    $id = csv_read('./csv/id.csv');

    // パスワード・ソルト・ストレッチ登録する
    $sql = "SELECT name , password , salt , stretch FROM m_user WHERE id = '" . $id[0] . "';";
    $data = sql_table_read(HOST , USER_ID , PASSWORD , DB_NAME , $sql);

    // パスワードチェック
    if($_POST['password'] == ''){
        $err['password'] = '*未入力です';
    }
    elseif($data[0]['password'] != pass_hash($_POST['password'] , $data[0]['salt'] , $data[0]['stretch'])){
        $err['password'] = '*指定されたユーザーは存在しません';
    }

    
    if(isset($_FILES['img'])){
        $upload_file = $_FILES['img'];
        // ファイルチェック
        if(file_extension_check($upload_file['name'])){
            // 画像チェック
            if(!file_img_check($upload_file['name'])){
                $err['img'] = '*画像を選択してください';
            }
            // jpgかチェック
            elseif(!file_jpg_check($upload_file['name'])){
                $err['img'] = '*jpg画像を選択してください';
            }
        }else{
            $err['img'] = '*ファイルを選択してください';
        }
    }else{
        $err['img'] = '*ファイルを選択してください';
    }


    //エラーが出ていないかチェック
    if($err['password'] == '' && $err['img'] == ''){
        // csvに避難させたIDの削除
        csv_writing('./csv/id.csv' , '');

        // user_stateを1の状態にし、画像の名前を登録する
        $sql = "UPDATE m_user SET user_state = 1 , file_name = '" . $upload_file['name'] . "'  WHERE id = " . $id[0] . ";";
        sql_update(HOST , USER_ID , PASSWORD , DB_NAME , $sql);

        // フォルダ作成
        $folder = './images/user/' . $id[0];
        if(!file_exists($folder)){
            mkdir($folder  , 0700);
        }
        // 画像を登録
        move_uploaded_file($upload_file['tmp_name'] , $folder . '/' . $upload_file['name']);
        // 画像の情報を取得
        $img_info = getimagesize($folder . '/' . $upload_file['name']);
        // 画像の縮小サイズの決定
        $img_size = img_size_change($img_info[0] , $img_info[1] , 60 , 70);
        // 画像を縮小
        var_dump(img_shrink($folder . '/' , $upload_file['name'] , 'thumb_' . $upload_file['name'] , $img_size['width'] , $img_size['height']));

        
        // 登録完了画面へ移動
        $_SESSION['com'] = $id[0];
        header("location: ./completion.php");
        exit;
    }
}


//表示する画面
require_once './tpl/register.php';
exit;