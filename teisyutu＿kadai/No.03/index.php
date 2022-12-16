<?php
$name_msg = '';
$age_msg = '';
$uf_msg = '';
$id = '';
$extension = '';
$name = '';
$age = '';

require_once '../../const.php';

session_start();

// 登録ボタンを押したとき
if(isset($_POST['check']) && $_POST['check'] == 'complete'){

    $upload_file = $_FILES['upload_file'];
    $name = $_POST['name'];
    $age = $_POST['age'];

    // 名前・年齢の空白判定
    if($name == '' || !isset($name)){
        $name_msg = '氏名を入力してください';
    }

    // 年齢の数値判定
    if($age == '' || !isset($age)){
        $age_msg = '年齢を入力してください';
    }elseif(!is_numeric($age)){
        $age_msg = '年齢は数値で入力してください';
    }

    // 拡張子の判定
    if(!preg_match('/\.(jpeg|png|gif|jpg)$/i', $upload_file['name'])){
        $uf_msg = '拡張子はjpg/jpeg/png/gifのみ認められています';
    }

    // 登録情報の保存&登録一覧への遷移
    if($name_msg == '' && $name_msg == '' && $age_msg == '' && $uf_msg == ''){
        $link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
        mysqli_set_charset($link,'utf8');

        // idの最大値の取得
        $result = mysqli_query($link , "SELECT MAX(id) AS 'id' FROM sample2");
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        $id += 1;

        // 拡張子の取得
        $extension = pathinfo($upload_file['name'] , PATHINFO_EXTENSION);

        move_uploaded_file($upload_file['tmp_name'] , '../../img/' . $id . '.' . $extension);
        mysqli_query($link , "INSERT INTO sample2(name,age,ext) VALUES('". $name . "'," . $age . ",'" . $extension . "')");
        mysqli_close($link);

        $_SESSION['id'] = $id;
        $_SESSION['name'] = $name;
        $_SESSION['age'] = $age;
        $_SESSION['ext'] = $extension;

        // 登録一覧への遷移
        header('Location:./complete.php');
        exit;
    }

}
// viewの呼び出し
require_once './tpl/index.php';
?>