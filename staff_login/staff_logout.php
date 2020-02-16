<?php
session_start();
$_SESSION = array();
if (isset($_COOKIE[session_name()])) {
  setcookie(session_name(), '',time() - 420000, '/');
}
session_destroy();

require_once('../common/head.php');
?>

  <body>

    <?php require_once('../common/navi.php'); ?>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div>
          <h3 class="my-4">ログアウトしました。</h3>
          <br/>
          <a href="../staff_login/staff_login.php">ログイン画面</a>
        </div>
      </div>
    </div>

  </body>

  </html>