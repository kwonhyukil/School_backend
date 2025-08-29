<?php
require_once 'DB.php';

session_start();
# DB 연결 확인 : connect error 발생시 exit

if ($db_conn->connect_error) {
    $_SESSION['error'] = "DB 연결 실패";
    exit;
}
# 해당 게시물의 id 값을 GET 방식으로 가져와서 저장
$id = isset($_GET['id']) ? (int)$_GET['id'] : '';

# 게시글 작성자 확인
$sql = "SELECT * FROM poster WHERE id=$id";
$result = mysqli_query($db_conn, $sql);
$row = mysqli_fetch_assoc($result);

if ($row['writer'] == $_COOKIE['user_id']) {
    $sql = "DELETE FROM poster WHERE id='$id'";
    
    if (mysqli_query($db_conn, $sql)) {
        $_SESSION['success'] = "게시글 삭제 성공";
        header("Location: Board_list.php");
        exit;
    } 
} else {
    $_SESSION['error'] = "게시글 삭제 실패. 작성자와 로그인 유저의 정보가 일치하지 않습니다.";
    header("Location: view.php?id='$id'");
    exit;
}

# 해당 게시물의 작성자와 로그인한 사용자가 동일할 경우에만 실행
# True -> 해당 id 를 사용하여 삭제 SQL 문 실행하고 완료되면 Board_list.php로 이동
# False -> 삭제 권한이 없습니다 메시지 출력후 View.php?id=' ' 로 이동

?>