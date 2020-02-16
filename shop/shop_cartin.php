<?php
require_once('../common/check_member.php');
require_once('../common/head.php');
?>

<body>
  <?php
try {
  
  $pro_code = $_GET['procode'];
  
  if (isset($_SESSION['cart']) == true) {
    $cart = $_SESSION['cart'];
    $amount = $_SESSION['amount'];

    if (in_array($pro_code,$cart) == true) {
      print 'その表品はすでにカートに入っています。<br>';
      print '<a href="shop_list.php">商品一覧に戻る</a>';
      exit();
    }
  }

  $cart[] = $pro_code;
  $amount[] = 1;
  $_SESSION['cart'] = $cart;
  $_SESSION['amount'] = $amount;

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
          <br/>
          <p>カートに追加しました。</p>
          <a href="shop_list.php" class="btn btn-light">商品一覧に戻る</a>
        </div>
      </div>
    </div>

</body>

</html>