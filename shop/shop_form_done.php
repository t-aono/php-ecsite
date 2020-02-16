<?php
require_once('../common/check_member.php');
require_once('../common/head.php');
?>

<body>

  <?php

try {

  require_once('../common/common.php');

  $post = sanitize($_POST);

  $name = $post['name'];
  $email = $post['email'];
  $postal1 = $post['postal1'];
  $postal2 = $post['postal2'];
  $address = $post['address'];
  $tel = $post['tel'];
  $type = $post['type'];
  $pass = $post['pass'];
  $sex = $post['sex'];
  $birth = $post['birth'];

  $mess .= $name.' 様<br/>';
  $mess .= 'ご注文ありがとうございました。<br/><br/>';
  $mess .= $email.' にメールをお送りしましたのでご確認ください。<br/>';
  $mess .= '商品は以下の住所に発送させて頂きます。<br/>';
  $mess .= '〒 '.$postal1.'-'.$postal2.'<br/>';
  $mess .= $address.'<br/>';
  $mess .= 'tel '.$tel.'<br/><br/>';

  $text = '';
  $text .= $name. " 様\n\nこの度はご注文ありがとうございました。\n";
  $text .= "\n";
  $text .= "ご注文商品\n";
  $text .= "----------------\n";

  $cart = $_SESSION['cart'];
  $amount = $_SESSION['amount'];
  $max = count($cart);

  require_once('../common/dbconnect.php');

  for ($i=0; $i<$max; $i++) {
    $sql = 'SELECT name, price FROM mst_product WHERE code =?';
    $stmt = $dbh->prepare($sql);
    $data[0] = $cart[$i];
    $stmt->execute($data);

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    $item = $rec['name'];
    $price = $rec['price'];
    $cost[] = $price;
    $num = $amount[$i];
    $total = $price * $num;
    
    $text .= $item.' ';
    $text .= $price. '円 x';
    $text .= $num.'個 = ';
    $text .= $total."円\n";
  }
  
  $sql = 'LOCK TABLES dat_sales WRITE, dat_sales_product WRITE, dat_member WRITE';
  $stmt = $dbh->prepare($sql);
  $stmt->execute();

  $lastmembercode = 0;
  if ($type == 'regist') {
    $sql = 'INSERT INTO dat_member (password, name, email, postal1, postal2, address, tel, sex, birth) VALUES (?,?,?,?,?,?,?,?,?)';
    $stmt = $dbh->prepare($sql);
    $data = array();
    $data[] = md5($pass);
    $data[] = $name;
    $data[] = $email;
    $data[] = $postal1;    
    $data[] = $postal2;
    $data[] = $address;
    $data[] = $tel;
    $data[] = ($sex == 'men' ? 1 : 2);
    $data[] = $birth;
    $stmt->execute($data);

    $sql = 'SELECT LAST_INSERT_ID()';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $lastmembercode = $rec['LAST_INSERT_ID()'];

  }
  
  $sql = 'INSERT INTO dat_sales (code_member, name, email, postal1, postal2, address, tel) VALUES (?,?,?,?,?,?,?)';
  $stmt = $dbh->prepare($sql);
  $data = array();
  $data[] = $lastmembercode;
  $data[] = $name;
  $data[] = $email;
  $data[] = $postal1;
  $data[] = $postal2;
  $data[] = $address;
  $data[] = $tel;
  $stmt->execute($data);

  $sql = 'SELECT LAST_INSERT_ID()';
  $stmt = $dbh->prepare($sql);
  $stmt->execute();
  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  $lastcode = $rec['LAST_INSERT_ID()'];
  
  for ($i=0; $i<$max; $i++) {
    $sql = 'INSERT INTO dat_sales_product (code_sales, code_product, price, quantity) VALUES (?,?,?,?)';
    $stmt = $dbh->prepare($sql);
    $data = array();
    $data[] = $lastcode;
    $data[] = $cart[$i];
    $data[] = $cost[$i];
    $data[] = $amount[$i];
    $stmt->execute($data);
  }

  $sql = 'UNLOCK TABLES';
  $stmt = $dbh->prepare($sql);
  $stmt->execute();
  
  $dbh = null;


  if ($type == 'regist') {
    $mess .= '会員登録が完了致しました。<br/>';
    $mess .= '次回からメールアドレスとパスワードでログインして下さい。<br/>';
    $mess .= 'ご注文が簡単にできるようになります。<br/>';
    $mess .= '<br/>';
  }

  $text .= "送料は無料です。\n";
  $text .= "-----------------\n";
  $text .= "\n";
  $text .= "代金は以下の口座にお振込みください。\n";
  $text .= "ロクマル銀行 marumaru支店 普通口座 123456\n";
  $text .= "入金が確認で次第、発送させて頂きます。\n";
  $text .= "\n";
  $text .= "◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆\n";
  $text .= "株式会社ろくまる\n";
  $text .= "福岡県の南の方\n";
  $text .= "電話：0120-123-4567\n";
  $text .= "メール：rokumaru@rkmr.com\n";
  $text .= "◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆\n";

  if ($type == 'regist') {
    $text .= "会員登録が完了致しました。\n";
    $text .= "次回からメールアドレスとパスワードでログインして下さい。\n";
    $text .= "ご注文が簡単にできるようになります。\n";
    $text .= "\n";
  }


  // print '<br/>';
  // print nl2br($text);

  // $title = 'ご注文ありがとうございます。';
  // $header = 'From:rokumaru@rkmr.com';
  // $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
  // mb_language('Japanese');
  // mb_internal_encoding('UTF-8');
  // mb_send_mail($email, $title, $text, $header);

  // $title = 'ご注文がありました。';
  // $header = 'From:'.$email;
  // $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
  // mb_language('Japanese');
  // mb_internal_encoding('UTF-8');
  // mb_send_mail($email, $title, $text, $header);

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
          <h1 class="my-4">お客様情報の入力</h1>
          <?= $mess ?>
            <a href="shop_list.php">商品画面へ</a>
        </div>
      </div>
    </div>


</body>

</html>