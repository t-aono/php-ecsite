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
          <h3 class="my-4">カートを空にしました。</h3>
          <a href="shop_list.php">商品画面へ</a>
        </div>
      </div>
    </div>

  </body>

  </html>