<?php
declare(strict_types=1);

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    echo "Hi! Hillel-php)";
} elseif ($method === 'POST') {
    if (isset($_POST['number1']) && isset($_POST['number2'])) {
        $number1 = $_POST['number1'];
        $number2 = $_POST['number2'];

        if (is_numeric($number1) && is_numeric($number2)) {
            $result = $number1 + $number2;
            echo "The result of adding numbers $number1 and $number2 is: $result";
        } else {
            echo "Please enter two numbers to add.";
        }
    } else {
        echo "Please send both numbers via POST.";
    }
} else {
    http_response_code(405);
    echo "HTTP method is not supported";
}
