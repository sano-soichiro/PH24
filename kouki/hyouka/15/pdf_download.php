<?php
require_once '../../config.php';
require_once PDF_PATH;

$mpdf = new \Mpdf \Mpdf([
    'fontdata' => [
        'ipa' => [
            'R' => 'ipag.ttf'
        ]
    ],
    'format' => 'A4-P',
    'mode' => 'ja',
]);

// 情報抜出
$link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
if($link){
    mysqli_set_charset($link , 'utf-8');
    $sql = "SELECT * FROM m_news WHERE title LIKE '".$_GET['title']."';";
    $result = mysqli_query($link , $sql);
    $list = mysqli_fetch_assoc($result);
    mysqli_close($link);
}
var_dump($list);

// pdfへ出力
$mpdf -> WriteHTML('<hr>');
$mpdf -> WriteHTML('<p>'.$list['title'].'</p>');
$mpdf -> WriteHTML('<p>'.$list['content'].'</p>');
$mpdf -> Output('dl_'.date('YmdHis').'.pdf' , 'D');
?>