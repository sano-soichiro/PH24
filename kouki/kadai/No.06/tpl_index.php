<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>タイトル</title>
<meta content="タイトル" name="title">
<meta content="ディスクリプション" name="description">
<meta content="キーワード" name="keywords">
<!-- <link rel="stylesheet" href="./css/reset.css">
<link rel="stylesheet" href="./css/style.css"> -->
<link href="./bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
<link href="./css/style.css" rel="stylesheet">
<script src="./js/jquery-1.12.0.min.js" charset="utf-8"></script>
<script src="./bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<script src="./js/sample.js"></script>
</head>
<body>
  <main class="container">
    <h1 class="my-5">確認用</h1>
    <hr>
    <section class="py-3">
      <div>
        <nav class="pagination-area">
          <?php $page->page_list($class ,'index.php'); ?>
        </nav>
        <table class="table table-bordered table-hover">
          <tr><th>身長</th><th>体重</th><th>BMI</th><th>標準体重</th><th>結果</th></tr>
          <?php foreach($page->get_data() as $user): ?>
          <tr>
            <td><?php echo $user->get_height(); ?></td>
            <td><?php echo $user->get_weight(); ?></td>
          <?php if($user->get_weight() != 0 && $user->get_height() != 0): ?>
            <td class="<?php echo $user->get_result_color(); ?> <?php echo $color_list[$user->get_result_color()]; ?>"><?php echo $user->get_bmi(); ?></td>
            <td class="<?php echo $color_list[$user->get_result_color()]; ?>"><?php echo $user->get_appropriate_weight(); ?></td>
            <td class="<?php echo $color_list[$user->get_result_color()]; ?>"><?php echo $user->get_result(); ?></td>
          </tr>
          <?php else: ?>
            <td colspan="4">-</td>
          <?php endif; ?>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </section>
    <hr>

  </main>

</body>

</html>
