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

<!--
Form action="login.php" method="post"
1. 사용자 아이디 입력창 생성 user_id
2. 사용자 비밀번호 입력창 생성 password
3. 자동로그인 check box 생성 check
4. 로그인 버튼 생성하여 클릭시 form을 post 방식으로 login_process.php 에 전달한다.
5. 뒤로가기 버튼 생성하여 클릭시 mainpage.php 로 이동
-->
<h1>로그인</h1>

<?php
  if(isset($_SESSION['error'])) {
    echo htmlspecialchars($_SESSION['error']);
    unset($_SESSION['error']);
  }
?>
<form action="login_process.php" method="post">
  <table border="1" cellpadding="10">
    <tr>
      <td><label for="user_id">ID </label></td>
      <td><input type="text" id="user_id" name="user_id"></td>
    </tr>
    <tr>
      <td><label for="password">PASSWORD</label> </td>
      <td><input type="password" id="password" name="password"></td>
    </tr>
    <tr>
      <td><label for="remember-me">자동로그인</label></td>
      <td><input type="checkbox" id="remember-me" name="remember-me"></td>      
    </tr>
  </table>
  <br>
  <button type="submit">로그인</button>
  <button><a href="mainpage.php">메인 페이지</a></button>
</form>

</body>
</html>