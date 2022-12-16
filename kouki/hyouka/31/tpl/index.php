<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title>INDEX</title>
</head>
<body>
<nav>
    <ul>
        <li class="phlove">PH24LOVE</li>
        <li class="profile">
            <div class="profile_img"><img class="img_icon" src="./images/user/<?php echo $id . '/thumb_' . $file_name;?>" alt=""></div>
            <p class="profile_name"><?php echo $name;?></p>
            <form method="post" action="./index.php" enctype="multipart/form-data" id="center">
                <button type="submit" name="logout" class="logout_button">LOGOUT</button>
            </form>
        </li>
    </ul>
</nav>
<div id="block_center_table" class="column">
    <h1 class="text_head">M_NEWS一覧</h1>
    <table>
        <?php foreach($list as $row){ ?>
        <tr>
            <td class="td_data name"><a href="mpdf.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></td>
            <td class="td_data created_at"><?php echo $row['created_at']; ?></td>
        </tr>
        <?php } ?>
    </table>
</div>
<div class="link_block">
    <a class="<?php echo $arrow_left; ?>" href="./index.php?pager_link=<?php echo $back; ?>"><</a>
        <?php for($i = $pager_start;$i <= $pager_max;$i++){?>
        <a class="<?php echo $pager_list[$i][1]; ?>" href="./index.php?pager_link=<?php echo $pager_list[$i][0]; ?>"><?php echo $i; ?></a>
        <?php } ?>
    <a class="<?php echo $arrow_right; ?>" href="./index.php?pager_link=<?php echo $next; ?>">></a>
</div>

</body>
</html>