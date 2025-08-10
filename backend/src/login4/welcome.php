<?php

session_start();

$user_id = isset($_SESSION['user_id']) ? htmlspecialchars($_SESSION['user_id']) : "게스트";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>welcome</title>
</head>
<body>
  <!-- 어서오세요 {유저 정보} 님 !! -->
  <h1>어서오세요 <?= $_COOKIE['id']; ?> 님</h1>

<table border="1" cellpadding="10" cellspace="0">
  <?php for ($i = 1 ; $i <= 5 ; $i++) : ?>
    <?php echo "<tr>"; ?>
      <?php for ($j = 1 ; $j <= 5 ; $j++) : ?>
        <?="<td> $i, $j </td>" ?>
      <?php endfor ; ?>
  <?php endfor ;?>
</table>
<!--
  로그아웃 버튼 생성
  
  로그아웃 버튼 클릭시 logout.php로 이동
  -->
  <button><a href="logout.php">로그아웃</a></button>
</body>
</html>