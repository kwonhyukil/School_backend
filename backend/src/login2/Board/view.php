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
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title><?php echo htmlspecialchars($post['id']);?>- 게시글 보기</title>
</head>
<body>
<h1><?php echo htmlspecialchars($post['title']) ?></h1>
<p><strong>작성자: </strong><?php echo htmlspecialchars($post['name']) ?></p>
<p><strong>작성일: </strong><?php echo htmlspecialchars(date('Y-m-d H:i:s' , strtotime($post['created_at'])));?></p>

<?php if(!empty($post['updated_at'])) {
  echo "<p><strong>수정일</strong>";
  echo htmlspecialchars(date('Y-m-d H:i:s', strtotime($post['updated_at'])));
  echo "</p>";
}?>

<hr>

<div>
  <?php echo nl2br(htmlspecialchars($post['content']));?>
</div>

<hr>

<p>
  <a href="edit.php?id=<?php echo $post['id'];?>">수정</a>
  <a href="delete.php?id=<?php echo $post['id'];?>">삭제</a>
  <a href="list.php">목록으로</a>
</p>
</body>
</html>