<form action="./entry.php" method="POST">
    <div class="input">
        <p>氏名</p>
        <input type="text" name="data[name]" value="<?php echo $log['name']; ?>">
    </div>
    <p><?php echo $err['name']; ?></p>

    <p>ログインID</p>
    <input type="text" name="data[login_id]" value="<?php echo $log['login_id']; ?>">
    <p><?php echo $err['login_id']; ?></p>

    <p>パスワード</p>
    <input type="text" name="data[password]">
    <p><?php echo $err['password']; ?></p>

    <p>メールアドレス</p>
    <input type="text" name="data[mail]" value="<?php echo $log['mail']; ?>">
    <p><?php echo $err['mail']; ?></p>

    <button type="submit" name="btn">確認</button>
</form>



<form action="./entry.php" method="POST">
    <p>氏名</p>
    <input type="text" name="data[name]" value="<?php echo $log['name']; ?>">
    <p><?php echo $err['name']; ?></p>

    <p>ログインID</p>
    <input type="text" name="data[login_id]" value="<?php echo $log['login_id']; ?>">
    <p><?php echo $err['login_id']; ?></p>

    <p>パスワード</p>
    <input type="password" name="data[password]">
    <p><?php echo $err['password']; ?></p>

    <p>メールアドレス</p>
    <input type="text" name="data[mail]" value="<?php echo $log['mail']; ?>">
    <p><?php echo $err['mail']; ?></p>

    <button type="submit" name="btn">確認</button>
</form>