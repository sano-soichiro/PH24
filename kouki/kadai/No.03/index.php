<?php
require_once './function/hal2_function.php';
require_once '../../const.php';

$list = [];

if(isset($_POST['up'])){
   // 画像加工・保管
   img_processing($_FILES,150,100,'./img/','./img/thumb_');

   // サニタイズ
   if(!empty($_POST)){
      foreach($_POST as $key => $value){
         $clean[$key] = htmlspecialchars($value,ENT_QUOTES);
      }
   }

   // DB登録
   $link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
   if($link){
      mysqli_set_charset($link , 'utf-8');

      // sqlインジェクション
      $msg = mysqli_real_escape_string($link,$clean['msg']);
      $sql = "INSERT INTO m_msg (msg,img) VALUES ('".$msg."','".$_FILES['file']['name']."');";
      mysqli_query($link , $sql);

      mysqli_close($link);
   }
}

// DB全件取得
$link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
   if($link){
      mysqli_set_charset($link , 'utf-8');
      $sql = "SELECT msg , img FROM m_msg ORDER BY id DESC;";
      $result = mysqli_query($link,$sql);

      $work = mysqli_fetch_assoc($result);
      while($work){
         $list[] = $work;
         $work = mysqli_fetch_assoc($result);
      }
      mysqli_close($link);
   }

require_once './tpl/index.php';
?>