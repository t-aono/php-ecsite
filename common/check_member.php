<?php
session_start();
session_regenerate_id(true);

$login_user = '';

if (isset($_SESSION['member_login']) === false) {
  $login_user .= 'ようこそ ゲスト様 ';
  
} else {
  $login_user .= 'ようこそ ';
  $login_user .= $_SESSION['member_name'];
  $login_user .= '様 ';
  
}