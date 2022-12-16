<?php

// チェック関数
function err_check($list){
    $reg_str = "/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)+$/";
    $err_msg = [];
    $year = '';
    $month = '';
    $day = '';
    foreach($list as $key => $value){
        if($key != 0){
            switch($value){
                case 'blank':
                    if(empty($list[0])){
                        $err_msg['blank'] = '必要項目です';
                    }elseif($list[0] == ''){
                        $err_msg['blank'] = '必要項目です';
                    }
                    break;
                case 'numeric':
                    if(!is_numeric($list[0])){
                        $err_msg['numeric'] = '数値を入力してください';
                    }elseif($list[0] < 0){
                        $err_msg['numeric'] = '数値は0以上で入力してください';
                    }
                    break;
                case 'mail':
                    if(!preg_match($reg_str , $list[0])){
                        $err_msg['mail'] = '正しいメールアドレスではないです';
                    }
                    break;
                case 'day':
                    if(is_numeric($list[0])){
                        if(mb_strlen($list[0]) == 8){
                            if($list[0] != ''){
                                $year = substr($list[0] , 0 , 4);
                                $month = substr($list[0] , 4 , 2);
                                $day = substr($list[0] , 6);
                                if(!checkdate($month , $day , $year)){
                                    $err_msg['day'] = '正しい日付を入力してください';
                                }
                            }
                        }else{
                            $err_msg['day'] = '正しい日付を入力してください';
                        }
                    }
                    break;
            }
        }
    }
    return $err_msg;
}