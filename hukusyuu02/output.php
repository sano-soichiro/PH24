<?php
$point = [];
$point[0][0] = $_GET['cs'];
$point[1][0] = $_GET['ph'];
$point[2][0] = $_GET['db'];

foreach($point as $p_key => $p_value){
    if($point[$p_key][0] < 60){
        $point[$p_key][1] = 'down';
    }else{
        $point[$p_key][1] = 'up';
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./iroduke.css">
    <title>Document</title>
</head>
<body>
<table border="1">
    <?php foreach($point as $p_key => $p_value): ?>
    <tr>
        <td><?php echo $p_key; ?></td>
        <td class="<?php echo $point[$p_key][1]; ?>"><?php echo $point[$p_key][0]; ?></td>
    <tr>
    <?php endforeach; ?>
</table>
<form action="./index.php">
        <button type="submit">戻る</button>
</form>
</body>
</html>