<?php
require_once('../common/check_staff.php');
require_once('../common/head.php');
?>

<body>
  <?php

try {
  require_once('../common/common.php');

  $post = sanitize($_POST);
  $pro_code = $post['code'];
  $pro_image_name = $post['image_name'];

  require_once('../common/dbconnect.php');

  $sql = 'DELETE FROM mst_product WHERE code=?';
  $stmt = $dbh->prepare($sql);
  $data[] = $pro_code;
  $stmt->execute($data);

  $dbh = null;

  if ($pro_image_name != '') {
    unlink('./image/'. $pro_image_name);
  }

} catch(Exception $e) {
  print 'ただいま障害により大変ご迷惑をお掛けしております。';
  print $e;
  exit();
}
?>

    <?php require_once('../common/navi.php'); ?>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div>
          <h1 class="my-4">商品削除</h1>
          削除しました。
          <br/>
          <br/>
          <a href="pro_list.php">商品一覧へ</a>
        </div>
      </div>
    </div>

</body>

</html>