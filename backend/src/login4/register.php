<?php

session_start();

?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>회원가입</title>
</head>
<body>
<!--
  회원가입 Form 생성
  1. 사용자 ID, PW 를 입력
    ID ( input ) : name= user_id
    PW ( input ) : name= password
  2. 회원가입 버튼 클릭시 POST 방식으로 register_process.php 로 전달
    button submit
  3. 취소 클릭시 login.php 로 이동
-->
  <h1>Register</h1>
<?php 
  if (isset($_SESSION['error'])) {
    echo "<p style='color: red'>" . htmlspecialchars($_SESSION['error']) . "</p>";
    unset($_SESSION['error']);
  } 
  if (isset($_SESSION['success'])) {
    echo "<p style='color: green'>" . htmlspecialchars($_SESSION['success']) . "</p>";
    unset($_SESSION['error']);
  }
?>
<form action="register_process.php" method="post">
  <ul>
    <li>
      <label for="user_id">사용자 ID: </label>
      <input type="text" id="user_id" name="user_id" required>
    </li>
    <li>
      <label for="password">사용자 PW</label>
      <input type="password" id="password" name="password" required>
    </li>
    <li>
      <button type="submit">회원가입</button>
    </li>
    <li>
      <button><a href="index.php">취소</a></button>
    </li>
  </ul>
</form>
</body>
</html>