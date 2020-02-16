<?php
require_once('../common/check_staff.php');
require_once('../common/head.php');
?>

<body>

  <?php require_once('../common/navi.php'); ?>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div>
        <h1 class="my-4">ショップ管理トップメニュー</h1>
        <ul class="list-group">
          <a href="../staff/staff_list.php">
            <li class="list-group-item">スタッフ管理</li>
          </a>
          <a href="../product/pro_list.php">
            <li class="list-group-item">商品管理</li>
          </a>
          <a href="../order/order_download.php">
            <li class="list-group-item">注文履歴</li>
          </a>
          <a href="./staff_logout.php">
            <li class="list-group-item">ログアウト</li>
          </a>
      </div>
    </div>
  </div>
  </div>

</body>

</html>