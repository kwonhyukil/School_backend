<?php
require_once("./db_conf.php");
mysqli_report(MYSQLI_REPORT_STRICT);


try {
  // 1. 연결 설정
  $db_conn = new mysqli(DB_INFO::DB_HOST, DB_INFO::DB_USER, DB_INFO::DB_PW, DB_INFO::DB_NAME);

  // var_dump($db_conn);

  // 예외 처리시 필요 없음.
  // if ($db_conn->connect_errno) {
  //   echo "DB Error: " . $db_conn->connect_errno;
  //   exit;
  // }

  // 2. SQL 전송
  $sql = "select * from student";
  $result = $db_conn->query($sql);

  if (!$result) {
    echo $db_conn->error;
  }

  // 3. 반환 값 처리
  // 레코드 단위
  while ($row = $result->fetch_assoc()) {
    foreach ($row as $key => $value) {
      echo $key . ":" . $value . "<br>";
    }
  }
} catch (Exception $ex) {
  echo $ex->getMessage();
  
} finally {
}
// 4. 연결 종료QD
$db_conn->close();
