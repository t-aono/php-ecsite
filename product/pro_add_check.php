<?php
require_once('../common/check_staff.php');
require_once('../common/head.php');
?>

<body>

  <?php
require_once('../common/common.php');

$post = sanitize($_POST);

$pro_name = $post['name'];
$pro_price = $post['price'];
$pro_image = $_FILES['image'];

if ($pro_name == '') {
  print '商品名が入力されていません。<br/>';
}

if(preg_match('/\A[0-9]+\z/', $pro_price)==0) {
  print '価格の入力が正しくありません。<br/>';
}

if($pro_image['size'] > 0) {
  if($pro_image['size'] > 500000) {
    print '画像が大き過ぎます。';
  } else {
    move_uploaded_file($pro_image['tmp_name'], './image/'.$pro_image['name']);
  }
}

?>

    <?php require_once('../common/navi.php'); ?>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div>
          <h1 class="my-4">商品追加</h1>
          <p>商品名：
            <?= $pro_name ?>
          </p>
          <br/>
          <p>
            価格：
            <?= number_format($pro_price);?> 円
          </p>
          <br/>
          <img src="./image/<?= $pro_image['name'] ?>">
          <br/>
          <?php if ($pro_name == '' || preg_match('/\A[0-9]+\z/', $pro_price)==0 || $pro_image['size'] > 500000) : ?>
          <form>
            <input type="button" onclick="history.back()" value="戻る">
          </form>
          <? else : ?>
            上記の商品を追加します。
            <form method="post" action="pro_add_done.php">
              <input type="hidden" name="name" value="<?=$pro_name ?>">
              <input type="hidden" name="price" value="<?= $pro_price ?>">
              <input type="hidden" name="image_name" value="<?= $pro_image['name'] ?>">
              <br/>
              <input class="btn btn-light" type="button" onclick="history.back()" value="戻る">
              <input class="btn btn-dark" type="submit" value="OK">
            </form>
            <?php endif; ?>
        </div>
      </div>
    </div>

</body>

</html>