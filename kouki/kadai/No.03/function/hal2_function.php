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
function img_processing($files,$width,$height,$pass){
    if($files['file']['type'] == 'image/png'){
        $img_size = getimagesize($files['file']['tmp_name']);
        $file_name = mb_convert_encoding($files['file']['name'] , 'sjis','utf8');
        move_uploaded_file($files['file']['tmp_name'],"./img/".$file_name);
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
        imagepng($img_out,'./img/thumb_'.$files['file']['name']);
        imagedestroy($img_in);
        imagedestroy($img_out);
    }elseif($files['file']['type'] == 'image/jpeg' || $files['file']['type'] == 'image/jpg'){
        $img_size = getimagesize($files['file']['tmp_name']);
        $file_name = mb_convert_encoding($files['file']['name'] , 'sjis','utf8');
        move_uploaded_file($files['file']['tmp_name'],"./img/".$file_name);
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
        imagejpeg($img_out,'./img/thumb_'.$files['file']['name']);
        imagedestroy($img_in);
        imagedestroy($img_out);
    }elseif($files['file']['type'] == 'image/gif'){
        $img_size = getimagesize($files['file']['tmp_name']);
        $file_name = mb_convert_encoding($files['file']['name'] , 'sjis','utf8');
        move_uploaded_file($files['file']['tmp_name'],"./img/".$file_name);
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
        imagegif($img_out,'./img/thumb_'.$files['file']['name']);
        imagedestroy($img_in);
        imagedestroy($img_out);
    }
}
?>