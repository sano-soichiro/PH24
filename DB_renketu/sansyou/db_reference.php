<?php
$row_list = [];
$link = mysqli_connect('localhost','root','','ph23_sample');
$result = mysqli_query($link,"SELECT name,age FROM sample WHERE name = '柿長'");
while($row = mysqli_fetch_assoc($result)){
    $row_list[] = $row;
}
mysqli_close($link);
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
    <?php foreach($row_list as $row_value){ ?>
    <tr>
        <?php foreach($row_value as $key => $value){ ?>
            <td><?php echo $key; ?></td>
            <td><?php echo $value; ?></td>
        <?php } ?>
    </tr>
    <?php } ?>
</table>
</body>
</html>