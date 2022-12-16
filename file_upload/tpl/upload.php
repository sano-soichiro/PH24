<?php

$upload_file = $_FILES['upload_file'];

move_uploaded_file($upload_file['tmp_name'] , './img/.jpg');


require_once '../tpl/upload.php';
?>