<?php

require_once 'db_conf.php';

session_start();

$id       = isset($_POST['id'])       ? (int)$_POST['id']        : 0;
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

$errors = [];

if ($id <= 0) {
  $errors[] = "잘못된 게시글 요청입니다.";
}
if(mb_strlen($password) < 4 || mb_strlen($password) > 30) {
  $errors[] = "비밀번호는 4자 이상 30자 이하로 입력해야 합니다.";
}
if (!empty($errors)) {
  $_SESSION['error'] = implode('<br>', $errors);
  header("Location: delete.php?id=$id");
  exit;
}

try {
  
  $db_conn = new mysqli(DB_URL,DB_USER,DB_PASS,DB_NAME);
  $db_conn->set_charset("utf8mb4");

  $sql = "SELECT password FROM posts WHERE id = $id";
  $result = $db_conn->query($sql);

  if (!$result || $result->num_rows === 0 ) {
    $_SESSION['error'] = "해당 게시글을 찾을 수 없습니다.";
    header("Location: list.php");
    exit;
  }

  $row = $result->fetch_assoc();

  if(!password_verify($password, $row['password'])) {
    $_SESSION['error'] = "비밀번호가 일치하지 않습니다.";
    header("Location: delete.php?id=$id");
    exit;
  }

  $sql = "DELETE FROM post WHERE id=$id";
  if(!$db_conn->query($sql)) {
    throw new Exception('게시글 삭제 실패');
  }
  header("Location: list.php");
  exit;
} catch (Exception $e) {
  error_log("[" . date('Y-m-d H:i:s') . "] " . $e->getMessage() . PHP_EOL, 3, LOG_FILE_PATH);
  header("Location: delect.php?id=$id");
  exit;
} finally {
  if(isset($db_conn) && $db_conn instanceof mysqli) {
    $db_conn->close();
  }
}