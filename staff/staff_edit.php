<?php
require_once('../common/check_staff.php');
require_once('../common/head.php');
?>

<body>

  <?php

try {

  $staff_code = $_GET['staffcode'];

  require_once('../common/dbconnect.php');

  $sql = 'SELECT name FROM mst_staff WHERE code=?';
  $stmt = $dbh->prepare($sql);
  $data[] = $staff_code;
  $stmt->execute($data);

  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  $staff_name = $rec['name'];

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
          <h1 class="my-4">スタッフ修正</h1>
          <p class="font-weight-bold">スタッフコード</p>
          <?= $staff_code; ?>
            <br/>
            <br/>
            <form method="post" action="staff_edit_check.php">
              <input type="hidden" name="code" value="<?= $staff_code; ?>"> スタッフ名
              <br/>
              <input type="text" name="name" style="width:200px" value="<?= $staff_name; ?>">
              <br/> パスワードを入力してください。
              <br />
              <input type="password" name="pass" style="width:100px">
              <br /> パスワードをもう一度入力してください
              <br />
              <input type="password" name="pass2" style="width:100px">
              <br />
              <br />
              <input class="btn btn-light" type="button" onclick="history.back()" value="戻る">
              <input class="btn btn-dark" type="submit" value="OK">
            </form>
        </div>
      </div>
    </div>

</body>

</html>