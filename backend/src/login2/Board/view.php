<?php

require_once 'db_conf.php';

session_start();

$post = null;

try {
  if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    http_response_code(404);
    exit;
  }

  $id = (int) $_GET['id'];

  $db_conn = new mysqli(DB_URL,DB_USER,DB_PASS,DB_NAME);
  $db_conn->set_charset("utf8mb4");

  $sql = "SELECT id, name, title, content, created_at, updated_at FROM posts WHERE id = $id";
  $result = $db_conn->query($sql);

  if (!$result || $result->num_rows === 0) {
    http_response_code(404);
    exit;
  }

  $post = $result->fetch_assoc();
} catch (Exception $e) {
  error_log('[ ' . date('Y-m-d H:i:s') . '] ' . $e->getMessage() . PHP_EOL, 3, LOG_FILE_PATH);
  $_SESSION['error'] = "게시글 조회 중 오류가 발생했습니다.";
  header("Location: list.php");
  exit;
} finally {
  if (isset($db_conn) && $db_conn instanceof mysqli) {
    $db_conn->close();
  }
}