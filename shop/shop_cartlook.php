<?php
require_once('../common/check_member.php');
require_once('../common/head.php');
?>

<body>
  <?php

  if (isset($_SESSION['cart']) == true) {
    $cart = $_SESSION['cart'];
    $amount = $_SESSION['amount'];
    $max = count($cart);
  } else {
    $max = 0;
  }

  if ($max == 0) {
    print '<div class="container"><div class="row"><div>';
    print '<p>カートに商品がありません。</p>';
    print '<br>';
    print '<a href="shop_list.php" class="btn btn-light">商品一覧へ戻る</a>';
    print '</div></div></div>';
    exit();
  }

  try {

    require_once('../common/dbconnect.php');

    foreach ($cart as $key=>$val) {
      $sql = 'SELECT code, name, price, image FROM mst_product WHERE code =?';
      $stmt = $dbh->prepare($sql);
      $data[0] = $val;
      $stmt->execute($data);

      $rec = $stmt->fetch(PDO::FETCH_ASSOC);

      $pro_name[] = $rec['name'];
      $pro_price[] = $rec['price'];
      if ($rec['image'] == '') $pro_image[] = '';
      else $pro_image[] = '<img src="../product/image/'.$rec['image'].'" style="width:200px;">';
    }

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
          <h1 class="my-4">カートの中身</h1>
          <form method="post" action="amount_change.php">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">商品</th>
                  <th scope="col">商品画像</th>
                  <th scope="col">価格</th>
                  <th scope="col">数量</th>
                  <th scope="col">小計</th>
                  <th scope="col">削除</th>
                </tr>
              </thead>
              <tbody>
                <?php for($i=0;$i<$max;$i++): ?>
                <tr>
                  <td>
                    <?= $pro_name[$i] ?>
                  </td>
                  <td>
                    <?= $pro_image[$i] ?>
                  </td>
                  <td>
                    <?= number_format($pro_price[$i]) ?>円</td>
                  <td>
                    <input type="number" name="amount<?= $i ?>" value="<?= $amount[$i] ?>">
                  </td>
                  <td>
                    <?= number_format($pro_price[$i] * $amount[$i]) ?>円</td>
                  <td>
                    <input type="checkbox" name="delete<?= $i ?>">
                  </td>
                </tr>
                <?php endfor; ?>
            </table>
            <br/>
            <input type="hidden" name="max" value="<?= $max ?>">
            <input class="btn btn-light" type="button" onclick="history.back()" value="戻る">
            <input class="btn btn-dark" type="submit" value="変更">
          </form>
          <br/>
          <a href="shop_form.php">ご購入手続きへ進む</a>
          <br/>
          <br/>
          <?php
          if (isset($_SESSION['member_login'])) {
            print '<a href="shop_simple_check.php">会員かんたん注文へ進む</a>';
            print '<br/>';
            print '<br/>';
          }
          ?>
            <a href="clear_cart.php">カートを空にする</a>
        </div>
      </div>
    </div>
    <br/>

</body>

</html>