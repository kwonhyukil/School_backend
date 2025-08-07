<?php
require_once 'function.php';

if (isset($_POST['register'])) {
  
  if ( register($_POST) > 0) {
    echo "<script>
    alert('회원가입이 완료되었습니다 !!');
    window.location.href ='login.php';
    </script>";
  } else {
    echo mysqli_error($db_conn);
  }
}

?>


<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>Register!</title>
  <style>
    label {
      display: block;
    }
  </style>
</head>
<body>

<h1>HS Register</h1>
<form action="" method="post">
  <ul>
    <li>
      <label for="username">이름: </label>
      <input type="text" id="username" name="username" required>
    </li>
    <li>
      <label for="password">비밀번호: </label>
      <input type="password" id="password", name="password" required>
    </li>
    <li>
      <label for="password2">비밀번호 확인: </label>
      <input type="password" id="password2" name="password2" required>
    </li>
    <li>
      <button type="submit" name="register">회원가입</button>
      <button><a href="login.php">취소</a></button>
    </li>
    
  </ul>
  
</form>

  
</body>
</html>