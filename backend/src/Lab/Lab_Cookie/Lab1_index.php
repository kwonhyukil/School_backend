<?php
// 쿠키가 있는지 확인
if (isset($_COOKIE['username'])) {
  $username = htmlspecialchars($_COOKIE['username']);
  echo "안녕하세요, {$username}님!<br>";
  echo "<a href= 'Lab1_delete_cookie.php'>쿠키 삭제 </a>";
} else {
  echo "<form action='Lab1_set_cookie.php' method='post'>
          이름: <input type='text' name='username'>
          <button type=submit'> 저장 </button>
        </form>";
}
