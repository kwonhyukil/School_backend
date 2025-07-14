<?php
if (isset($_COOKIE['order'])) {
  $order = json_decode($_COOKIE['order'], true);
  $user = htmlspecialchars($order['user']);
  $latte = htmlspecialchars($order['latte']);
  $iceamericano = htmlspecialchars(($order['iceamericano']));
  echo "<h1>주문 수정</h1>";

  echo "<form action='Lab2_update_cookie.php' method='post'>
          이름:<input type='text' name='user' value='{$user}' required><br>
          라떼 수량:<input type='number' name='latte' value='{$latte}' required><br>
          아메리카노 수량:<input type='number' name='iceamericano' value='{$iceamericano}' required><br>
          <button type='submit'>주문 수정</button><br>
          <button type='button' onclick=\"location.href='Lab2_index.php'\">뒤로가기</button>
        </form>";
}
