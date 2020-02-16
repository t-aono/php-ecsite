<?php
session_start();
session_regenerate_id(true);

$login_user = '';

if (isset($_SESSION['login']) === false) {
  require_once('../common/head.php');
?>

  <body>

    <?php require_once('../common/navi.php'); ?>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div>
          <h3 class="my-4">ログインされていません。</h3>
          <br/>
          <a href="../staff_login/staff_login.php">ログイン画面へ</a>
        </div>
      </div>
    </div>

  </body>

  </html>

  <?php exit(); ?>

  <?php
} else {
  $login_user = $_SESSION['staff_name'];
  $login_user .= ' さんログイン中';
}