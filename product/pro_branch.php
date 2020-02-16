<?php
session_start();
session_regenerate_id(true);

if (isset($_SESSION['login']) === false) {
  print 'ログインされていません。<br/>';
  print '<a href="../staff_login/staff_login.php">ログイン画面へ</a>';
  exit();
} 

require_once('../common/common.php');

$post = sanitize($_POST);

if(isset($post['add'])==true) {
  header('Location:pro_add.php');
  exit();
}

if(isset($post['procode']) == false) {
  header('Location:pro_ng.php');
  exit();
} else {
  $pro_code = $post['procode'];
}

if(isset($post['disp'])==true) {
  header('Location:pro_disp.php?procode='.$pro_code);
  exit();
}

if(isset($post['edit']) == true) {
  header('Location:pro_edit.php?procode='.$pro_code);
  exit();
}

if(isset($post['delete']) == true) {
  header('Location:pro_delete.php?procode='.$pro_code);
  exit();
}