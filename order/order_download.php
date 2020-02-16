<?php
require_once('../common/check_staff.php');
require_once('../common/head.php');
require_once('../common/common.php');
?>

<body>

  <?php require_once('../common/navi.php'); ?>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div>
        <h1 class="my-4">注文履歴</h1>
        <p>ダウンロードしたい注文日を選んでください。</p>
        <form method="post" action="order_download_done.php">
          <p>
            <?= pulldown_year(); ?>年
              <?= pulldown_month(); ?>月
                <?= pulldown_day(); ?>日
          </p>
          <input class="btn btn-dark" type="submit" value="詳細へ">
        </form>
      </div>
    </div>
  </div>


</body>

</html>