<?php
# require_once 'DB.php'
require_once 'DB.php';
# DB 연결 정보 불러오고 연결 상태 확인 -> connect error 발생시 exit;
if ($db_conn->connect_error) {
    $_SESSION['error'] = "데이터 연결실패";
    exit;
}
# write.php 에서 전달한 데이터 ( title, writer, content ) 값 저장
#   1) $title = isset($_POST['title']) 가 존재하는지 확인
#   2) $writer = isset($_POST['writer']) 가 존재하는지 확인
#   3) $content = isset($_POST['content']) 가 존재하는지 확인
$title = isset($_POST['title']) ? trim($_POST['title']) : '';
$writer = isset($_POST['writer']) ? trim($_POST['writer']) : '';
$content = isset($_POST['content']) ? trim($_POST['content']) : '';
# 전달 받은 ( $title, $writer, $content )가 공백인지 검증하고 공백일 경우
#   1) header("Location: write.php") 로 이동 exit;
if ($title === '' || $writer === '' || $content === ''){
    $_SESSION['error'] = "모든 내용을 입력하세욥";
    header("Location: write.php");
    exit;
}
$title = mysqli_real_escape_string($db_conn, $title);
$writer = mysqli_real_escape_string($db_conn, $writer);
$content = mysqli_real_escape_string($db_conn, $content);

# 전달 받은 ( $title, $writer, $content )의 글자 수 검증을 위한 함수 생성
function word_num_check($a, $min, $max) {
    if ( $a < $min || $a > $max){
        return false;
    }
    return true;
}

# 제목  ( title )    1자 이상 30자 이하   ( 함수 호출하여 반환값으로 True or False ) 
# 작성자( writer )   1자 이상 20자 이하   ( 함수 호출하여 반환값으로 True or False )
# 내용은( content )  1자 이상 1000자 이하 ( 함수 호출하여 반환값으로 True or False )
# false 일 경우 에러 메시지 저장

if (!word_num_check(strlen($title), 1, 30)){
    $_SESSION['title'] = $title;
    $_SESSION['error'] = "제목의 글자 수를 확인하세요";
    header("Location: write.php");
    exit;
}
if (!word_num_check(strlen($writer), 1, 20)){
    $_SESSION['writer'] = $writer;
    $_SESSION['error'] = "작성자의 글자 수를 확인하세요";
    header("Location: write.php");
    exit;
}
if (!word_num_check(strlen($content), 1, 1000)){
    $_SESSION['content'] = $content;
    $_SESSION['error'] = "내용의 글자 수를 확인하세요";
    header("Location: write.php");
    exit;
}

$sql = "INSERT INTO poster(title, writer, content) VALUES ('$title', '$writer', '$content')";
$result = mysqli_query($db_conn, $sql);

# 글자 수 검증이 완료 후 DB에 저장 SQL 문 작성
# $sql = "INSERT INTO poster VALUES (title, writer, content, created_at(NOW()))
# $result = mysqli_query($db_conn, $sql)

# $result 의 실행 결과가 True 일 경우 -> Board_list.php로 이동 후 성공 메시지 출력
# $result 의 실행 결과가 False 일 경우 -> write.php 로 이동 후 에러 메시지 출력


?>