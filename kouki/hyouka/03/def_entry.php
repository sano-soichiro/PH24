<?php
require_once './initial_setting.php';
$error_msg = []; //エラーメッセージを格納する配列の宣言

if(isset($_POST["button"]) && $_POST["button"] == "input"){
   //==================================
   //●パスワードの確認
   //==================================
   //--データベースに接続する
   $link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
   //--sqlを設定する
   $sql = "select * from m_user where hash_login_id = '".$_POST["hash_login_id"]."'";
   //--sqlを実行する
   $result = db_run($link,$sql);
   //フェッチ処理
   $user_data = get_data($result);
   //パスワードが一致するかを確認
   if(!($user_data[0]['password'] == salt_hash($user_data[0]['stretch'],$user_data[0]['salt'],$_POST['password']))){
      $error_msg['password'] = 'パスワードが一致しません';
   }
   //==================================
   //●画像の形式チェック
   //==================================
   if(isset($_FILES['file'])){
      $format = filename_to_format($_FILES['file']['name']);
      if(!($format == 'jpg')){
         $error_msg['image'] = '画像ファイルはjpg形式のみ対応しています。';
      }
   }
   else{
      $error_msg['image'] = '画像ファイルを選択してください。';
   }
   //==================================
   //●エラーがない場合の処理
   //==================================
   if(error_count($error_msg) === 0){
      //-----------------------------------------------------
      //画像加工処理・保存処理
      //-----------------------------------------------------     
      //日本語ファイルに対応するためにエンコードする
      $file_name = mb_convert_encoding($_FILES['file']['name'],'sjis','utf8');
      //ディレクトリの作成
      if(!(file_exists("./images/user/" . $user_data[0]['id']))){
         mkdir("./images/user/" . $user_data[0]['id']);
      }
      //ファイルパスを変数に格納
      $file_pass = './images/user/' . $user_data[0]['id'] . '/' . $file_name;
      $thumb_file_pass = './images/user/' . $user_data[0]['id'] . '/thumb_' . $file_name;
      //imgフォルダに「元の画像」を保存する
      move_uploaded_file($_FILES['file']['tmp_name'] , $file_pass );    
      //アップロードされた画像のサイズを取得する
      $img_size = getimagesize($file_pass);
      //縮小後の画像サイズを計算する
      $after_size = after_shrink_size(70,60,$img_size[1],$img_size[0]);
      //背景の黒い新しい画像ファイルを作成(width,height)
      $img_out=ImageCreateTruecolor($after_size['width'],$after_size['height']);
      //元画像をメモリに読み込む
      if($img_size[2] == 1){
          $img_in=imagecreatefromgif($file_pass);
      }
      elseif($img_size[2] == 2){
          $img_in=imagecreatefromjpeg($file_pass);
      }
      elseif($img_size[2] == 3){
          $img_in=imagecreatefrompng($file_pass);
      }
      //PNG画像の場合、透過処理に関する設定を行う
      if($img_size[2] == 3){
          // アルファブレンディングをoffにする
          imagealphablending($img_out, false);
          // 完全なアルファチャネル情報を保存するフラグをonにする
          imagesavealpha($img_out, true);
      }
      //メモリ上に新しいサイズの画像を作成して、コピーする(コピー先,コピー元,コピー先のx座標,コピー先のy座標,コピー元のx座標,コピー元のy座標,コピー先の幅,コピー先の高さ,コピー元のの幅,コピー元の高さ)
      ImageCopyResampled($img_out,$img_in,0,0,0,0,$after_size['width'],$after_size['height'],$img_size[0],$img_size[1]);      
      //画像ファイルの書き出し
      if($img_size[2] == 1){
          Imagegif($img_out,$thumb_file_pass);
      }
      elseif($img_size[2] == 2){
          Imagejpeg($img_out,$thumb_file_pass);
      }
      elseif($img_size[2] == 3){
          Imagepng($img_out,$thumb_file_pass);
      }     
      //メモリの開放
      ImageDestroy($img_in);
      ImageDestroy($img_out);

      //データを登録する
      //--データベースに接続する
      $link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
      //--sqlを設定する
      $table = "m_user";
      $colomn = ["file_name","user_state"];
      $data = [$file_name,1];
      $conditions = "id = " . $user_data[0]['id'];
      $sql = create_update_sql($table,$colomn,$data,$conditions);
      //--sqlを実行する
      $result = db_run($link,$sql);

      header('location:./def_complete.php');
      exit;
      
   }
}
else{
   //==================================
   //●初回接続時
   //==================================
   //--データベースに接続する
   $link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
   //--sqlを設定する
   $sql = "select * from m_user where hash_login_id = '".$_GET["login_id"]."'";
   //--sqlを実行する
   $result = db_run($link,$sql);
   //フェッチ処理
   $user_data = get_data($result);
   //GETの値の退避
   $_POST['hash_login_id'] = $_GET['login_id'];
}
require_once './tpl/'.basename(__FILE__);
?>