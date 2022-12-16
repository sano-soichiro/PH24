<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/index.css">
    <title>Document</title>
</head>
<body>
    <?php foreach($pager[$now] as $pk => $pv){ ?>
        <?php foreach($pv as $pv_val){ ?>
            <?php echo $pv_val; ?>
        <?php } ?><br>
    <?php } ?>
    <a class='<?php echo $a_f_hide; ?>' href="./index.php?markstr=before&now=<?php echo $now; ?>">前へ</a>
    <?php foreach($page_link as $pl_key => $pl_val){ ?>
        <a class='<?php echo $pl_val['hide']; ?>' href="./index.php?markstr=link&now=<?php echo $pl_key; ?>"><?php echo $page_link[$pl_key]['link']; ?></a>
    <?php } ?>
    <a class='<?php echo $a_l_hide; ?>' href="./index.php?markstr=next&now=<?php echo $now; ?>">次へ</a>
</body>
</html>