<?php
session_start();
session_regenerate_id(true);

if (!isset($_SESSION['member_login'])) {
  print 'ログインされていません。<br/>';
  print '<a href="shop_list.php">商品一覧へ</a>';
  exit();
}

require_once('../common/head.php');
?>

  <body>

    <?php
$code = $_SESSION['member_code'];

require_once('../common/dbconnect.php');

$sql = 'SELECT name, email, postal1, postal2, address, tel FROM dat_member WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $code;
$stmt->execute($data);
$rec = $stmt->fetch(PDO::FETCH_ASSOC);

$dbh = null;

$name = $rec['name'];
$email = $rec['email'];
$postal1 = $rec['postal1'];
$postal2 = $rec['postal2'];
$address = $rec['address'];
$tel = $rec['tel'];

$mess .= '<p class="font-weight-bold">お名前</p>';
$mess .= $name;
$mess .= '<br/><br/>';
$mess .= '<p class="font-weight-bold">メールアドレス</p>';
$mess .= $email;
$mess .= '<br/><br/>';
$mess .= '<p class="font-weight-bold">郵便番号</p>';
$mess .= $postal1.'-'.$postal2;
$mess .= '<br/><br/>';
$mess .= '<p class="font-weight-bold">住所</p>';
$mess .= $address;
$mess .= '<br/><br/>';
$mess .= '<p class="font-weight-bold">電話番号</p>';
$mess .= $tel;
$mess .= '<br/><br/>';
$mess .= '<form method="post" action="shop_simple_done.php">';
$mess .= '<input type="hidden" name="name" value="'.$name.'">'; 
$mess .= '<input type="hidden" name="email" value="'.$email.'">'; 
$mess .= '<input type="hidden" name="postal1" value="'.$postal1.'">'; 
$mess .= '<input type="hidden" name="postal2" value="'.$postal2.'">'; 
$mess .= '<input type="hidden" name="address" value="'.$address.'">'; 
$mess .= '<input type="hidden" name="tel" value="'.$tel.'">'; 
$mess .= '<input class="btn btn-light" type="button" onclick="history.back()" value="戻る">';
$mess .= '<input class="btn btn-dark" type="submit" value="OK"><br/>'; 
$mess .= '</form>';

?>

      <?php require_once('../common/navi.php'); ?>

      <!-- Page Content -->
      <div class="container">
        <div class="row">
          <div>
            <h1 class="my-4">お客様情報の確認</h1>
            <?= $mess ?>
          </div>
        </div>
      </div>

  </body>

  </html>