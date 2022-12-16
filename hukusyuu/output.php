<?php
$point = [];
$point[] = $_GET['cs_point'];
$point[] = $_GET['ph_point'];
$point[] = $_GET['db_point'];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border="1">
    <?php foreach($point as $p_key => $p_value){ ?>
    <tr>
        <td><?php echo $p_key + 1; ?></td>
        <td><?php echo $p_value; ?></td>
    <tr>
    <?php } ?>
</table>
<form action="./index.php">
        <button type="submit">戻る</button>
</form>
</body>
</html>