<?php
// if (isset($_POST['user']) & isset($_POST['latte']) & isset($_POST['iceamericano'])) {
//   $user = trim($_POST['user']);
//   $latte = trim($_POST['latte']);
//   $iceamericano = trim($_POST['iceamericano']);
//   setcookie('user', $user, time() + 3600, '/');
//   setcookie('latte', $latte, time() + 3600, '/');
//   setcookie('iceamericano', $iceamericano, time() + 3600, '/');
//   header('Location: Lab2_index.php');
//   exit;
// }
if (isset($_POST['user'], $_POST['latte'], $_POST['iceamericano'])) {
  $user = trim($_POST['user']);
  $latte = trim($_POST['latte']);
  $iceamericano = trim($_POST['iceamericano']);
  $data = [
  'user' => $user,
  'latte' => $latte,
  'iceamericano' => $iceamericano
];
setcookie('order', json_encode($data), time() + 3600, '/');
header('Location: Lab2_index.php');
exit;
};
