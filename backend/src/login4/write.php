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
<h1>게시글 작성</h1>

<?php  
  if (isset($_SESSION['error'])){
    echo "<p style='color: red'>" . htmlspecialchars($_SESSION['error']) . "</p>";
    unset($_SESSION['error']);
  }
  if (isset($_SESSION['success'])) {
    echo "<p style='color: green'>" . htmlspecialchars($_SESSION['success']) . "</p>";
    unset($_SESSION['error']);
  }
?>
<form action="write_process.php" method="post">
<ul>
  <li>
    <label for="title">제목: </label>
    <input type="text" id="title" name="title">
  </li>
  <li>
    <label for="user_id">작성자: </label>
    <input type="text" id="user_id" name="user_id">
  </li>
  <li>
    <label for="content">내용: </label>
    <textarea name="content" id="content" col="10" ></textarea>
  </li>
  <li>
    <button type="submit">게시글 등록</button>
  </li>
</ul>

</form>
  
</body>
</html>