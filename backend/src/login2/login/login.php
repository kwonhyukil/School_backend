<?php

session_start()

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

if (isset($_SESSION['error'])) {
  echo "<p style='color: red'>" . htmlspecialchars($_SESSION['error']) . "</p>";
  unset($_SESSION['error']);
} else {
  if(isset($_SESSION['success'])) {
    echo "<p style='color: green'>" . htmlspecialchars(($_SESSION['success'])) . "</p>";
    unset($_SESSION['success']);
  }
}
?>

<form action="login_process.php" method='post'>
  <fieldset>
    <legend>Login Form</legend>
    <label>아이디: <input type="text" id="username" name="username" required></label><br>
    <label>비밀번호: <input type="password" id="password" name="password" required></label><br>

    <input type="submit" value="로그인"><br>
  </fieldset>
</form>
<a href="register.php"><button>회원가입</button></a>


</body>
</html>