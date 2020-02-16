<?php
require_once('../common/check_staff.php');
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
    $pro_image_name_old = $rec['image'];

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
          <h1 class="my-4">商品修正</h1>
          <p>
            商品コード
            <br/>
            <?= $pro_code; ?>
          </p>
          <form method="post" action="pro_edit_check.php" enctype="multipart/form-data">
            <input type="hidden" name="code" value="<?= $pro_code; ?>">
            <input type="hidden" name="image_name_old" value="<?= $pro_image_name_old; ?>"> 商品名を入力してください。
            <br />
            <input type="text" name="name" style="width:200px" value="<?= $pro_name; ?>">
            <br /> 価格を入力してください。
            <br />
            <input type="text" name="price" style="width:50px" value="<?= $pro_price; ?>">
            <br /> 画像を選択してください。
            <br/>
            <input type="file" name="image" syle="width:400px">
            <br/>
            <br />
            <input class="btn btn-light" type="button" onclick="history.back()" value="戻る">
            <input class="btn btn-dark" type="submit" value="OK">
          </form>
        </div>
      </div>
    </div>

</body>

</html>