<?php
session_start();

require_once 'DB.php';
# require_once 'DB.php';

# $sql = "SELECT * FROM poster ORDER BY DESC";
# $result = mysqli_query($db_conn, $sql);
// if ( !isset($_SESSION['login'])){
//   header("Location: mainpage.php");
//   exit;
// }

if ( isset($_COOKIE['login'])){
  $remember = "자동 로그인 ON";
} else {
  $remember = "자동 로그인 OFF";
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>게시글 목록</title>
</head>
<body>
<h1>게시글 목록</h1>
<p><?= "어서오세욥 " . $_COOKIE['user_id'] . "님! " . $remember ;?></p>
<?php
if ( isset($_SESSION['error'])){
  echo htmlspecialchars($_SESSION['error']);
  unset($_SESSION);
}
?>
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
<a href="write.php">게시글 작성</a>
<a href="logout.php">로그아웃</a>


</body>
</html>