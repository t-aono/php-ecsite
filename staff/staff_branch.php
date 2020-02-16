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
  header('Location:staff_add.php');
  exit();
}

if(isset($post['staffcode']) == false) {
  header('Location:staff_ng.php');
  exit();
} else {
  $staff_code = $post['staffcode'];
}

if(isset($post['disp'])==true) {
  header('Location:staff_disp.php?staffcode='.$staff_code);
  exit();
}

if(isset($post['edit']) == true) {
  header('Location:staff_edit.php?staffcode='.$staff_code);
  exit();
}

if(isset($post['delete']) == true) {
  header('Location:staff_delete.php?staffcode='.$staff_code);
  exit();
}