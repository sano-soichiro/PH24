<!DOCTYPE html>
    <html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <table border=1>
        <?php foreach($list as $l_key => $l_val){ ?>
            <tr>
            <?php foreach($list[$l_key] as $l_value){ ?>
                <td><?php echo $l_value; ?></td>
            <?php } ?>
            </tr>
        <?php } ?>
    </table>
    </body>
    </html>