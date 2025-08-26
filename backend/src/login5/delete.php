<?php 

require_once 'DB.php';

# DB 연결 확인 : connect error 발생시 exit

# 해당 게시물의 id 값을 GET 방식으로 가져와서 저장

# 해당 게시물의 작성자와 로그인한 사용자가 동일할 경우에만 실행
# True -> 해당 id 를 사용하여 삭제 SQL 문 실행하고 완료되면 Board_list.php로 이동
# False -> 삭제 권한이 없습니다 메시지 출력후 View.php?id=' ' 로 이동

?>