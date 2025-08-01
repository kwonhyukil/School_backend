<?php

session_start();
?>


<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>환영합니다</title>
</head>
<body>
  <h2>환영합니다.</h2>
  <h1>세션 정보<br><? print_r($_SESSION)?></h1>
  <h2>안녕하세요 <?= htmlspecialchars($_SESSION['name']) ?> 님!</h2>
  
  <a href="login.php">로그아웃!</a>
</body>
</html>