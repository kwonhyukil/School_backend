<?php

// Operater
/*
 1. 기능
 2. 우선순위
 3. 이항연산 시 묵시적 형변환 규칙
*/

/*
 1. 기능
 - 산술 연산자 : +, -, *, /, %, **(거듭제곱)
 - 비교 연산자 : ==, !=, ===, !==, >, <, >=, <=
 - 논리 연산자 : &&(AND), ||(OR), !(NOT)
 - 대입 연산자 : =, +=, -=, *=, /=, %=, .=(문자열 연결)
 - 삼항 연산자 : 조건 ? 참 : 거짓
 - 비트 연산자 : &, |, ^(XOR), ~, <<(왼쪽 시프트), >>(오른쪽 시프트)
*/

$bar = 1;
$foo = 1.0;

// if ($bar == $foo) // 값만 비교
// if ($bar === $foo) // 값과 타입을 비교
// if ($bar != $foo) // 값만 비교
// if ($bar !== $foo) // 값과 타입을 비교
if ($bar === $foo) { // 값과 타입을 비교 ( 동적 언어에서는 값과 타입을 비교하는 연산자를 제공한다. )
    echo "같습니다.<br />";
} else {
    echo "다릅니다.<br />";
}
// if ($bar <=> $foo) // 스페이스쉽 연산자 (PHP 7.0 이상) - 두 값을 비교하여 -1, 0, 1을 반환

$Bar = 1;
$Foo = 2;

echo ($Bar <=> $Foo) . "<br />"; // -1 ( $Bar가 $Foo보다 작으므로 -1 반환 )
print_r($Bar <=> $Foo); // -1
echo "<br />";

if ($Bar <=> $Foo) {
    echo "같습니다.<br />";
} else {
    echo "다릅니다.<br />";
}

$my_array = [10, 1, 5, 90, 3];

usort($my_array, function ($a, $b) {
    return $a <=> $b; // 스페이스쉽 연산자를 사용하여 두 값을 비교
    // if ($a == $b) {
    //     return 0;
    // } else {
    //     return ($a < $b) ? -1 : 1; // $a가 $b보다 작으면 -1, 크면 1 반환
    // }
});

var_dump($my_array);

/*
 논리 연산자 : !, &&, ||
             and, or
*/
echo "<br />";

$bar = true && false; // AND 연산
var_dump($bar); // false

$foo = true and false; // AND 연산
var_dump($foo); // true (우선순위 때문에 true가 할당됨)

echo "<br />" . $bar;

/*
 문자열 연산자


*/
// 느슨한 형변환
echo "hello" . "world"; // helloworld (문자열 연결)
echo "<br />";
echo "hello" . 123; // hello123 (문자열과 숫자를 연결)
echo "<br />";
echo "hello" . 1.23; // hello1.23 (문자열과 실수를 연결)
echo "<br />";
// 강한 형변환
echo "1" + "2"; // 3 (문자열을 숫자로 변환하여 더함)
echo "<br />";
echo "1" + 2; // 3 (문자열을 숫자로 변환하여 더함)
echo "<br />";
echo "1" + 2.5; // 3.5 (문자열을 숫자로 변환하여 더함)
echo "<br />";
echo "1" + "2.5"; // 3.5 (문자열을 숫자로 변환하여 더함)
echo "1" + "222ff"; // 223 (문자열을 숫자로 변환하여 더함)

$bar = "Hello";
$bar .= " World"; // 문자열 연결
echo "<br />" . $bar; // Hello World

/*
 에러제어 연산자 : @
    - 에러를 무시하고 실행
*/
@include 'sadklsdflkj.php'; // 파일이 없으면 에러를 무시하고 실행

/*
 실행연산자 : ``
    - 쉘 명령어를 실행하고 결과를 반환
*/
$result = `ls -la`; // 현재 디렉토리의 파일 목록을 가져옴
echo "<pre>$result</pre>"; // 결과를 출력

/*
 배열 연산자:
    - + : 배열 합치기
    - == : 배열 값 비교
    - === : 배열 값과 키 비교
    - != : 배열 값 비교 (같지 않음)
    - <> : 배열 값 비교 (같지 않음)
    - !== : 배열 값과 키 비교 (같지 않음)
*/

/* Array -> 순서가 보장된 HashMap : Key - Value Pair
   - PHP에서 배열은 순서가 있는 해시맵으로 구현됨
   - 키와 값의 쌍으로 이루어진 데이터 구조
   - 키는 문자열 또는 정수, 값은 어떤 타입도 가능
   - 순서가 보장됨 (PHP 7.0 이상)
   - 중복된 키는 허용되지 않음
   - Key => Value 형태로 데이터 저장
*/
$bar = [1, 10, 5];
$foo = array(1, 10, 5);
if ($bar == $foo) { // 값만 비교
    echo "같습니다.<br />";
} else {
    echo "다릅니다.<br />";
}
// HashMap : 배열처럼 보이지만 키와 값의 쌍으로 이루어진 데이터 구조
echo $bar[1] . "<br />"; // 10

// Key => Value 형태로 데이터 저장
$bar = [3 => 1, "mynum" => 10, 5];
var_dump($bar); // 배열의 키가 0, 2, 3으로 설정됨
echo "<br />";

$baR = [1, 2, 3];
$foO = [1, 2 => 3, 1 => 2];

var_dump($baR);
echo "<br />";
var_dump($foO);
echo "<br />";

if ($baR == $foO) { // 값만 비교
    echo "같습니다.<br />";
} else {
    echo "다릅니다.<br />";
}
if ($baR === $foO) { // 값과 키를 비교
    echo "같습니다.<br />";
} else {
    echo "다릅니다.<br />";
}

echo 1 + "2";
// int + string
//        int(String)
// 3 (문자열을 숫자로 변환하여 더함)
echo 2 > 4 ? "참" : "거짓";
