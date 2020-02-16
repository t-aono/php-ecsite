<?php
require_once('../common/check_member.php');
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

        <div class="col-lg-3">
          <h1 class="my-4">商品一覧</h1>
          <ul class="list-group">
            <a href="shop_cartlook.php">
              <li class="list-group-item">カートを見る</li>
            </a>

            <?php if (isset($_SESSION['member_login']) === false ) : ?>
            <?php print '<a href="member_login.php"><li class="list-group-item">会員ログイン</li></a>'; ?>
            <?php else : ?>
            <?php print '<a href="member_logout.php"><li class="list-group-item">会員ログアウト</li></a>'; ?>
            <?php endif; ?>

          </ul>
        </div>

        <div class="col-lg-9">
          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="signboard/image.png">
              </div>
            </div>
          </div>

          <div class="row">
            <?php
              while(true) :
                $rec = $stmt->fetch(PDO::FETCH_ASSOC); 
                if($rec==false) break; 
                if ($rec['image'] == '') $disp_image = '';
                else $disp_image = '<img class="card-img-top" src="../product/image/'. $rec['image']. '">';
            ?>
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                  <a href="shop_product.php?procode=<?= $rec['code'] ?>">
                    <?= $disp_image ?>
                  </a>
                  <div class="card-body">
                    <h5 class="card-title">
                      <a href="shop_product.php?procode=<?= $rec['code'] ?>">
                        <?= $rec['name'] ?>
                      </a>
                      </h4>
                      <h5>
                        <?= number_format($rec['price']) ?> 円</h5>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted">
                      <?php
                        $num = rand(0, 4);
                        for ($i=0; $i <= $num; $i++){
                          print "&#9733;"; 
                        }
                      ?>
                    </small>
                  </div>
                </div>
              </div>
              <?php endwhile; ?>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.col-lg-9 -->
      </div>
      <!-- /.row -->
    </div>

</body>

</html>