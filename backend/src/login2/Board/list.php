<?php


require_once 'db_conf.php';
session_start();

// 현재 페이지 번호 설정 (기본값: 1)
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;

// 페이지당 게시글 수 및 OFFSET 계산
$limit = 5;
$offset = ($page - 1) * $limit;


try {
  // DB 연결
  $db_conn = new mysqli(DB_URL, DB_USER,DB_PASS,DB_NAME);
  $db_conn->set_charset("utf8mb4");

  // 전체 게시글 수 조회 -> 총 페이지 수 계산을 위해 필요
  $count_sql = "SELECT count(*) AS total FROM posts";
  $count_result = $db_conn->query($count_sql);
  $total_posts = $count_result->fetch_assoc()['total'];
  $total_pages = ceil($total_posts / $limit); // 전체 페이지 수 계산
  
  $sql = "SELECT id, name, title, created_at
          FROM posts
          ORDER BY id DESC
          LIMIT $limit OFFSET $offset";
  $posts = $db_conn->query($sql);
  
  
} catch (Exception $e) {
  error_log('[ ' . date('Y-m-d h:i:s') . '] ' . $e->getMessage(). PHP_EOL, 3, LOG_FILE_PATH);
  $_SESSION['error'] = "게시글 목록을 불러오는 중 오류가 발생했습니다.";
} finally {
  // DB 연결 종료
  if (isset($db_conn) && $db_conn instanceof mysqli) {
    $db_conn->close();
  }
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>게시판</title>
</head>
<body>
  <h1>게시판</h1>
  
  <?php 
  if (isset($_SESSION['error'])) {
    echo "<p style='color: red;'>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']);
  };
  ?>

<table border="1" cellpadding="8" cellspacing="0">
  <thead>
    <tr>
      <th>번호</th>
      <th>제목</th>
      <th>작성자</th>
      <th>작성일</th>
    </tr>
  </thead>
  <tbody>
  <?php
    if(!empty($posts) && $posts instanceof mysqli_result) {
      while ($post = $posts->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($post['id']) . "</td>";
        echo "<td><a href='view.php?id=" . urlencode($post['id']) . "'>" . htmlspecialchars($post['title']) . "</a></td>";
        echo "<td>" . htmlspecialchars($post['name']) . "</td>";
        echo "<td>" . htmlspecialchars(date('Y-m-d', strtotime($post['created_at']))) . "</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='4'>게시글이 없습니다.</td></tr>";
    }
  ?>
  </tbody>
</table>
  <!-- 페이지네이션 출력-->
<div style="margin: top 20px;">
  <?php
  if ($total_pages > 1) {
    echo "<p>페이지: ";
    for ($i = 1 ; $i <= $total_pages ; $i++) {
      if ($i == $page) {
        echo "<strong>$i</strong>";
      } else {
        echo "<a href='?page=$i'>$i</a>";
      }
    }
    echo "</p>";
  }
  ?>
</div>

<p><a href="write.php">글쓰기</a></p>

</body>
</html>