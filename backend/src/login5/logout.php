<?php
# 세션 시작
# session_start() 
session_start();
# 세션 정보 삭제
# session_unset()
session_unset();
# 세션 종료
# session_destroy()
session_destroy();
# 저장된 쿠키 삭제
# setcookie('', '', time() - 3600)
setcookie('user_id', '', time() - 3600);
# 저장된 session 과 cookie 정보를 삭제 후 login.php로 이동
# header("Location: login.php")
header("Location: mainPage.php");
exit;

?>