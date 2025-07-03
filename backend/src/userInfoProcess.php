<?php
if (isset($_POST['username']) && isset($_POST['userage'])) {
    echo "{$_POST['username']}님 환영합니다.";
    echo "저도 {$_POST['userage']}살 입니두.";
} else {
    echo "사용자 정보를 입력해주세요.";
}
