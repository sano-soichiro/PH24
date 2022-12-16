<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/list.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <title>情報一覧</title>
</head>
<body>
    <div id="body">
        <div id="logo"><h1>BOOKS</h1></div>
        <div id="<?php echo $any_msg; ?>"><h2><?php echo $completion_msg; ?></h2></div>
        <form class="search" method="post" action="./list.php">
            <input type="text" name="where" value="">
            <button type="submit" name="check" value="search">検索</button>
        </form>
        <div id="all">
        <form method="post" action="./list.php">
            <div id="table">
                <table>
                    <tr class="t_head">
                        <td>画像</td>
                        <td>タイトル</td>
                        <td>巻数</td>
                        <td><button type="submit" name="order" value="asc"><i class="fas fa-arrow-circle-up"></i></button>価格<button type="submit" name="order" value="desc"><i class="fas fa-arrow-circle-down"></i></button></td>
                        <td>発売日</td>
                        <td>購入日</td>
                        <td>変更・削除</td>
                    </tr>
                        <?php foreach($list as $value): ?>
                            <tr>
                                <td><img src="<?php echo DIR_IMG . $value['id']; ?>.jpg" alt="noimg"></td>
                                <td><?php echo $value['title']; ?></td>
                                <td><?php echo $value['volume']; ?>巻</td>
                                <td><?php echo $value['price']; ?>円</td>
                                <td><?php echo $value['release_date']; ?></td>
                                <td><?php echo $value['purchase_date']; ?></td>
                                <td><a href="./update.php?id=<?php echo $value['id']; ?>"><i class="fas fa-edit"></i></a>　<a href="./delete.php?id=<?php echo $value['id']; ?>"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                </table>
                <h2><?php echo $no_db; ?></h2>
            </div>
            <input type="hidden" name="sql" value="<?php echo $query; ?>">
            <input type="hidden" name="sql_where" value="<?php echo $where; ?>">
            <button class="insert_btn" type="submit" name="check" value="list">単行本を登録する</button>
            <button class="down_btn" type="submit" name="check" value="csv">csvダウンロード</button>
        </form>
        </div>
    </div>
</body>
</html>