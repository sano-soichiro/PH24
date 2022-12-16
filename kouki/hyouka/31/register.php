<?php

session_start();

// 呼出
require_once '../../config.php';

$link = mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME);
if(!$link){
    mysqli_close($link);
    exit;
}

mysqli_set_charset($link,'utf8');
if(isset($_GET['login_id'])){
    $hash_login_id = $_GET['login_id'];
    $_SESSION['login_id'] = $hash_login_id;
}else{
    $hash_login_id = $_SESSION['login_id'];
}

$sql = mysqli_query($link,"SELECT * FROM m_user WHERE hash_login_id = '" . $hash_login_id . "'");

// 登録データの表示
$list = [];
while($row = mysqli_fetch_assoc($sql)){
    $list[] = $row;
}
mysqli_close($link);

// 登録ボタンを押された時の処理
if(isset($_POST['register'])){

    $err = 0;
    $error = 'not_error';
    $err_msg = [];

    $password = $_POST['password'];
    $file_name = $_FILES['file']['name'];

    $stretch = $list[0]['stretch'];;
    $salt = $list[0]['salt'];
    $hashed_password = '';

    // パスワードをハッシュです！
    for($i = 0;$i < $stretch;$i++){
        $hashed_password = md5($salt.$password);
    }

    if($password == ''){
        $err_msg['password'] = 'パスワードを入力してください';
        $err++;
    }elseif($hashed_password != $list[0]['password']){
        $err_msg['password'] = '正しいパスワードを入力してください';
        $err++;
    }

    if($file_name == ''){
        $err_msg['file'] = '画像ファイルを選択してください';
        $err_msg['password'] = '正しいパスワードを入力してください';
        $err++;
    }else{
        // 拡張子取り出し
        $ext = strrchr($file_name,'.');
        $ext = substr($ext,1);
        if($ext != 'jpg'){
            $err_msg['password'] = 'パスワードを入力してください';
            $err_msg['file'] = '対応している拡張子を選択してください';
            $err++;
        }
    }

    // 正常時(エラーが0の)時の処理
    if($err == 0){

        $link = mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME);
        if(!$link){
            mysqli_close($link);
            exit;
        }
    
        $user_state = 1;
        $id = $list[0]['id'];

        $pass = "./images/user/".$id;
        if(!file_exists($pass)){
            mkdir($pass,0777);
        }

        // 拡張子取り出し
        $img_size = getimagesize($_FILES['file']['tmp_name']);


        // 日本語ファイル対応
        $file_name_convert = mb_convert_encoding($pass . '/' . $file_name , 'sjis','utf8');
        move_uploaded_file($_FILES['file']['tmp_name'] , $file_name_convert);

        // 画像ファイルのサイズを計算
        $num1 = $img_size[0] / 60; // 幅
        $num2 = $img_size[1] / 70; // 高さ
        
        if($num1 >= $num2){
            $num3 = 60 / $img_size[0];
        }else{
            $num3 = 70 / $img_size[1];
        }
        $width = $img_size[0] * $num3;
        $height = $img_size[1] * $num3;
        
        // 画像ファイルのコピーおよび画像ファイルの縮小拡大 (jpg)
	    $img_in=imagecreatefromjpeg($file_name_convert); // 元
	    $img_out=ImageCreateTruecolor($width,$height); // 新
	    ImageCopyResampled($img_out,$img_in,0,0,0,0,$width,$height,$img_size[0],$img_size[1]);
	    Imagejpeg($img_out,$pass.'/thumb_'.$file_name);

        ImageDestroy($img_in);
	    ImageDestroy($img_out);

        mysqli_set_charset($link,'utf8');
        mysqli_query($link,"UPDATE m_user SET user_state = " . $user_state . ", file_name = '" . $file_name .  "' WHERE hash_login_id = '" . $hash_login_id . "'");

        mysqli_close($link);
        header("location:./register_complete.php");
        exit;
    }else{
        $err_msg['password'] = 'パスワードを入力してください';
        $err_msg['file'] = '対応している拡張子を選択してください';
        $error = 'error';
    }

}else{
    $_POST['password'] = '';
    $_FILES['file'] = '';
}

require_once './tpl/register.php';

?>