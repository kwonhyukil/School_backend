<?php

# require_once 'DB.php'

# 1. DB 연결정보 불러오고 연결 상태 확인 -> connect error 발생시 exit


# 2. login.php 에서 post 방식으로 전달된 정보 저장
#    1) $user_id = isset($_POST['user_id]) 가 존재하는 지 확인
#    2) $password = isset($_POST['password']) 가 존재하는 지 확인

# 3. 전달 받은 ( $user_id and $password ) 공백인지 확인하고 공백일 경우 
#    1) header("location: login.php") , exit

# 4. $user_id 를 사용하여 데이터 베이스에 해당 아이디가 존재하는 지 확인
#    1) $sql = SELECT user_id from user user_id='$user_id'
#    2) $result = mysli_query($db_conn, $sql)
#    3) $row = mysqli_fetch_assoc($result)


# 5. $result 의 값이 없을 경우 ($user_id 가 없을 경우)
#    1) $user_id 가 존재하지 않음 -> 에러 메시지를 추가하고 login.php로 이동

# 6. $result 의 값이 있을 경우 ($user_id 가 있을 경우)
#    1) 해시 처리된 password 의 값과 전달받은 password의 값을 비교
#    2) password_verify($password, $row['password]) 의 값이 True or Fasle
#    3) True 일 경우 로직 계속 실행
#    4) False 일 경우 에러 메시지 추가하고 login.php로 이동

# 7. $user_id 와 password가 모두 일치할 경우
#    1) $user_id 와 password를 session에 저장 후 welcome.php 로 이동
#    $SESSION['user_id'] = $user_id
#    $SESSION['login'] = True
#    2) POST['check'] 가 있을 경우 setcookie('','',time() + 3600 ) -> 로그인 성공 -> welcome.php 로 이동


?>