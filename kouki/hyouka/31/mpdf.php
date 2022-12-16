<?php

// 呼出
require_once '../../config.php';
require_once PDF_PATH;

$link = mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME);
if(!$link){
    mysqli_close($link);
    exit;
}

$id = $_GET['id'];
$main_sql = "SELECT * FROM m_news WHERE id = '" . $id . "'";
$result = mysqli_query($link,$main_sql);

$list = [];
while($row = mysqli_fetch_assoc($result)){
$list[] = $row;
}



$mpdf = new \Mpdf\Mpdf([
    'fontdata' => [
        'ipa' => [
            'R' => 'ipag.ttf'
        ]
    ],
    'format' => 'A4-L',
    'mode' => 'ja'
]);

// PDFへ出力
$mpdf->WriteHTML('<h1>'.$list[0]['title'].'</h1>');
$mpdf->WriteHTML('<p>'.$list[0]['created_at'].'</p>');
$mpdf->WriteHTML('<br>');
$mpdf->WriteHTML('<p>'.$list[0]['content'].'</p>');
$mpdf->Output('dl_'.date('YmdHis').'.pdf','D');

?>