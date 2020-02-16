<?php
require_once('../common/check_staff.php');
require_once('../common/head.php');
?>

<body>

  <?php
require_once('../common/common.php');

$post = sanitize($_POST);
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
          <h1 class="my-4">スタッフ追加</h1>
          <?php if ($staff_name == '' || $staff_pass =='' || $staff_pass != $staff_pass2) : ?>
          <form>
            <input type="button" onclick="history.back()" value="戻る">
          </form>
          <?php else : ?>
          <p class="font-weight-bold">スタッフ名</p>
          <?= $staff_name ?>
            <br/>
            <br/>
            <?php  $staff_pass = md5($staff_pass); ?>
            <form class="form-signin" method="post" action="staff_add_done.php">
              <input type="hidden" name="name" value="<?= $staff_name ?>">
              <input type="hidden" name="pass" value="<?= $staff_pass ?>">
              <input class="btn btn-light" type="button" onclick="history.back()" value="戻る">
              <input class="btn btn-dark" type="submit" value="OK">
            </form>
            <?php endif; ?>
        </div>
      </div>
    </div>

</body>

</html>