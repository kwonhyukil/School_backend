<?php
require_once 'DB.php';

session_start()


?>


<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>회원가입</title>
</head>
<body>
<!-- 
session["error"] 가 있을 경우 ( isset ) 에러 메시지를 출력함.


회원가입 Form 작성
form action="register_process.php method="post"
  1. 사용자 아이디 ( user_id ) 
  2. 사용자 이름 ( name )
  3. 사용자 비밀번호 ( password )
입력을 받고
전송 버튼 클릭시 post 방식으로 register_process.php 로 전달
뒤로가기 버튼 클릭시 mainpage로 이동
-->
<h1>회원가입</h1>

<?php
if (isset($_SESSION['error'])) {
  echo htmlspecialchars($_SESSION['error']);
  unset($_SESSION['error']);
}
?>

<form action="register_process.php" method="post">
  <div>
    <label for="user_id">아이디: </label>
    <input type="text" id="user_id" name="user_id" required>
  </div>
  <div>
    <label for="name">이름: </label>
    <input type="text" id="name" name="name" required>
  </div>
  <div>
    <label for="password">비밀번호: </label>
    <input type="password" id="password" name="password" required>
  </div>
  <button type="submit">회원가입</button>
  <button><a href="mainpage.php">뒤로가기</a></button>
</form>  
</body>
</html>