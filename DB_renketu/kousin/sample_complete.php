<?php
$name = $_GET['name'];
$age = $_GET['age'];
$link = mysqli_connect('localhost','root','','ph23_sample');
mysqli_set_charset($link,'utf8');
mysqli_query($link,"INSERT INTO sample(name,age)VALUES('".$name."',".$age.")");
$id = mysqli_insert_id($link);
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
    <h1>登録完了</h1>
    <table>
        <tr>ID:<?php echo $id;?></tr>
        <tr>名前:<?php echo $name;?></tr>
        <tr>年齢:<?php echo $age;?></tr>
    </table>
    <p>で登録しました</p>
</body>
</html>