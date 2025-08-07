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
  <h2>로그인</h2>
<?php
if(isset($_SESSION['error'])) {
  echo "<p style='color:red'>" . htmlspecialchars($_SESSION['error']) . "</p>";
  unset($_SESSION['error']);
} else {
  if (isset($_SESSION['success'])) {
    echo "<p style='color: green'>" . htmlspecialchars($_SESSION['success']) . "</p>";
    unset($_SESSION['success']);
  }
}
?>

<form action="login_process.php" method="post">
  <fieldset>
      <legend>로그인 정보 입력</legend>

      <label>아이디: <input type="text" name="username" required autocomplete="current-name"></label><br>

      <label>비밀번호: <input type="password" name="password" required autocomplete="current-password"></label><br>

      <input type="submit" value="로그인">
</form><br>
<a href="register.php"><button>회원가입</button></a>
</fieldset>
</body>
</html>