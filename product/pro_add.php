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
        <h1 class="my-4">商品追加</h1>
        <form method="post" action="pro_add_check.php" enctype="multipart/form-data">
          商品名を入力してください。
          <br />
          <input type="text" name="name" style="width:200px">
          <br /> 価格を入力してください。
          <br />
          <input type="text" name="price" style="width:50px">
          <br /> 画像を選択してください。
          <br/>
          <input type="file" name="image" style="width:400px">
          <br/>
          <br />
          <input class="btn btn-light" type="button" onclick="history.back()" value="戻る">
          <input class="btn btn-dark" type="submit" value="OK">
        </form>
      </div>
    </div>
  </div>


</body>

</html>