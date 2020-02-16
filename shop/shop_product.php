<?php
require_once('../common/check_member.php');
require_once('../common/head.php');
?>

<body>
  <?php

try {

  $pro_code = $_GET['procode'];

  require_once('../common/dbconnect.php');

  $sql = 'SELECT name, price, image FROM mst_product WHERE code=?';
  $stmt = $dbh->prepare($sql);
  $data[] = $pro_code;
  $stmt->execute($data);

  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  $pro_name = $rec['name'];
  $pro_price = $rec['price'];
  $pro_image_name = $rec['image'];

  $dbh = null;

  if ($pro_image_name == '') {
    $disp_image = '';
  } else {
    $disp_image = '<img src="../product/image/'. $pro_image_name. '">';
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
          <h1 class="my-4">商品情報参照</h1>
          <p class="font-weight-bold">商品コード</p>
          <p>
            <?= $pro_code; ?>
          </p>
          <p class="font-weight-bold">商品名</p>
          <p>
            <?= $pro_name; ?>
          </p>
          <p class="font-weight-bold">価格</p>
          <p>
            <?= number_format($pro_price); ?> 円
          </p>
          <p>
            <?= $disp_image; ?>
          </p>
          <input class="btn btn-light" type="button" onclick="history.back()" value="戻る">
          <a href="shop_cartin.php?procode=<?= $pro_code ?>" class="btn btn-dark">カートに入れる</a>
        </div>
      </div>
    </div>


</body>

</html>