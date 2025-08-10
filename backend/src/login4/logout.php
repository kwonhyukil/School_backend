<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('id','', time() - 3600);
setcookie('password', '', time()- 3600);

header("Location: index.php");
exit;
# 저장된 session 삭제 후 login.php로 이동

?>