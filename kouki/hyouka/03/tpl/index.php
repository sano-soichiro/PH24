<!DOCTYPE html>
<html lang = "ja">

   <head>
      <meta charset="UTF-8">
      <title>NewsBird | 会員登録</title>
      <?php require_once './tpl/style.php'; ?>
      <link href="./css/index.css" rel="stylesheet" type="text/css">
   </head>

   <body>
      <?php require_once './tpl/header.php'; ?>
      <main>
         <div id="title_box" class="<?php echo $backbround; ?>">
            <div id="title_wrapper">
               <h1>こんばんは、<?php echo $user_data[0]['name']; ?>さん</h1>
               <p>現在は
                   <span id="year"><?php echo $year; ?></span>年
                   <span id="month"><?php echo $month; ?></span>月
                   <span id="date"><?php echo $day; ?></span>日 
                   <span id="hour"><?php echo $hour; ?></span>
                   <span id="colon">:</span>
                   <span id="minute"><?php echo $minutes; ?></span> 
                   です
               </p>
               <p class="title_msg">
                  <?php echo $msg; ?><br>
                  NewsBirdでは常に最新の情報を取り揃えています<br>
                  タイトルをクリックするとニュースを読むことができます<br>
                  また、PDFダウンロードを行うことでオフラインでニュースを読むことも可能です
               </p>
            </div>
            <img src="./images/undraw_newspaper_k-72-w.svg" alt="">
         </div>
         <h2>NEWS</h2>
         <table>
            <?php foreach($display_data as $key => $value): ?>
               <tr class="box">
                  <td><?php echo $date_data[$key]; ?></td>
                  <td><a class="link" href="./pdf.php?id=<?php echo $value['id'] ?>"><?php echo $value['title']; ?></a></td>
                  <td class="print">本文をPDFで保存</td>
               </tr>
            <?php endforeach; ?>   
         </table>
         <div id="pager">
            <p>
               <a class="<?php echo $button['back']; ?> pager_button_m" href="index.php?now_page=1">≪最初へ</a>
            </p>
            <p><a class="<?php echo $button['back']; ?> pager_button_m" href="index.php?now_page=<?php echo $_GET["now_page"] - 1; ?>">&lt;戻る</a></p>
   
            <?php foreach($pager_list as $num): ?>
               <p><a class="<?php echo $color[$num - 1]; ?> pager_button_s" href="index.php?now_page=<?php echo $num; ?>"><?php echo $num; ?></a></p>
            <?php endforeach; ?>
   
            <p><a class="<?php echo $button['go']; ?> pager_button_m" href="index.php?now_page=<?php echo $_GET["now_page"] + 1; ?>">進む></a></p>
            <p><a class="<?php echo $button['go']; ?> pager_button_m" href="index.php?now_page=<?php echo $pager_count; ?>">最後へ≫</a></p>
         </div>
      </main>
      <script src="./JS/jquery-3.3.1.min.js"></script>
      <script src="./JS/index_event.js"></script>
   </body>   
</html>