<?php

//CRUD

// Create
$_SESSION['std_info'] = [
  'id' => 2423001,
  'name' => '권혁일',
  '빵빵이' => '귀여워',
  '옥지' => '빵빵이 여자친구',
  '탄지로' => '네즈코'
];
$_SESSION['name'] = 'ycjung';

if (session_id() !== '') {
  echo '세션 시작 중<br>';
}

// echo session_status() . "<br>";
if (session_status() == PHP_SESSION_ACTIVE) {
  echo '세션 시작 중 <br>';
}
if (isset($_SESSION['std_info'])) {
  print_r($_SESSION['std_info']);
} else {
  echo "학생정보 없음";
}

echo "<br>";
foreach ($_SESSION['std_info'] as $key => $value)
  echo $key . ": " . $value . "<br>";
