<?php
require_once 'db_conf.php';
session_start();

$id       = isset($_POST['id'])       ? (int)$_POST['id']        : 0;
$password = isset($_POST['password']) ? trim($_POST['password']) : '';
$title    = isset($_POST['title'])    ? trim($_POST['title'])    : '';
$content  = isset($_POST['content'])  ? trim($_POST['content'])  : '';

function isValidInput($value, $min=1, $mix=255) {
  return isset($value) && strlen($value) >= $min && strlen($value) <= $mix;
}

$errors = [];

if ($id <= 0) {
  $errors[] = "잘못된 게시글 요청입니다.";
}
if (!isValidInput($password, 4, 30)) {
  $errors[] = "비밀번호는 4자 이상 30자 이하로 입력해야 합니다.";
}
if (!isValidInput($title, 1, 100)) {
  $errors[] = "제목은 1자 이상 100자 이하로 입력해야 합니다.";
}
if (!isValidInput($content, 1, 1000)) {
  $errors[] = "내용은 1자 이상 1000자 이하로 입력해야 합니다.";
}

// 에러 발생시 수정 페이지로 되돌림
if (!empty($errors)) {
  $_SESSION['error'] = implode('<br>', $errors);
  header("Location: edit.php?id=$id");
  exit;
}

try {

  $db_conn = new mysqli(DB_URL,DB_USER,DB_PASS,DB_NAME);
  $db_conn->set_charset("utf8mb4");

  $sql = "SELECT password FROM posts WHERE id=$id";
  $result = $db_conn->query($sql);

  if(!$result || $result->num_rows === 0 ) {
    $_SESSION['error'] = "해당 게시글을 찾을 수 없습니다.";
    header("Location: list.php");
    exit;
  }

  $row = $result->fetch_assoc();

  if(!password_verify($password, $row['password'])) {
    $_SESSION['error'] = "비밀번호가 일치하지 않습니다.";
    header("Location:edit.php?id=$id");
    exit;
  }

  $sql = "UPDATE posts SET
          title = '" . $db_conn->real_escape_string($title) . "',
          content = '" . $db_conn->real_escape_string($content) . "'
          WHERE id = $id";

  if (!$db_conn->query($sql)) {
    throw new Exception("DB 업데이트 실패");
  }
  header("Location: view.php?id=$id");
  exit;
} catch (Exception $e) {
  error_log("[ " . date('Y-m-d H:i:s') . "] " . $e->getMessage() . PHP_EOL, 3, LOG_FILE_PATH);
  $_SESSION['error'] = "서버 내부 오류로 인해 게시글 수정에 실패했습니다.";
  header("Location: edit.php?id=$id");
  exit;
} finally {
  if(isset($db_conn) && $db_conn instanceof mysqli) {
    $db_conn->close();
  }
}