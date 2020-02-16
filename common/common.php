<?php

function sanitize($before) {
  foreach ($before as $key=>$value) {
    $after[$key] = htmlspecialchars($value, ENT_QUOTES,'UTF-8');
  }
  return $after;
}


function pulldown_year() {
  print '<select name="year">';
  print '<option value="2017">2017</option>';
  print '<option value="2018">2018</option>';
  print '<option value="2019">2019</option>';
  print '<option value="2020" selected>2020</option>';
  print '</select>';
}

function pulldown_month() {
  print '<select name="month">';
  for ($i=1; $i<=12; $i++) {
    if ($i<10) $i = '0'.$i;
    print '<option value="'.$i.'">'.$i.'</option>';
  }
  print '</select>';
}

function pulldown_day() {
  print '<select name="day">';
  for ($i=1; $i<=31; $i++) {
    if ($i<10) $i = '0'.$i;
    print '<option value="'.$i.'">'.$i.'</option>';
  }
  print '</select>';
}


function pulldown_gene() {
  print '<select name="birth">';
  for ($i=190; $i<=201; $i++) {
    if ($i==198) {
      print '<option value="'.$i.'0" selected>'.$i.'0</option>';
    }
    print '<option value="'.$i.'0">'.$i.'0</option>';
  }
  print '</select>';
}