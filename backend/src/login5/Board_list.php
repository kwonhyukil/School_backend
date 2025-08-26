<?php
# session_start();

# require_once 'DB.php';

# DB 연결정보 불러오고 연결 상태 확인 -> connent error 발생시 exit;

# $sql = "SELECT * FROM poster ORDER BY DESC";
# $result = mysqli_query($db_conn, $sql);



?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>게시글 목록</title>
</head>
<body>
<h1>게시글 목록</h1>

<!-- 
1. 게시글 목록 출력 및 해당 게시글 상제보기 
table
$while($result->mysqli_fetch_array($result))
  echo id
  echo 제목 title -> a태그 사용 (View.php?id=' ')
  echo 작성자 writer
  echo 내용 content
  echo 작성일자 created_at

2. 게시글 작성 버튼 생성 -> 클릭시 write.php 로 이동
3. 로그아웃 -> 클릭시 logout.php 로 이동
-->


</body>
</html>