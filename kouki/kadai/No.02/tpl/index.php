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
    <div id="all">
        <p>ようこそ<?php echo $name['name']; ?>さん</p>
        <table>
            <tr class="t_head">
                <td>タイトル</td>
                <td>巻数</td>
                <td>価格</td>
                <td>発売日</td>
            </tr>
            <?php foreach($book_list as $pk => $pv){ ?>
                <tr class="t_body<?php echo $pk % 2 == 0 ? 'k':'g'; ?>"><?php foreach($pv as $pvkey => $pv_val){ ?>
                    <td><?php echo $pv_val; echo $pvkey == 'price' ? '円': '';?></td>
                <?php } ?></tr>
            <?php } ?>
        </table>
        <div id="a">
            <a class='<?php echo $a_f_hide; ?>' href="./index.php?markstr=before&now=<?php echo $now; ?>">前へ</a>
            <?php foreach($page_link as $pl_key => $pl_val){ ?>
                <a class='<?php echo $pl_val['hide']; ?>' href="./index.php?markstr=link&now=<?php echo $page_link[$pl_key]['link']; ?>"><?php echo $page_link[$pl_key]['link'] + 1; ?></a>
            <?php } ?>
            <a class='<?php echo $a_l_hide; ?>' href="./index.php?markstr=next&now=<?php echo $now; ?>">次へ</a>
        </div>
        <a id="log" class="out" href="./index.php?markstr=out">ログアウト</a>
    </div>
</body>
</html>