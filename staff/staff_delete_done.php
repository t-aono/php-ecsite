<?php
require_once('../common/check_staff.php');
require_once('../common/head.php');
?>

<body>

  <?php

  try {

    require_once('../common/common.php');

    $post = sanitize($_POST);
    $staff_code = $post['code'];

    require_once('../common/dbconnect.php');

    $sql = 'DELETE FROM mst_staff WHERE code=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $staff_code;
    $stmt->execute($data);

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
          <h1 class="my-4">スタッフ削除</h1>
          削除しました。
          <br/>
          <br/>
          <a href="staff_list.php">スタッフ一覧へ</a>
        </div>
      </div>
    </div>

</body>

</html>