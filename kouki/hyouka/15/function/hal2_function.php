<?php
// DB全件取得
function sql_get_all_column($link,$table){
    $list = [];
    $query = "SELECT * FROM ".$table;
    $result = mysqli_query($link,$query);
    $row = mysqli_fetch_assoc($result);
    while($row){
        $list[] = $row;
        $row = mysqli_fetch_assoc($result);
    }
    mysqli_close($link);
    return $list;
}

// 配列を指定ページ数に分割
function page_split($list,$split){
    $page = [];
    $bookmark = 0;
    foreach($list as $key => $value){
        if($key % $split == 0 && $key != 0){
            $bookmark = $bookmark + 1;
        }
        $page[$bookmark][] = $value;
    }
    return $page;
}

// ソルトハッシュ
function solt_hash($hash,$solt,$stretch){
    $work = $hash;
    for($i=0;$i<$stretch;$i++){
        $work = md5($solt.$work);
    }
    return $work;
}

// 画像加工
function img_processing($files,$width,$height,$pass,$after_pass){
    if($files['file']['type'] == 'image/png'){
        $img_size = getimagesize($files['file']['tmp_name']);
        $file_name = mb_convert_encoding($files['file']['name'] , 'sjis','utf8');
        move_uploaded_file($files['file']['tmp_name'],$pass.$file_name);
        $img_in = imagecreatefrompng($pass.$file_name);
        if($width < $img_size[0] || $height < $img_size[1]){
            if($img_size[1] / $height >= $img_size[0] / $width){
                $weight = $img_size[1] / $height;
                $hei = $img_size[1] / $weight;
                $wid = $img_size[0] / $weight;
                $hei = floor($hei);
                $wid = floor($wid);
            }elseif($img_size[1] / $height < $img_size[0] / $width){
                $weight = $img_size[0] / $width;
                $hei = $img_size[1] / $weight;
                $wid = $img_size[0] / $weight;
                $hei = floor($hei);
                $wid = floor($wid);
            }
        }else{
            $wid = $img_size[0];
            $hei = $img_size[1];
        }
        $img_out=imagecreatetruecolor($wid,$hei);
        imagealphablending($img_out, false);
        imagesavealpha($img_out, true);
        imagecopyresampled($img_out,$img_in,0,0,0,0,$wid,$hei,$img_size[0],$img_size[1]);
        imagepng($img_out,$after_pass.$files['file']['name']);
        imagedestroy($img_in);
        imagedestroy($img_out);
    }elseif($files['file']['type'] == 'image/jpeg' || $files['file']['type'] == 'image/jpg'){
        $img_size = getimagesize($files['file']['tmp_name']);
        $file_name = mb_convert_encoding($files['file']['name'] , 'sjis','utf8');
        move_uploaded_file($files['file']['tmp_name'],$pass.$file_name);
        $img_in = imagecreatefromjpeg($pass.$file_name);
        if($width < $img_size[0] || $height < $img_size[1]){
            if($img_size[1] / $height >= $img_size[0] / $width){
                $weight = $img_size[1] / $height;
                $hei = $img_size[1] / $weight;
                $wid = $img_size[0] / $weight;
                $hei = floor($hei);
                $wid = floor($wid);
            }elseif($img_size[1] / $height < $img_size[0] / $width){
                $weight = $img_size[0] / $width;
                $hei = $img_size[1] / $weight;
                $wid = $img_size[0] / $weight;
                $hei = floor($hei);
                $wid = floor($wid);
            }
        }else{
            $wid = $img_size[0];
            $hei = $img_size[1];
        }
        $img_out=imagecreatetruecolor($wid,$hei);
        imagecopyresampled($img_out,$img_in,0,0,0,0,$wid,$hei,$img_size[0],$img_size[1]);
        imagejpeg($img_out,$after_pass.$files['file']['name']);
        imagedestroy($img_in);
        imagedestroy($img_out);
    }elseif($files['file']['type'] == 'image/gif'){
        $img_size = getimagesize($files['file']['tmp_name']);
        $file_name = mb_convert_encoding($files['file']['name'] , 'sjis','utf8');
        move_uploaded_file($files['file']['tmp_name'],$pass.$file_name);
        $img_in = imagecreatefromgif($pass.$file_name);
        if($width < $img_size[0] || $height < $img_size[1]){
            if($img_size[1] / $height >= $img_size[0] / $width){
                $weight = $img_size[1] / $height;
                $hei = $img_size[1] / $weight;
                $wid = $img_size[0] / $weight;
                $hei = floor($hei);
                $wid = floor($wid);
            }elseif($img_size[1] / $height < $img_size[0] / $width){
                $weight = $img_size[0] / $width;
                $hei = $img_size[1] / $weight;
                $wid = $img_size[0] / $weight;
                $hei = floor($hei);
                $wid = floor($wid);
            }
        }else{
            $wid = $img_size[0];
            $hei = $img_size[1];
        }
        $img_out=imagecreatetruecolor($wid,$hei);
        imagecopyresampled($img_out,$img_in,0,0,0,0,$wid,$hei,$img_size[0],$img_size[1]);
        imagegif($img_out,$after_pass.$files['file']['name']);
        imagedestroy($img_in);
        imagedestroy($img_out);
    }
}

// チェック関数
function err_check($list){
    $reg_str = "/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)+$/";
    $err_msg = [];
    $year = '';
    $month = '';
    $day = '';
    $flg = 0;
    foreach($list as $key => $value){
        if($key != 0){
            switch($value){
                case 'blank':
                    if(empty($list[0])){
                        $err_msg['blank'] = '必要項目です';
                        $flg = 1;
                    }elseif($list[0] == ''){
                        $err_msg['blank'] = '必要項目です';
                        $flg = 1;
                    }
                    break;
                case 'numeric':
                    if(!is_numeric($list[0])){
                        $err_msg['numeric'] = '数値を入力してください';
                        $flg = 1;
                    }elseif($list[0] < 0){
                        $err_msg['numeric'] = '数値は0以上で入力してください';
                        $flg = 1;
                    }
                    break;
                case 'mail':
                    if(!preg_match($reg_str , $list[0])){
                        $err_msg['mail'] = '正しいメールアドレスではないです';
                        $flg = 1;
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
                                    $flg = 1;
                                }
                            }
                        }else{
                            $err_msg['day'] = '正しい日付を入力してください';
                            $flg = 1;
                        }
                    }
                    break;
            }
        }
    }
    $err_msg['check'] = $flg;
    return $err_msg;
}

// ページャー

?>