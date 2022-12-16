<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf=08">
<link rel="stylesheet" type="text/css" href="./css/style.css">
<title>会員ページ</title>
</head>
<body>

<div class="info">
<div class="img"><img src="./images/user/<?php echo $id; ?>/thumb_<?php echo $data[0]['file_name']; ?>" alt=""></div>
    <p class="u_name"><?php echo $data[0]['name']; ?></p>
    <p class="logout"><a href="./index.php?logout=1" class="btn_logout">logout</a></p>
</div>




<div class="table">
    <table>
        <tr class="column">
            <td>タイトル</td>
            <td>日時</td>
        </tr>
        <?php
        foreach($show_list as $key => $list){ ?>
        <tr class="value_<?php echo $key%2; ?>">
            <td><a href="./index.php?page=<?php echo $page; ?>&news_id=<?php echo $list['id']; ?>"><?php echo $list['title']; ?></a></td>
            <td><?php echo $list['created_at']; ?></td>
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