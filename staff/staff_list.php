<?php
require_once('../common/check_staff.php');
require_once('../common/head.php');
?>

<body>

  <?php
  try {
    require_once('../common/dbconnect.php');

    $sql = 'SELECT code, name FROM mst_staff';
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
        <div>
          <h1 class="my-4">スタッフ一覧</h1>
          <div class="list-group">
            <form method="post" action="staff_branch.php">
              <?php while(true) : ?>
              <?php $rec = $stmt->fetch(PDO::FETCH_ASSOC); ?>
              <?php if($rec==false) break; ?>
              <div class="form-check">
                <input class="form-check-input" id="<?= $rec['code'] ?>" type="radio" name="staffcode" value="<?= $rec['code'] ?>">
                <label class="form-check-label" for="<?= $rec['code'] ?>">
                  <?= $rec['name'] ?>
                </label>
              </div>
              <?php endwhile; ?>
              <br/>
              <input class="btn btn-dark" type="submit" name="disp" value="参照">
              <input class="btn btn-dark" type="submit" name="add" value="追加">
              <input class="btn btn-dark" type="submit" name="edit" value="修正">
              <input class="btn btn-dark" type="submit" name="delete" value="削除">
            </form>
          </div>
          <br/>
          <a href="../staff_login/staff_top.php">トップメニュー</a>
        </div>
      </div>
    </div>

</body>

</html>