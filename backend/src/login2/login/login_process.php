<?php

mysqli_report(MYSQLI_REPORT_OFF);

session_start();

require_once('./db_conf.php');

$db_conn = new mysqli(
  db_info::DB_URL,
  db_info::USER_ID,
  db_info::PASSWORD,
  db_info::DB
);


if($db_conn->connect_error) {
  $_SESSION['error'] = "DB 연결 실패";
  header("Location: login_process.php");
  exit;
}

$username_row = trim($_POST['username'] ?? '');
$password_row = trim($_POST['password'] ?? '');

if ($username_row === '' || $password_row === '') {
  $_SESSION['error'] = "아이디와 비밀번호를 모두 입력하세요";
  header("Location: login.php");
  exit;
}

$username = $db_conn->real_escape_string($username_row);

$query = "SELECT * FROM users WHERE username='$username'";
$result= $db_conn->query($query);

$db_conn->close();

if($result && $row = $result->fetch_assoc()) {

  if(password_verify($password_row, $row['password'])) {
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    header("Location: welcome.php");
    exit;
  } else {

    $_SESSION['error'] = "비밀번호가 틀렸습니다.";
    header("Location: login.php");
    exit;
  }
} else {
  $_SESSION['error'] = "아이디가 존재하지 않습니다.";
  header("Location: login.php");
  exit;
}


?>