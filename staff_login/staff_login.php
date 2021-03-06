<?php
require_once('../common/head.php');
?>

<body>

  <?php require_once('../common/navi.php'); ?>

  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center my-3">スタッフログイン</h5>
            <form class="form-signin" method="post" action="staff_login_check.php">
              <div class="form-label-group">
                <input type="text" name="code" class="form-control" placeholder="スタッフコード" required autofocus>
                <label for="inputEmail"></label>
              </div>
              <div class="form-label-group">
                <input type="password" name="pass" class="form-control" placeholder="パスワード" required>
                <label for="inputPassword"></label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">ログイン</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
