<?php require 'header.php'; ?>
<div class="user_wrapper">
<form action="login_output.php" method="post">
    ログイン名<input type="text" name="login"><br>
    パスワード<input type="text" name="password"><br>
    <input type="submit"  class="remove_top" value="ログイン">
</form>
</div>
<?php require 'footer.php'; ?>