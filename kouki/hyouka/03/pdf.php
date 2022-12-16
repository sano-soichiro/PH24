<?php
require_once './initial_setting.php';
require_once PDF_PATH;
$mpdf = new \Mpdf\Mpdf ([
    'fontdata' => [
        'ipa' => [
            'R' => 'ipag.ttf'
        ]
    ],
    'format' => 'A4-P',
    'mode' => 'ja',
]);
$mpdf -> WriteHTML(file_get_contents(BASE_URL.'/03/document.php?id='.$_GET['id']));
$mpdf -> Output('dl_'.date('YmdHis').'.pdf','D');
?>