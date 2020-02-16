<?php 
require_once('../common/common.php'); 
require_once('../common/check_member.php');
require_once('../common/head.php');
?>

<body>

  <?php require_once('../common/navi.php'); ?>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div>
        <h1 class="my-4">お客様情報の入力</h1>
        <form method="post" action="shop_form_check.php">
          お名前
          <br />
          <input type="text" name="name" style="width:200px">
          <br /> メールアドレス
          <br />
          <input type="text" name="email" style="width:200px">
          <br /> 郵便番号
          <br />
          <input type="text" name="postal1" stule="width:50px">-
          <input type="text" name="postal2" stule="width:80px">
          <br /> 住所
          <br />
          <input type="text" name="address" style="width:500px">
          <br /> 電話番号
          <br />
          <input type="text" name="tel" style="width:150px">
          <br />
          <br />
          <input type="radio" name="type" value="guest" checked>今回だけの注文
          <br />
          <input type="radio" name="type" value="regist">会員登録しての注文
          <br />
          <br /> ※会員登録する方は以下の項目も入力してください。
          <br /> パスワードを入力してください。
          <br />
          <input type="password" name="pass" style="width:100px">
          <br /> パスワードをもう一度入力してください。
          <br />
          <input type="password" name="pass2" style="width:100px;">
          <br /> 性別
          <br />
          <input type="radio" name="sex" value="man">男性
          <br />
          <input type="radio" name="sex" value="woman" checked>女性
          <br /> 生まれ年
          <br />
          <?= pulldown_gene(); ?>
            <br/>
            <br/>
            <input class="btn btn-light" type="button" onclick="history.back()" value="戻る">
            <input class="btn btn-dark" type="submit" value="OK">
            <br />
        </form>
      </div>
    </div>
  </div>

</body>

</html>