<?php

// ダウンロードされるファイル名
$filename = 'ダウンロード.csv';

// ファイルタイプにMIMEタイプを指定
header('Content-Type: application/octet-stream');

// ファイルのダウンロード、リネームを指示
header('Content-Disposition: attachment; filename="'.$filename.'"');

// ここから下の出力内容がダウンロードされる
echo '1,2,3';
