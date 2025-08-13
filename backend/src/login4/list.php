<?php

require_once 'db.config.php';
session_start();

# DB 연결
$db_conn = new mysqli(
  db_info::DB_URL,
  db_info::DB_USER,
  db_info::DB_PASSWORD,
  db_info::DB_NAME
);
$db_conn->set_charset('utf8mb4');

# DB 연결 확인
if ($db_conn->connect_error){
  $_SESSION['error'] = "DB연결 실패";
  exit;
}

# 페이지네이션
# 1. 현재 페이지 받아오기
?>



<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>게시판</title>
</head>
<body>
<!--게시글 출력 Table 생성 
  1. No = id, 제목 = Title, 작성자 = user_id, 작성시간 = created_at
  2. 각 항목에 맞는 위치에 배치하기
  3. DB에서 post 테이블 가져오는 sql문 작성 ( 오름차순 )
  4. SELECT id, title, user_id, created_at FROM post ORDER BY id ASC;
  5. 각 제목에 해당하는 항목에 해당하는 값 생성
-->

<h1>게시글 목록</h1>
<table width=800 border="1" cellpadding="5">
  <tr>
    <th>No</th>
    <th>제목</th>
    <th>작성자</th>
    <th>작성시간</th>
  </tr>
<?php
  $sql = "SELECT id, title, user_id, content, created_at FROM post ORDER BY id ASC";
  $result = mysqli_query($db_conn, $sql);

  while($data = mysqli_fetch_array($result)){
?>
  <tr>
    <td><a href="view.php?post=<?=$data['id']?>"><?=$data['id'];?></a></td>
    <td><?= $data['title'];?></td>
    <td><?= $data['user_id'];?></td>
    <td><?= $data['created_at'];?></td>
  </tr>
<?php }; ?>
</table>
<a href="write.php">글쓰기</a>
<a href="welcome.php">뒤로가기</a>
</body>
</html>