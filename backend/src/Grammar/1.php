<?php

// 변수 선언 -> 동적 타이핑 or 정적 타이핑
//  1. 변수명은 문자, 숫자, 밑줄(_)로 시작할 수 있고, 숫자로 시작할 수 없음
//  2. 변수명은 대소문자를 구분함
//  3. 변수명은 예약어를 사용할 수 없음
//  4. 변수명은 특수문자를 사용할 수 없음
//  5. 변수명은 길이에 제한이 없음
//  6. 변수명은 의미 있는 이름을 사용하는 것이 좋음
//  7. 변수 선언 방법
//  $변수명 = 값;
//  $name = "John";
//  $age = 30;
//  $isStudent = true;
//  $height = 1.75;
//  $colors = array("red", "green", "blue");
//  $person = array("name" => "John", "age" => 30, "isStudent" => true, "height" => 1.75, "colors" => array("red", "green", "blue"));
//  $person = ["name" => "John", "age" => 30, "isStudent" => true, "height" => 1.75, "colors" => ["red", "green", "blue"]];
//  $person = (object) ["name" => "John", "age" => 30, "isStudent" => true, "height" => 1.75, "colors" => ["red", "green", "blue"]];
//  $person = new stdClass();
//  $person->name = "John";
//  $person->age = 30;
//  $person->isStudent = true;
//  $person->height = 1.75;
//  $person->colors = ["red", "green", "blue"];
//  $person = new Person("John", 30, true, 1.75, ["red", "green", "blue"]);
// 변수의 자료형
//  PHP는 동적 타이핑 언어로, 변수의 자료형을 명시하지 않아도 됨
//  변수의 자료형은 다음과 같이 나눌 수 있음
//  1. 스칼라 자료형
//     - 정수형 (Integer): 정수 값을 저장하는 자료형
//     - 실수형 (Float): 소수점을 포함하는 숫자 값을 저장하는 자료형
//     - 문자열 (String): 문자들의 집합을 저장하는 자료형
//     - 불리언 (Boolean): 참(true) 또는 거짓(false) 값을 저장하는 자료형
//  2. 복합 자료형
//     - 배열 (Array): 여러 값을 저장할 수 있는 자료형
//     - 객체 (Object): 클래스의 인스턴스를 저장하는 자료형
//  3. 특별한 자료형
//     - NULL: 값이 없음을 나타내는 자료형
//     - 리소스 (Resource): 외부 자원(파일, 데이터베이스 연결 등)을 나타내는 자료형
// 변수의 접근 범위
//  PHP에서 변수의 접근 범위는 다음과 같이 나눌 수 있음
//      1. 전역 변수 (Global Variable): 함수 외부에서 선언된 변수로, 함수 내부에서 사용하려면 `global` 키워드를 사용해야 함
//      2. 지역 변수 (Local Variable): 함수 내부에서 선언된 변수로, 함수 외부에서는 접근할 수 없음
//      3. 정적 변수 (Static Variable): 함수 내부에서 선언된 변수로, 함수가 호출될 때마다 초기화되지 않고, 함수가 종료된 후에도 값을 유지함
//      4. 슈퍼글로벌 변수 (Superglobal Variable): PHP에서 자동으로 생성되는 전역 변수로, 모든 스코프에서 접근할 수 있음
//          - 예: $_GET, $_POST, $_SESSION, $_COOKIE, $_SERVER 등
// 변수의 생명주기
//  PHP에서 변수의 생명주기는 다음과 같이 나눌 수 있음
//      1. 선언: 변수를 선언할 때 메모리에 공간이 할당됨
//      2. 초기화: 변수를 선언한 후 값을 할당하면 초기화됨
//      3. 사용: 변수를 사용하여 값을 읽거나 수정할 수 있음
//      4. 소멸: 변수가 더 이상 사용되지 않으면 메모리에서 해제됨

// 변수의 자료형

$bar = 15;
$foo = 2.0;
$kin = true;
$pos = "hello";

var_dump($bar, $foo, $kin, $pos);

function bar($arg)
{
    foreach ($arg as $key => $value) {
        echo "Key: $key, Value: $value<br>";
    }
}

$foo = [1, 2, 3];

bar($foo);
var_dump($foo);

// 1급시민

// 1급 시민 (First-class citizen) -> 함수가 일급 객체로 취급됨
// 1급 객체 (First-class object) -> 함수가 일급 객체로 취급됨
// 일급 객체의 특징
// 1. 변수에 할당할 수 있음
// 2. 함수의 인자로 전달할 수 있음
// 3. 함수의 반환값으로 사용할 수 있음
// 4. 다른 객체의 속성으로 사용할 수 있음
// 5. 함수 내부에서 정의할 수 있음
// 6. 함수 내부에서 호출할 수 있음
// 7. 함수 내부에서 다른 함수를 정의할 수 있음
// 8. 함수 내부에서 다른 함수를 호출할 수 있음
// 9. 함수 내부에서 다른 함수를 반환할 수 있음
// 10. 함수 내부에서 다른 함수를 인자로 전달할 수 있음
// 11. 함수 내부에서 다른 함수를 속성으로 사용할 수 있음
// 12. 함수 내부에서 다른 함수를 메소드로 사용할 수 있음
// 13. 함수 내부에서 다른 함수를 클래스의 속성으로 사용할 수 있음
// 14. 함수 내부에서 다른 함수를 클래스의 메소드로 사용할 수 있음
// 15. 함수 내부에서 다른 함수를 클래스의 생성자로 사용할 수 있음

$bar = function ($x) {
    echo $x;
};

// 1급 객체로 취급되는 익명 함수
function foo($arg)
    // 1급 객체로 취급되는 함수
{
    return $arg;
}

$kin = foo($bar);
$kin("msg");

var_dump($bar);
