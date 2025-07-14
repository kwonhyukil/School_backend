<?php
if (isset($_COOKIE['order'])) {
  $order = json_decode($_COOKIE['order'], true);
  $user = htmlspecialchars($order['user']);
  $latte = htmlspecialchars($order['latte']);
  $iceamericano = htmlspecialchars($order['iceamericano']);
  echo "<h3>{$user}님의 주문 내용</h3> <br>";
  echo "<li>라떼: {$latte}잔<br></li>";
  echo "<li>아이스 아메리카노: {$iceamericano}잔</li>";
  echo "<a href='Lab2_edit_order.php'>주문 수정</a><br>";
  echo "<a href='Lab2_delete_cookie.php'>주문 초기화</a>";
} else {
  echo "<h1>음료 주문</h1>";
  echo "<form action='Lab2_set_cookie.php' method='post'>
          이름:<input type='text' name='user' required><br>
          라떼 수량:<input type='number' name='latte' required><br>
          아이스 아메리카노 수량:<input type='number' name='iceamericano' required><br>
          <button type='submit'>주문하기</button>
        </form>";
}
