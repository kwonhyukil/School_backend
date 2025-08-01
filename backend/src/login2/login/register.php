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

  
<fieldset>
  <legend>회원가입 ~</legend>
    <form action="register_process.php" method='post'>
      <label>아이디: <input type="text" id="username" name="username" required></label><br>
      <label>비밀번호: <input type="password" id="password" name="password" required></label><br>
      <label>이름: <input type="text" id="name" name="name" required></label><br>
      <input type="submit" value="회원가입"><br>
    </form>
    <a href="main_page.php"><button>취소</button></a>
</fieldset>
  
</body>
</html>