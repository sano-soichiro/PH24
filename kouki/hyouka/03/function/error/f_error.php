<?php

//-------------------------------------------------------------------------
//●未入力チェック
//-------------------------------------------------------------------------
function not_entered_check($entered_value){
   if($entered_value == ""){
      return NOT_ENTERED;
   }
}

//-------------------------------------------------------------------------
//●年齢チェック
//-------------------------------------------------------------------------
function numeric_check($age){
   if($age == ""){
      return NOT_ENTERED;
   }
   elseif(!is_numeric($age)){
      return NOT_NUMERIC;
   }
   elseif($age < 0){
      return NOT_PLUS;
   }
}

//-------------------------------------------------------------------------
//●ファイルの形式チェック
//引数：$upload_file…$_FILESの内容が格納されている一次元連想配列
//引数：$format…対応形式を格納した一次元配列
//-------------------------------------------------------------------------
function format_check($upload_file,$format){
   if($upload_file['name'] == ''){
      return '';
   }
   $divided_file_name = explode('.',$upload_file['name']);
   $file_format = $divided_file_name[count($divided_file_name) - 1];
   if($file_format == ''){
      return FORMAT;
   }
   foreach($format as $value){
      if($value == $file_format || $value == strtolower($file_format)){
         return "";
      }
   }
   return FORMAT.'あなたがアップロードした形式は「'.$file_format.'」です。';
}

//-------------------------------------------------------------------------
//●日付の妥当性をチェックする
//引数…yyyymmddの八桁の半角数字
//-------------------------------------------------------------------------
function is_reasonable_date($date){
   //入力値がyyyymmddであるかチェックする
   if($date == ""){
      return NOT_ENTERED;
   }
   elseif(!is_numeric($date)){
      return NOT_NUMERIC;
   }
   elseif(!(strlen($date) == 8)){
      return NOT_DATE;
   }
   //入力値がyyyymmddである場合、妥当性をチェック
   $year = substr($date,0,4);
   $month = substr($date,4,2);
   $day = substr($date,6);
   if(checkdate($month,$day,$year)){
      return '';
   }
   else{
      return NOT_DATE;
   }
}

//-------------------------------------------------------------------------
//●メールアドレスの妥当性をチェックする
//引数…メールアドレス
//-------------------------------------------------------------------------
function is_reasonable_mail($address){
   if($address == ""){
      return NOT_ENTERED;
   }
   elseif(strpos($address,'@') === false || strpos($address,'@') === 0 || strpos($address,'@') === (strlen($address) - 1)){
      return NOT_MAIL;
   }
}

//-------------------------------------------------------------------------
//●一致・不一致（再確認用）のチェック
//引数…メールアドレス
//-------------------------------------------------------------------------

//-------------------------------------------------------------------------
//●エラーメッセージを格納エラーの個数を数える
//-------------------------------------------------------------------------

function error_count($error_msg){
   $count = 0;
   foreach($error_msg as $value){
      if(!$value == ""){
         $count ++;
      }
   }
   return $count;
}

?>