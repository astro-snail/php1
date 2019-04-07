<?php
/*1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:
если $a и $b положительные, вывести их разность;
если $а и $b отрицательные, вывести их произведение;
если $а и $b разных знаков, вывести их сумму;
ноль можно считать положительным числом.*/

$a = 10;
$b = -2;

echo "a = $a\n";
echo "b = $b\n";

if ($a >= 0 && $b >= 0) {
    echo $a - $b;
} elseif ($a < 0 && $b < 0) {
    echo $a * $b;
} else {
    echo $a + $b;
}

/*2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15.*/

$a = rand(0, 15); 
echo "a = $a\n";

switch ($a) {
    case 0:
        echo 0;
        echo "\n";
    case 1:
        echo 1;
        echo "\n";
    case 2:
        echo 2;
        echo "\n";
    case 3:   
        echo 3;
        echo "\n";
    case 4:
        echo 4;
        echo "\n";
    case 5:
        echo 5;
        echo "\n";
    case 6:
        echo 6;
        echo "\n";
    case 7:
        echo 7;
        echo "\n";
    case 8:
        echo 8;
        echo "\n";
    case 9:
        echo 9;
        echo "\n";
    case 10:
        echo 10;
        echo "\n";
    case 11:
        echo 11;
        echo "\n";
    case 12:
        echo 12;
        echo "\n";
    case 13:
        echo 13;
        echo "\n";
    case 14:
        echo 14;
        echo "\n";
    case 15:
        echo 15;
        echo "\n";
}

/*3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return.*/

function add($arg1, $arg2) {
    return $arg1 + $arg2;
}

function subtract($arg1, $arg2) {
    return $arg1 - $arg2;
}

function multiply($arg1, $arg2) {
    return $arg1 * $arg2;
}

function divide($arg1, $arg2) {
    return $arg1 / $arg2;
}

echo add(4, 3) ."\n";
echo subtract(10, 3) ."\n";
echo multiply(-2, -3) ."\n";
echo divide(15, 3) ."\n";

/*4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).*/

function mathOperation($arg1, $arg2, $operation) {
    
    switch ($operation) {
        case "add":
            return add($arg1, $arg2);
        case "subtract":
            return subtract($arg1, $arg2);
        case "multiply":
            return multiply($arg1, $arg2);
        case "divide":
            return divide($arg1, $arg2);
        default:
            return NULL;    
    }
}

echo mathOperation(5, 15, "add") ."\n";
echo mathOperation(5, 15, "subtract") ."\n";
echo mathOperation(5, 15, "multiply") ."\n";
echo mathOperation(5, 15, "divide") ."\n";

/*5. Посмотреть на встроенные функции PHP. Используя имеющийся HTML шаблон, вывести текущий год в подвале при помощи встроенных функций PHP.
	=> minimalistica/index.php */

/*6. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.*/

function power($val, $pow) {
    if ($pow == 0) {
        return 1;
    } elseif ($pow < 0) { 
        return 1 / $val * power($val, $pow + 1);
    } elseif ($pow >= 1) {
        return $val * power($val, $pow - 1);
    }
}

echo power(2, -3);

/*7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
22 часа 15 минут
21 час 43 минуты*/

function currentTime() {
    
    $hours = date("H");
    $minutes = date("i");
    
    $result = $hours;
    
    if ($hours / 10 == 1) {
        $result.=" часов";
    } else {    
        switch ($hours % 10) {
            case 1:
                $result.=" час";
                break;
            case 2: 
            case 3:
            case 4:
                $result.=" часа";
                break;
            default:
                $result.=" часов";
        }
    }    

    $result.=" ";
    $result.=$minutes;
    
    if ($minutes / 10 == 1) {
        $result.=" минут";
    } else {    
        switch ($minutes % 10) {
            case 1:
                $result.=" минута";
                break;
            case 2: 
            case 3:
            case 4:
                $result.=" минуты";
                break;
            default:
                $result.=" минут";
        }
    }    
    return $result;
}

echo currentTime();

?>