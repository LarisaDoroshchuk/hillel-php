<?php
declare(strict_types=1);

const APP_DIR = __DIR__ . '/';


require_once APP_DIR . 'services/BankAccount.php';
require_once APP_DIR . 'services/User.php';
require_once APP_DIR . 'logger/Logger.php';

$logger = new Logger();


try {
    $bankAccount = new BankAccount(100);
    $user = new User('John', $bankAccount);
    $user->putMoney(200);
    $user->getMoney(70);
    echo($user->getName() . PHP_EOL);
    echo($user->getBalanceSize() . PHP_EOL);
    echo($user->getAccountNumber() . PHP_EOL);
    $user->putMoney(-200);   //wrong transaction
//    $user->getMoney(500);    //wrong transaction
//    $user->getMoney(-500);   //wrong transaction


} catch (Exception $exception) {
    $logger->error($exception->getMessage());
}



