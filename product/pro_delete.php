<?php
require_once('../common/check_staff.php');
require_once('../common/head.php');
?>

<body>
  <?php

  try {

    $pro_code = $_GET['procode'];

    require_once('../common/dbconnect.php');

    $sql = 'SELECT name, image FROM mst_product WHERE code=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $pro_code;
    $stmt->execute($data);

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $pro_name = $rec['name'];
    $pro_image_name = $rec['image'];

    $dbh = null;

    if ($pro_image_name == '') {
      $disp_image = '';
    } else {
      $disp_image = '<img src="./image/'. $pro_image_name. '">';
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
          <p class="font-weight-bold">商品コード</p>
          <p>
            <?= $pro_code; ?>
          </p>
          <p class="font-weight-bold">商品名</p>
          <p>
            <?= $pro_name; ?>
          </p>
          <p>
            <?= $disp_image; ?>
          </p>
          <p>この商品を削除してよろしいですか？</p>
          <br/>
          <form method="post" action="pro_delete_done.php">
            <input type="hidden" name="code" value="<?= $pro_code; ?>">
            <input type="hidden" name="image_name" value="<?= $pro_image_name; ?>">
            <input class="btn btn-light" type="button" onclick="history.back()" value="戻る">
            <input class="btn btn-dark" type="submit" value="OK">
          </form>
        </div>
      </div>
    </div>

</body>

</html>