<?php

/* * module.php
 * 모듈화는 코드의 재사용성과 유지보수성을 높이는 데 도움을 줍니다.

 1. include
    - 파일을 포함하여 코드 재사용
    - 파일이 없으면 경고 메시지를 출력하고 계속 실행
    - 예: include 'file.php';
 2. require
    - 파일을 포함하여 코드 재사용
    - 파일이 없으면 치명적인 오류를 발생시키고 실행 중단
    - 예: require 'file.php';

 3. include_once
    - 파일을 한 번만 포함
    - 이미 포함된 파일은 다시 포함하지 않음
    - 예: include_once 'file.php';
 4. require_once
    - 파일을 한 번만 포함
    - 이미 포함된 파일은 다시 포함하지 않음
    - 파일이 없으면 치명적인 오류를 발생시키고 실행 중단
*/
// include 'function.php'; // 함수 파일 포함
// require 'function.php'; // 함수 파일 필수 포함
include_once 'Function.php'; // 함수 파일을 한 번만 포함
// require_once 'Function.php'; // 함수 파일을 한 번만 필수 포함

echo sum(1, 5);
