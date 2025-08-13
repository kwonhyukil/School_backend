<?php
  
require_once 'db.config.php';

session_start();
# DB 연결
$db_conn = new mysqli (
  db_info::DB_URL,
  db_info::DB_USER,
  db_info::DB_PASSWORD,
  db_info::DB_NAME
);
$db_conn->set_charset("utf8mb4");

# 게시글 ID 가져오기
$post = $_GET['post'];

# 가져온 게시글 DB에서 삭제
$sql = "DELETE FROM post WHERE id='$post'";

# result에 query 실행 결과 저장
$result = mysqli_query($db_conn, $sql);


# result 값이 true 일경우 삭제o false 일경우 삭제 x
if($result) {
  $_SESSION['success'] = "삭제완료";
  header("Location: list.php");
  exit;
} else {
  $_SESSION['error'] = "삭제실패";
  header("Location:view.php?post='$post'");
  exit;
}

?>