<?php
session_start();

?>


<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>로그인</title>
</head>
<body>
  <h1>로그인</h1>
<!-- Form 생성
  Form action login_process.php method post
  1. ID, PW 입력칸 생성
  ID ( input ) : name= user_id
  PW ( input ) : name= password
  2. 로그인 버튼 클릭시 POST 방식으로 login_process.php 로 전달 
  name= login 
  ( button submit )
  3. 회원가입 클릭시 register.php 로 이동
  ( a href='register.php' )
-->
  <?php
  if (isset($_SESSION['error'])) {
    echo "<p style='color: red'>" . htmlspecialchars($_SESSION['error']) . "</p>";
    unset($_SESSION['error']);
  }
  if (isset($_SESSION['success'])) {
    echo "<p style='color: green'>" . htmlspecialchars($_SESSION['success']) . "</p>";
    unset($_SESSION['success']);
  }
  ?>
  <Form action="login_process.php" method="post">
    <ul>
      <li>
        <label for="user_id">아이디: </label>
        <input type="text" id="user_id" name="user_id" required>
      </li>
      <li>
        <label for="password">비밀번호: </label>
        <input type="password" id="password" name="password" required>
      </li>
      <li>
        <button type="submit" name="login">로그인</button>
      </li>
    </ul>
  </Form>
</body>
</html>