<?php
session_start();

if (isset($_SESSION['register'])){
  $msg = "회원가입이 완료되었습니다.";
} else {
  $msg = "회원가입 후 이용 가능합니다.";
}

?>


<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>메인 페이지</title>
</head>
<body>
<h1>메인 페이지</h1>
<!-- 
어숴오쉐오

1. 로그인 버튼 생성 login.php 이동
2. 회원가입 버튼 생성 register.php 이동
-->
<h1>어숴오쉐오 반괍습니담</h1>
<?php 
if (isset($_SESSION['register'])) {
  echo htmlspecialchars($msg);
  unset($_SESSION['register']);
} else {
  echo htmlspecialchars($msg);
}
?>
<div>
  <a href="login.php">로그인</a>
  <a href="register.php">회원가입</a>
</div>

</body>
</html>