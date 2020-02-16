<?php
require_once('../common/check_staff.php');
require_once('../common/head.php');
?>

<body>

  <?php
  try {
    require_once('../common/dbconnect.php');

    $sql = 'SELECT code, name, price, image FROM mst_product';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

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
        <div class="col-lg-3 text-center">
          <h1 class="my-4">商品一覧</h1>
          <p>
            <a href="../staff_login/staff_top.php">トップメニュー</a>
          </p>
          <form method="post" action="pro_branch.php">
            <p class="text-center">
              <input class="btn btn-dark" type="submit" name="disp" id="disp" value="参照">
            </p>
            <p>
              <input class="btn btn-dark" type="submit" name="add" value="追加">
            </p>
            <p>
              <input class="btn btn-dark" type="submit" name="edit" value="修正">
            </p>
            <p>
              <input class="btn btn-dark" type="submit" name="delete" value="削除">
            </p>
            </from>
        </div>

        <div class="col-lg-9">
          <div class="row">
            <form method="post" action="pro_branch.php">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">商品名</th>
                    <th scope="col">価格</th>
                    <th scope="col">画像</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while(true) :
                    $rec = $stmt->fetch(PDO::FETCH_ASSOC); 
                    if($rec==false) break; 
                    if ($rec['image'] == '') $disp_image = '';
                    else $disp_image = '<img src="../product/image/'. $rec['image']. '"　class="img-responsive" height="100">';
                  ?>
                    <tr>
                      <td>
                        <input class="form-check-input" type="radio" id="<?= $rec['code'] ?>" name="procode" value="<?= $rec['code'] ?>">
                        <label class="form-check-label" for="<?= $rec['code'] ?>">
                          <?= $rec['name'] ?>
                        </label>
                      </td>
                      <td>
                        <?= number_format($rec['price']) ?> 円
                      </td>
                      <td>
                        <?= $disp_image ?>
                      </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
              </table>
            </form>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.col-lg-9 -->
      </div>
      <!-- /.row -->
    </div>

</body>

</html>