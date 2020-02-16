<?php
require_once('../common/check_staff.php');
require_once('../common/head.php');
?>

<body>

  <?php require_once('../common/navi.php'); ?>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div>
        <h1 class="my-4">スタッフ追加</h1>
        <form method="post" action="staff_add_check.php">
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