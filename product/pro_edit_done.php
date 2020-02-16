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
    $pro_name = $post['name'];
    $pro_price = $post['price'];
    $pro_image_name_old = $post['image_name_old'];
    $pro_image_name = $post['image_name'];

    require_once('../common/dbconnect.php');

    $sql = 'UPDATE mst_product SET name=?, price=?, image=? WHERE code=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $pro_name;
    $data[] = $pro_price;
    $data[] = $pro_image_name;
    $data[] = $pro_code;
    $stmt->execute($data);

    $dbh = null;

    if ($pro_image_name_old != $pro_image_name) {
      if ($pro_image_name_old != '' && file_exists($pro_image_name_old)) {
        unlink('./image/'. $pro_image_name_old);
      }
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
          <h1 class="my-4">商品修正</h1>
          <?= $pro_name ?> を修正しました。
            <br/>
            <br/>
            <a href="pro_list.php">商品一覧へ</a>
        </div>
      </div>
    </div>

</body>

</html>