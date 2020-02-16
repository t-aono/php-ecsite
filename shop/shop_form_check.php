<?php
require_once('../common/head.php');
?>

<body>

  <?php

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
$pass2 = $post['pass2'];
$sex = $post['sex'];
$birth = $post['birth'];

$okflg = true;

if ($name == '') {
  $mess .= 'お名前が入力されていません。<br/><br/>';
  $okflg = false;
} else {
  $mess .= '<p class="font-weight-bold">お名前</p>';
  $mess .= $name;
  $mess .= '<br/><br/>';
}

if (preg_match('/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/', $email) == 0) {
  $mess .= 'メールアドレスを正確に入力して下さい。<br/><br/>';
  $okflg = false;
} else {
  $mess .= '<p class="font-weight-bold">メールアドレス</p>';
  $mess .= $email;
  $mess .= '<br/><br/>';
}

if (preg_match('/\A[0-9]+\z/', $postal1) == 0) {
  $mess .= '郵便番号は半角英数字で入力してください。<br/><br/>';
  $okflg = false;
}
if (preg_match('/\A[0-9]+\z/', $postal2) == 0) {
  $mess .= '郵便番号は半角英数字で入力してください。<br/><br/>';
  $okflg = false;
} else {
  $mess .= '<p class="font-weight-bold">郵便番号</p>';
  $mess .= $postal1.'-'.$postal2;
  $mess .= '<br/><br/>';
}

if ($address == '') {
  $mess .= '住所が入力されていません。<br/><br/>';
  $okflg = false;
} else {
  $mess .= '<p class="font-weight-bold">住所</p>';
  $mess .= $address;
  $mess .= '<br/><br/>';
}

if (preg_match('/\A\d{2,5}-?\d{2,5}-?\d{4,5}/', $tel) == 0) {
  $mess .= '電話番号を正確に入力してください。<br/><br/>';
  $okflg = false;
} else {
  $mess .= '<p class="font-weight-bold">電話番号</p>';
  $mess .= $tel;
  $mess .= '<br/><br/>';
}


if ($type == 'regist') {
  
  if ($pass == '') {
    $mess .= 'パスワードが未入力です。';
    $okflg = false;
  }
  if ($pass != $pass2) {
    $mess .= 'パスワードが一致しません。';
    $okflg = false;
  }
  
  $mess .= '<p class="font-weight-bold">性別</p>';
  $mess .= ($sex == 'man' ? '男性':'女性');
  $mess .= '<br/><br/>';

  $mess .= '<p class="font-weight-bold">生まれ年</p>';
  $mess .= $birth;
  $mess .= '年代<br/><br/>';

}


if ($okflg) {
  $mess .= '<form method="post" action="shop_form_done.php">';
  $mess .= '<input type="hidden" name="name" value="'.$name.'">'; 
  $mess .= '<input type="hidden" name="email" value="'.$email.'">'; 
  $mess .= '<input type="hidden" name="postal1" value="'.$postal1.'">'; 
  $mess .= '<input type="hidden" name="postal2" value="'.$postal2.'">'; 
  $mess .= '<input type="hidden" name="address" value="'.$address.'">'; 
  $mess .= '<input type="hidden" name="tel" value="'.$tel.'">'; 
  $mess .= '<input type="hidden" name="type" value="'.$type.'">'; 
  $mess .= '<input type="hidden" name="pass" value="'.$pass.'">'; 
  $mess .= '<input type="hidden" name="sex" value="'.$sex.'">'; 
  $mess .= '<input type="hidden" name="birth" value="'.$birth.'">'; 
  $mess .= '<input class="btn btn-light" type="button" onclick="history.back()" value="戻る">';
  $mess .= '<input class="btn btn-dark" type="submit" value="OK"><br/>'; 
  $mess .= '</form>';
} else {
  $mess .= '<form>';
  $mess .= '<input class="btn btn-light" type="button" onclick="history.back()" value="戻る">';
  $mess .= '</form>';

}

?>

    <?php require_once('../common/navi.php'); ?>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div>
          <h1 class="my-4">お客様情報の入力</h1>
          <?= $mess ?>
        </div>
      </div>
    </div>

</body>

</html>