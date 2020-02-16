<?php
require_once('../common/check_staff.php');
require_once('../common/head.php');
?>

<?php

try {

  require_once('../common/common.php');

  $post = sanitize($_POST);
  $staff_name = $post['name'];
  $staff_pass = $post['pass'];

  require_once('../common/dbconnect.php');

  $sql = 'INSERT INTO mst_staff(name, password) VALUES (?, ?)';
  $stmt = $dbh->prepare($sql);
  $data[] = $staff_name;
  $data[] = $staff_pass;
  $stmt->execute($data);

  $dbh = null;

} catch(Exception $e) {
  print $e.'ただいま障害により大変ご迷惑をお掛けしております。';
  exit();
}
?>

  <?php require_once('../common/navi.php'); ?>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div>
        <h1 class="my-4">スタッフ追加</h1>
        <?= $staff_name ?> さんを追加しました。
          <br/>
          <br/>
          <a href="staff_list.php" class="btn btn-lg btn-light">戻る</a>
      </div>
    </div>
  </div>

  </body>

  </html>