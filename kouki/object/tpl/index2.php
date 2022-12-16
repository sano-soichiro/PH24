<?php 
    require_once '../input.php';
    $value = 
    [
        'female' => '女',
        'male' => '男',
        'castum' => 'その他',
        'any' => '両方'
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php input::text('name','サノ'); ?>
    <?php input::select('select',$value,1) ?>
</body>
</html>