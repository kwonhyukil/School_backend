<?php

mysqli_report(MYSQLI_REPORT_OFF);

session_start();


require_once('./db_conf.php');

$db_conn = new mysqli(
  db_info::DB_URL,
  db_info::USER_ID,
  db_info::PASSWD,
  db_info::DB
);

if ($db_conn->connect_errno) {
  $_SESSION['error'] = "db 연결에 실패했습니다.";
  header("Location: register.php");
  exit;
}

$username_row = trim($_POST['username'] ?? '');
$password_row = trim($_POST['password'] ?? '');
$name_row = trim($_POST['name'] ?? '');


if ($username_row === '' || $password_row === '' || $name_row === '') {
  $_SESSION['error'] = "모든 필드를 입ㄹ력하세요.";
  header("Location: register.php");
  exit;
}

$password_hashed = password_hash($password_row, PASSWORD_DEFAULT);

$username = $db_conn->real_escape_string($username_row);
$password = $db_conn->real_escape_string($password_hashed);
$name = $db_conn->real_escape_string($name_row);

$sql = "
  INSERT INTO users (username, password, name)
  VALUES('$username', '$password', '$name')
";

if($db_conn->query($sql)) {
  $db_conn->close();
  $_SESSION['success'] = "회원가입이 완료되었습니다. 로그인 해주세요.";
  header("Location: login.php");
  exit;
} else {
  if($db_conn->errno === 1062) {
    $_SESSION['error'] = "이미 사용 중인 아이디입니다.";
  } else {
    $_SESSION['error'] = "회원가입에 실패했습니다. 관리자에게 문의하세요.";

    error_log("[REGISTER ERROR] " . $db_conn->error);
  }
  $db_conn->close();
  header("Location: login.php");
  exit;
}