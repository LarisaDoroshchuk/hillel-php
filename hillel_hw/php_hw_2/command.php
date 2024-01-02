<?php

echo "Welcome to the program on the Hillel course
State your name:  ";

$userName = trim(fgets(STDIN));

echo "Welcome to the program on the Hillel course {$userName} 
State your surname:  ";

$userSurname = trim(fgets(STDIN));

echo "\n Great {$userName} {$userSurname} 
I can calculate the arithmetic mean and the sum of numbers for you!
Enter three numbers and you will get the result!
Let's get started!
Enter your first number: ";

$operandFirst = trim(fgets(STDIN));

echo "Great {$userName} {$userSurname}
Enter your second number: ";

$operandSecond = trim(fgets(STDIN));

echo "Enter your third number: \n";
$operandThird = trim(fgets(STDIN));

$sum = $operandFirst . $operandSecond . $operandThird;

$arithmeticMean = $sum/3;

echo "{$userName} {$userSurname} - done!
Sum of all numbers = {$sum}
Arithmetic mean = {$arithmeticMean}
It was a pleasure working with you!
Good luck!";

