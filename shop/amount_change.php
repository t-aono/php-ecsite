<?php
session_start();
session_regenerate_id(true);

require_once('../common/common.php');

$post = sanitize($_POST);

$max = $post['max'];

for ($i=0;$i<$max;$i++) {
 
  if(preg_match("/\A[0-9]+\z/", $post['amount'.$i]) == 0) {
    print '数量に誤りがあります。';
    print '<a href="shop_cartlook.php">カートに戻る</a>';
    exit();
  }
  
  if ($post['amount'.$i] < 1 || 10 < $post['amount'.$i]) {
    print '数量は１〜10個までです。';
    print '<a href="shop_cartlook.php">カートに戻る</a>';
    exit();
  }

  $amount[] = $post['amount'.$i];
}

$cart = $_SESSION['cart'];
for($i=$max; 0 <= $i; $i--) {
  if (isset($post['delete'.$i]) == true) {
    array_splice($cart, $i , 1);
    array_splice($amount, $i , 1);
  }
}

$_SESSION['cart'] = $cart;
$_SESSION['amount'] = $amount;
header('Location:shop_cartlook.php');
exit();