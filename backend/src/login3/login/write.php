<?php
require_once 'function.php';

if ( isset($_POST['write'])) {

  if ( write($_POST) > 0) {
    echo "<script>
    alert('게시물 등록이 완료되었습니다.');
    window.location.href = 'index.php';
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
  <title>글 작성</title>
</head>
<body>
<h1>게시글 작성</h1>
<form action="" method="post">
  <ul>
    <li>
      <label for="title">제목: </label>
      <input type="text" id="title" name="title" required>
    </li>
    <li>
      <label for="writer">작성자: </label>
      <input type="text" id="writer" name="writer" required>
    </li>
    <li>
      <label for="content">내용: </label>
      <textarea name="content" id="content" cols="30" rows="5"></textarea>
    </li>
    <li>
      <button type="submit" name="write">등록하기</button>
    </li>
  </ul>
</form>
  
</body>
</html>