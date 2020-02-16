<?php
require_once('../common/check_staff.php');
require_once('../common/head.php');
?>

<body>

  <?php
require_once('../common/common.php');

$post = sanitize($_POST);
$staff_code = $post['code'];
$staff_name = $post['name'];
$staff_pass = $post['pass'];
$staff_pass2 = $post['pass2'];

if ($staff_name == '') {
  print 'スタッフ名が入力されていません。<br/>';
}

if ($staff_pass =='') {
  print 'バスワードが入力されていません。<br/>';
}

if ($staff_pass != $staff_pass2) {
  print 'パスワードが一致しません。<br/>';
}

?>

    <?php require_once('../common/navi.php'); ?>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div>
          <h1 class="my-4">スタッフ修正</h1>
          スタッフ名：
          <?= $staff_name ?>
            <br/>
            <?php if ($staff_name == '' || $staff_pass =='' || $staff_pass != $staff_pass2) : ?>
            <form>
              <input class="btn btn-light" type="button" onclick="history.back()" value="戻る">
            </form>
            <?php else: ?>
            <?php $staff_pass = md5($staff_pass); ?>
            <form method="post" action="staff_edit_done.php">
              <input type="hidden" name="code" value="<?= $staff_code ?>">
              <input type="hidden" name="name" value="<?= $staff_name ?>">
              <input type="hidden" name="pass" value="<?= $staff_pass ?>">
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