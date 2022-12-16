<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/complete.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div id="cover">
        <div id="title">
            <h1>会員登録</h1>
        </div>
        <div id="c_a_group">
            <div id="comp">
                <p><?php echo $comp_msg; ?></p>
                <div id="comp_table">
                    <table>
                        <tr>
                            <td class="td_left">ID</td>
                            <td class="td_right"><?php echo $id; ?></td>
                        </tr>
                        <tr>
                            <td class="td_left">氏名</td>
                            <td class="td_right"><?php echo $name; ?></td>
                        </tr>
                        <tr>
                            <td class="td_left">年齢</td>
                            <td class="td_right"><?php echo $age; ?></td>
                        </tr>
                        <tr>
                            <td class="td_left">画像</td>
                            <td class="c_t_img td_right"><img src="../../img/<?php echo $id; ?>.<?php echo $ext; ?>" alt=""></td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <div id="all">
                <h2>会員一覧</h2>
                <div id="all_table">
                    <table>
                        <tr>
                            <td>氏名</td>
                            <td>画像</td>
                        </tr>
                        <?php foreach($list as $key => $human): ?>
                            <tr>
                                <td class="name_td"><a href="./detail.php?id=<?php echo $human['id'];?>"  target="_blank"><?php echo $human['name']; ?>様</a></td>
                                <td class="img_td"><img src="../../img/<?php echo $human['id']; ?>.<?php echo $human['ext']; ?>" alt=""></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
        <div id="target"><a href="./index.php" target="_blank">TOPへ</a></div>
    </div>
</body>
</html>