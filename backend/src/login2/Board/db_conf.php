<?php


// 데이터 베이스 접속 정보
define('DB_URL', 'db');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'gsc');

// 에러 로그 경로
define('LOG_FILE_PATH', '/var/tmp/db_error.log');

// MySQLi 예외 기반 에러 보고 설정
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);