<?php

require 'db.config.php';
# session 시작
session_start();

# db 연결
$db_conn = new mysqli(
  db_info::DB_URL,
  db_info::DB_USER,
  db_info::DB_PASSWORD,
  db_info::DB_NAME
);
$db_conn->set_charset("utf8mb4");

# post 방식으로 전달받은 값 저장
$title = isset($_POST['title']) ? trim($_POST['title']) : '';
$user_id = isset($_POST['user_id']) ? trim($_POST['user_id']) : '';
$content = isset($_POST['content']) ? trim($_POST['content']) : '';
$post = $_POST['post'];

# db 연결 성공 or 실패 확인
if ($db_conn->connect_error) {
  $_SESSION['error'] = "DB 연결 실패";
  exit;
}

# 
if($title === '' || $user_id === '' || $content === '') {
  $_SESSION['error'] = "모든 내용을 입력하세요";
  header("Location: write.php");
  exit;
}
function word_num_check($word, $min, $max) {
  if ($word >= $min && $word <= $max){
    return true;
  } else {
    return false;
  }
}

# 제목
if (!word_num_check(strlen($title), 1, 30 )) {
  $_SESSION['error'] = "제목 글자 수를 맞춰 주세요";
  header("Location: write.php");
  exit;
}
if (!word_num_check(strlen($content), 1, 1000)) {
  $_SESSION['error'] = "내용 글자 수를 맞춰 주세요";
  header("Location: write.php");
  exit;
}

if ($post) {
  $sql = "update post set title='$title', user_id='$user_id', content='$content', updated_at=NOW() WHERE id='$post'";
  $result = mysqli_query($db_conn, $sql);

  if ($result) {
    $_SESSION['success'] = "수정완료!";
    header("Location:view.php?post=$post");
    exit;
  } else {
    $_SESSION['error'] = "수정실패";
    header("Location:view.php?post=$post");
    exit;
  }

} else {

  $sql = "INSERT INTO post(title, user_id, content, created_at) VALUES ('$title', '$user_id', '$content', NOW())";
  $result = $db_conn->query($sql);

  if ($result) {
    $_SESSION['success'] = "작성완료. DB 저장";
    header("Location: list.php");
    exit;
  } else {
    $_SESSION['error'] = "작성실패";
    header("Location: write.php");
    exit;
  }
}

?>