<?php
declare(strict_types=1);

use Services\ToDoList;

const APP_DIR = __DIR__ . '/';

require_once APP_DIR . 'enums/Status.php';
require_once APP_DIR . 'services/ToDoList.php';
require_once APP_DIR . 'logger/logger.php';

try {
    $toDoList = new ToDoList('work');
    $toDoList->addTask('work_3', 10);
    $toDoList->addTask('work_4', 2);
    $toDoList->deleteTask('65b3c8cbce0ff');
    $toDoList->completeTask('65b3c8cbce08b');
    print_r($toDoList->getTasks());
} catch (Exception $exception) {
    logger($exception->getMessage());
}
