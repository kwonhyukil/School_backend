<?php

// read_session.php
// print_r($_SESSION);

// read
$name = $_SESSION['std_info']['name'];
echo $name;

// Delete
unset($_SESSION['std_info']['name']);

// Delete All 메모리상
$_SESSION = [];

// Delete File 파일 삭제
session_destroy();

print_r($_SESSION);

if (ini_get('session.us.cookies')) {
  // 현재 세션 쿠키의 설정 정보 가져오기
  $params = session_get_cookie_params();

  // 세션 쿠키 삭제 ( 만료시간 : 과거 )
  setcookie(session_name(), '', [
    'expires' => time() - 3600, // 쿠기 만료
    'path' => $params['path'], // 경로 맞춰야 삭제됨
    'domain' => $params['domain'], // 도메인 맞춰야 삭제됨
    'secure' => $params['secure'], // HTTPS 사용 여부
    'httponly' => $params['httponly'], // JavaScript 접근 방지
    'samesite' => $params['samesite'] ?? 'Lax' // PHP 7.3+용 옵션
  ]);
}