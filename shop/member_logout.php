<?php
session_start();
$_SESSION = array();
if (isset($_COOKIE[session_name()]) == true) {
  setcookie(session_name(), '', time()-42000, '/');
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
          <h1 class="my-4">ログアウトしました。</h1>
          <a href="shop_list.php">商品一覧画面へ</a>
        </div>
      </div>
    </div>

  </body>

  </html>