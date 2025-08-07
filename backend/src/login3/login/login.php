<?php
require 'function.php';

if ( isset($_POST['login'])) {
  
  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = mysqli_query($db_conn, "SELECT * FROM user WHERE username='$username'");

  if ( mysqli_num_rows($result) === 1) {

    $row = mysqli_fetch_assoc($result); 

    if (password_verify($password, $row['password']) ) {
      header("Location: index.php");
      exit;
    }
  }

  $error = true;
}
?>


<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <style>
    label {
      display: block;
    }
  </style>
</head>
<body>

<h1>HS Login</h1>

<?php if( isset($error) ) : ?>
  <p style="color: red; font-style: italic;">이름 혹은 비밀번호가 잘못 입력되었습니담!</p>

<?php endif; ?>
 

<form action="" method="post">

  <ul>
    <li>
      <label for="username">이름: </label>
      <input type="text" id="username" name="username" required>
    </li>
    <li>
      <label for="password">비밀번호: </label>
      <input type="password" id="password" name="password" required>
    </li>
    <li>
      <button type="submit" name="login">로그인</button>
    </li>
    <li>
      <button><a href="register.php">회원가입</a></button>
    </li>
  </ul>

</form>

</body>
</html>