<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf=08">
<link rel="stylesheet" type="text/css" href="./css/style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/c62f1bb021.js" crossorigin="anonymous"></script>
<title>pager</title>
</head>
<body>


<div class="table">
    <table>
        <tr class="column">
            <td>タイトル</td>
            <td>巻数</td>
            <td>値段</td>
            <td>発売日</td>
        </tr>
        <?php
        foreach($show_list as $key => $list){ ?>
        <tr class="value_<?php echo $key%2; ?>">
            <td><?php echo $list['title']; ?></td>
            <td><?php echo $list['volume']; ?></td>
            <td><?php echo $list['price']; ?></td>
            <td><?php echo $release_list[$key]['year']; ?>年<?php echo $release_list[$key]['month']; ?>月<?php echo $release_list[$key]['day']; ?>日</td>

        </tr>
        <?php
        } ?>
    </table>
</div>


<div class="btn">
    <a href="./index.php?page=<?php echo $up_down_list['down']['page']; ?>" class="<?php echo $up_down_list['down']['class']; ?>">back</a>
    <?php
    foreach($page_link_list as $list){ ?>
        <a href="./index.php?page=<?php echo $list['page']; ?>" class="<?php echo $list['class'];?>"><?php echo $list['page']; ?></a>
    <?php
    } ?>
    <a href="./index.php?page=<?php echo $up_down_list['up']['page']; ?>" class="<?php echo $up_down_list['up']['class']; ?>">next</a>
</div>
</body>
</html>