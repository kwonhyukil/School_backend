<?php

session_start();

?>


<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>게시글 작성</title>
</head>
<body>
  <h2>게시글 작성</h2>
  
<?php
// 오류 있을 경우 출력
if(isset($_SESSION['error'])) {
  echo "<p style='color=red;'>" . $_SESSION['error'] . "</p>";
  unset($_SESSION['error']);
}
?>

<form action="wirte_process.php" method="post">
  <fieldset>
    <legend>게시글 작성</legend>
    <label for="name">작성자 이름</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="password">비밀번호</label>
    <input type="password" id="npassword" name="password" required><br><br>

    <label for="title">제목</label>
    <input type="text" id="title" name="title" required><br><br>

    <label for="content">내용</label>
    <textarea type="text" id="content" name="content" required></textarea><br><br>

    <input type="submit" value="등록하기">
  </fieldset>
</form>


</body>
</html>