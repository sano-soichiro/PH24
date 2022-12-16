<header>
   <div id="header_logo_wrapper">
      <h1><img id="logo" src="./img/logo.png" alt="ロゴ"></h1>
      <div id="header_logo_text">
         <p>みんなの漫画管理サイト</p>
         <p>yomuca</p>
      </div>
   </div>
   <?php if(isset($_COOKIE['id'])): ?>   
      <div id="logout">
         <a href="index.php?state=logout"><i class="fas fa-sign-out-alt"></i><span>ログアウト</span></a>
      </div>
   <?php else: ?>
      <div id="logout">
         <a href="./login.php"><i class="fas fa-sign-in-alt"></i><span>ログイン</span></a>
      </div>
   <?php endif; ?>
</header>
