<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td><p>氏名</p></td>
            <td><p>ph</p></td>
            <td><p>cs</p></td>
            <td><p>mk</p></td>
            <td><p>平均点</p></td>
        </tr>
        <?php foreach($student_list as $key => $val):?>
            <tr>
                <td><?php echo $val->get_name(); ?></td>
                <td class='<?php echo $val->get_fail_ph(); ?>'><?php echo $val->get_ph(); ?></td>
                <td class='<?php echo $val->get_fail_cs(); ?>'><?php echo $val->get_cs(); ?></td>
                <td class='<?php echo $val->get_fail_mk(); ?>'><?php echo $val->get_mk(); ?></td>
                <td><?php echo $val->get_avg(); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>