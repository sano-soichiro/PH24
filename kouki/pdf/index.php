<?php
require_once '../vendor/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf([
    'fontdata' => [
        'ipa' => [
            'R' => 'ipag.ttf'
        ]
    ],
    'format' => 'A4-P',
    'mode' => 'ja',
]);

$style = file_get_contents('http://localhost/hal/HEW/HEW.php');

$mpdf -> WriteHTML($style);
$mpdf -> SetWatermarkText('社外秘');
$mpdf -> showWatermarkText = true;
$mpdf -> Output('test.pdf' , 'I');

?>