<header>
   <div id="header_logo">
      <p><img src="./images/logo.png" alt="logo"></p>
      <p>NewsBird</p> 
   </div>
   <?php if(isset($_COOKIE['id'])): ?>   
      <div id="header_link">
         <a href="index.php?state=logout"><i class="fas fa-sign-out-alt"></i><span>ログアウト</span></a>
      </div>
   <?php else: ?>
      <div id="header_link">
         <a href="./login.php"><i class="fas fa-sign-in-alt"></i><span>ログイン</span></a>
      </div>
   <?php endif; ?>
   <div id="user_info">
      <div><img src="<?php echo $file_pass; ?>" alt=""></div>
      <p>ようこそ、<?php echo $user_name; ?>さん</p>
   </div>
   <div id="admin">
      <p>$_COOKIE['id']：<?php echo $cookie; ?></p>
      <p>session：<?php echo $session; ?></p>
      <p><i class="fas fa-question-circle" id="help"></i></p>
      <div id="help_msg">
         管理者用ツール判定条件<br>
         <br>
         $_COOKIE['id']判定条件：<br>
         isset($_COOKIE['id'])<br>
         <br>
         session判定条件：<br>
         isset($_SESSION) && count($_SESSION) > 0
      </div>
   </div>
</header>
<script src="./JS/jquery-3.3.1.min.js"></script>
<script src="./JS/help.js"></script>
