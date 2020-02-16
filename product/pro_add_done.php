<?php
require_once('../common/check_staff.php');
require_once('../common/head.php');
?>

<body>

  <?php

  try {
    require_once('../common/common.php');

    $post = sanitize($_POST);
    $pro_name = $post['name'];
    $pro_price = $post['price'];
    $pro_image_name = $post['image_name'];

    require_once('../common/dbconnect.php');

    $sql = 'INSERT INTO mst_product(name, price, image) VALUES (?, ?, ?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $pro_name;
    $data[] = $pro_price;
    $data[] = $pro_image_name;
    $stmt->execute($data);

    $dbh = null;

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
          <h1 class="my-4">スタッフ追加</h1>
          <?= $pro_name ?> を追加しました。
            <br/>
            <br/>
            <a href="pro_list.php">商品一覧へ</a>
        </div>
      </div>
    </div>

</body>

</html>