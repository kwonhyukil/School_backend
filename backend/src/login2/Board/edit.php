<?php


require_once 'db_conf.php';
session_start();

$post = null;

try {

  if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    http_response_code(404);
    exit('잘못된 접근입니다.');
  }

  $id = (int)$_GET['id'];

  $db_conn = new mysqli(DB_URL,DB_USER,DB_PASS,DB_NAME);
  $db_conn->set_charset("utf8mb4");

  $sql = "SELECT id, name, title, content FROM posts WHERE id=$id";
  $result = $db_conn->query($sql);

  if(!$result || $result->num_rows === 0 ) {
    http_response_code(404);
    exit('해당 게시글을 찾을 수 없습니다.');
  }

  $post = $result->fetch_assoc();
} catch (Exception $e) {
  error_log("[ " . date("Y-m-d H:i:s") . $e->getMessage() . PHP_EOL, 3, LOG_FILE_PATH);
  header("Location: list.php");
  exit;
} finally {
  if(isset($db_conn) && $db_conn instanceof mysqli) {
    $db_conn->close();
  }
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>게시글 수정</title>
</head>
<body>
<?php
  if(isset($_SESSION['error'])) {
    echo "<p style='color: red'>" . htmlspecialchars($_SESSION['error']) . "</p>";
    unset($_SESSION['error']);
  }
?>
<form action="edit_process.php" method="post">
  <input type="hidden" name="id" value="<?php echo $post['id']?>">

  <p><strong>작성자: </strong> <?php echo htmlspecialchars($post['id']) ?> </p>

  <p>
    <label for="title">제목:</label><br>
    <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($post['title']);?>" required>
  </p>

  <p>
    <label for="content">내용: </label><br>
    <textarea name="content" id="content" rows="10" cols="50" required><?php echo htmlspecialchars($post['content']);?></textarea>
  </p>

  <p>
    <label for="password">비밀번호 확인</label><br>
    <input type="password" name="password" id="password" required>
  </p>
  <button type="submit">수정완료</button>
  <a href="view.php?id=<?php echo $post['id'];?>">취소</a>
</form>


</body>
</html>