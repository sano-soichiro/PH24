<!DOCTYPE html>
<html lang = "ja">

<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="./css/common.css">
   <link rel="stylesheet" href="./css/header.css">
   <link rel="stylesheet" href="./css/list.css">
   <link rel="icon" type="image/x-icon" href="./img/favicon.png">
   <script src="https://kit.fontawesome.com/03ebcee952.js" crossorigin="anonymous"></script>
   <?php require_once './tpl/font.php'; ?>
   <title>一覧画面</title>
</head>

<body>
   <?php require_once './tpl/header.php'; ?>
   <main>
      <p>ようこそ、<?php echo $user_data[0]['name']; ?>さん</p>
      <div id="list_wrapper">
         <p class="description"><?php echo $sub_msg; ?></p>
            <?php foreach($display_data as $key => $value): ?>
               <div class="list_item <?php echo $key % 2 == 0 ? 'pattern1' : 'pattern2' ;?>">
                  <div class="pictures">
                     <img src="./<?php echo no_image(DIR_IMG.$value['id'].'.jpg','./img/no_image.png'); ?>" alt="">
                  </div>
                  <div class="list_text_wrapper">
                     <p><?php echo $value['title']; ?>　　<?php echo $value['volume']; ?>巻</p>
                     <p>商品単価：<?php echo $value['price']; ?>円</p>
                     <p>発売日：<?php echo date_format_change($value['release_date'],'-','yyyy年mm月dd日'); ?></p>
                        <p>購入日：<?php echo is_null($value['purchase_date']) ? '' : date_format_change($value['purchase_date'],'-','yyyy年mm月dd日'); ?></p>
                     </div>
                  </div>
               <?php endforeach; ?>

               <p><?php echo isset($no_hit_msg) ? $no_hit_msg : '' ; ?></p>

               <?php if(!isset($no_hit_msg)): ?>
                  <div id="pager">
                     <p>
                        <a class="<?php echo $button['back']; ?>" href="index.php?now_page=1">≪</a>
                     </p>
                     <p><a class="<?php echo $button['back']; ?>" href="index.php?now_page=<?php echo $_GET["now_page"] - 1; ?>"><</a></p>

                     <?php foreach($pager_list as $num): ?>
                        <p><a class="<?php echo $color[$num - 1]; ?>" href="index.php?now_page=<?php echo $num; ?>"><?php echo $num; ?></a></p>
                     <?php endforeach; ?>

                     <p><a class="<?php echo $button['go']; ?>" href="index.php?now_page=<?php echo $_GET["now_page"] + 1; ?>">></a></p>
                     <p><a class="<?php echo $button['go']; ?>" href="index.php?now_page=<?php echo $pager_count; ?>">≫</a></p>
                  </div>
               <?php endif; ?>
         </p>
      </div>
   </main>
   <script src="./JS/jquery-3.3.1.min.js"></script>
   <script src="./JS/close.js"></script>
</body>
</html>