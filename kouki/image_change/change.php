<?php

if(isset($_POST['up'])){
    $img_size = getimagesize($_FILES['image']['tmp_name']);

    $file_name = mb_convert_encoding('C:/Users/iyasi/Pictures/' . $_FILES['image']['name'] , 'sjis','utf8');

    $img_in = imagecreatefromjpeg($file_name);

    $img_out = imagecreatetruecolor(100,100);

    imagecopyresampled($img_out,$img_in,0,0,0,0,100,100,$img_size[0],$img_size[1]);

    imagejpeg($img_out,'./img/a.jpg');

    imagedestroy($img_in);

    imagedestroy($img_out);
}



require_once './tpl/change.php';
?>