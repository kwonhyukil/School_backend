<?php

session_start();

require_once 'db_conf.php';

// 사용자 입력 수집
$name     = isset($_POST['name'])     ? trim($_POST['name'])      : '';
$password = isset($_POST['password']) ? trim($_POST['password'])  : '';
$title    = isset($_POST['title'])    ? trim($_POST['title'])     : '';
$content  = isset($_POST['content'])  ? trim($_POST['content'])   : '';

function isvalidInput($value, $min = 1, $max = 255) {
  return isset($value) && mb_strlen($value) >= $min && mb_strlen($value) <= $max;
}

// 입력값 검증
$errors = [];


if (!isvalidInput($name, 2, 30)){
  $errors[] = '작성자 이름은 2자 이상 30자 이하로 입력해야 합니다.';
}
if (!isvalidInput($password, 4, 30)) {
  $errors[] = '비밀번호는 4자 이상 30자 이하로 입력해야 합니다.';
}
if (!isvalidInput($title, 1, 100)) {
  $errors[] = '제목은 1자 이상 100자 이하로 입력해야 합니다.';
}
if (!isvalidInput($content, 1, 1000)) {
  $errors[] = '내용은 1자 이상 1000자 이하로 입력해야 합니다.';
}

if (!empty($errors)) {
  $session['error'] = implode('<br>', $errors);
  header("Location: write.php");
  exit;
}

try {

  $db_conn = new mysqli(DB_URL, DB_USER, DB_PASS,DB_NAME);
  $db_conn->set_charset("utf8mb4");

  $password_hashed = password_hash($password, PASSWORD_DEFAULT);

  $sql = "
    INSERT INTO posts (name, password, title, content, created_at)
    VALUE ('$name','$password','$title','$content', NOW())";

  if (!$db_conn->query($sql)) {
    throw new Exception('DB 등록 실패');
  }
  header('Location: list.php');
  exit;
} catch (Exception $e) {
  error_log('[' . date('Y-m-d h:i:s') . '] ' . $e->getMessage() . PHP_EOL, 3, LOG_FILE_PATH);

  $_SESSION['error'] = "글 작성 중 오류가 발생했습니다. 잠시 후 다시 시도해 주세요.";
  header("Location: write.php");
  exit;
} finally {
  if (isset($db_conn) && $db_conn instanceof mysqli) {
    $db_conn->close();
  }
}