<?php
// 데이터 베이스 설정 정보 포함 (db_info 클래서: URL, USER_ID, PASSWD, DB_NAME 정의)
require_once('./db_conf.php');

// MySQLi 에러 처리 방식 설정
// MYSQLI_REPORT_STRICT : 예외 발생 (mysqli_sql_exception)
// MYSQLI_REPORT_ERROR  : 경고(warning) 출력
// MYSQLI_REPORT_OFF    : 오류 보고 없음 (false 반환)
// MYSQLI_REPORT_ALL    : STRICT + ERROR 조합
mysqli_report(MYSQLI_REPORT_STRICT);

$db_conn = null;

try {
  // 데이터 베이스 연결 시도
  $db_conn = new mysqli(DB_INFO::DB_HOST, DB_INFO::DB_USER, DB_INFO::DB_PW, DB_INFO::DB_NAME);

  // 문자셋 설정 (한글, 이모지 깨짐 방지)
  $db_conn->set_charset("utf8mb4");

  // SQL 쿼리 실행
  $query = "select * from student";
  $result = $db_conn->query($query);
}
