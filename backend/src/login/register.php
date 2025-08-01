<?php

?>





<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>회원가입</title>
</head>
<body>

<?php



?>

<form action="register_process.php" method='post'>
  <fieldset>
    <legend>정보 입력~</legend>
      <label for="username">아이디: </label>
      <input type="text" id="username" name="username" required><br><br>

      <label for="password">비밀번호: </label>
      <input type="password" id="password" name="password" required><br><br>

      <label for="name">이름: </label>
      <input type="text" id="name" name="name" required><br><br>

      <input type="submit" value="전송">

  </fieldset>


</form>
</body>
</html>