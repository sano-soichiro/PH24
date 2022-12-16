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
        <?php foreach($list1 as $val){ ?>
            <tr>
            <?php foreach($val as $val2){ ?>
                <td><?php echo $val2; ?></td>
            <?php } ?>
            <tr>
        <?php } ?>
    </table>

    <table border="1">
        <tr>
        <?php foreach($list2 as $val){ ?>
            <td><?php echo $val; ?></td>
        <?php } ?>
        </tr>
    </table>
</body>
</html>