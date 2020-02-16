<?php
require_once('../common/check_staff.php');
require_once('../common/head.php');
require_once('../common/common.php');
?>

<body>

  <?php

  $post = sanitize($_POST);
  $year = $post['year'];
  $month = $post['month'];
  $day = $post['day'];


  try {
    require_once('../common/dbconnect.php');
    
    $sql = '
    SELECT
      s.code,
      s.date,
      s.code_member,
      s.name AS dat_sales_name,
      s.email,
      s.postal1,
      s.postal2,
      s.address,
      s.tel,
      sp.code_product,
      mp.name AS mst_product_name,
      sp.price,
      sp.quantity
    FROM
      dat_sales as s, dat_sales_product as sp, mst_product as mp
    WHERE
      s.code=sp.code_sales
      AND sp.code_product=mp.code
      AND substr(s.date,1,4)='.$year.'
      AND substr(s.date,6,2)='.$month.'
      AND substr(s.date,9,2)='.$day.'
    ';
    $stmt = $dbh->prepare($sql);
    $data[] = $year;
    $data[] = $month;
    $data[] = $day;
    $stmt->execute($data);
    $count=$stmt->rowCount();

    $dbh = null;

    $csv = '注文コード, 注文日時, 会員番号, お名前, メール, 郵便番号, 住所, TEL, 商品コード, 商品名, 価格, 数量';
    $csv .= "\n";

    if ($count < 1) $csv = '指定した日付の注文履歴はありません。';

    while(true) {
      $rec = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($rec == false) break;
      $csv .= $rec['code'];
      $csv .= ',';
      $csv .= $rec['date'];
      $csv .= ',';
      $csv .= $rec['code_member'];
      $csv .= ',';
      $csv .= $rec['dat_sales_name'];
      $csv .= ',';
      $csv .= $rec['email'];
      $csv .= ',';
      $csv .= $rec['postal1'].'-'.$rec['postal2'];
      $csv .= ',';
      $csv .= $rec['address'];
      $csv .= ',';
      $csv .= $rec['tel'];
      $csv .= ',';
      $csv .= $rec['code_product'];
      $csv .= ',';
      $csv .= $rec['mst_product_name'];
      $csv .= ',';
      $csv .= $rec['price'];
      $csv .= ',';
      $csv .= $rec['quantity'];
      $csv .= "\n";
    }

    $file = fopen('./order.csv', 'w');
    fputs($file, $csv);
    fclose($file);

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
          <h1 class="my-4">注文内容</h1>
          <p>
            <?= nl2br($csv) ?>
          </p>
          <br/>
          <a href="order.csv">注文データのダウンロード</a>
          <br/>
          <br/>
          <a href="order_download.php">日付選択へ</a>
          <br/>
          <br/>
          <a href="../staff_login/staff_top.php">トップメニュー</a>
        </div>
      </div>
    </div>

</body>

</html>