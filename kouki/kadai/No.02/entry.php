<?php
require_once '../../const.php';
require_once './function/hal2_function.php';

$id = '';
$name = '';
$pass = '';


if(isset($_POST['type'])){
    $name = $_POST['name'];
    $id = $_POST['id'];
    $pass = $_POST['pass'];

    // 未入力
    if($_POST['name'] == '' || $_POST['id'] == '' || $_POST['pass'] == ''){
        header('Location:./entry.php');
        exit;
    }

    // ソルト決め
    $work = chr(mt_rand(65,90));
    for($i=0;$i<mt_rand(0,100);$i++){
        $work = $work . chr(mt_rand(65,90));
    }
    $solt = $work;

    // ストレッチ回数
    $stretch = mt_rand(10000,100000);

    // ハッシュ化
    $hash = solt_hash($pass,$solt,$stretch);

    // DB登録
    $sql = "INSERT INTO m_member (name,login_id,password,password_str,password_cnt) VALUES ('".$name."','".$id."','".$hash."','".$solt."',".$stretch.");";
    $link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    mysqli_set_charset($link , 'utf-8');
    mysqli_query($link , $sql);
    mysqli_close($link);

    // 完了画面へ遷移
    header('Location:./complate.php');
    exit;
}
require_once './tpl/entry.php';
?>