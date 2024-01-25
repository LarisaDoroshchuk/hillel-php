<?php
declare(strict_types=1);

use Services\ToDoList;

const APP_DIR = __DIR__ . '/';

require_once APP_DIR . 'enums/Status.php';
require_once APP_DIR . 'services/ToDoList.php';
require_once APP_DIR . 'logger/logger.php';

try {
    $toDoList = new ToDoList('work');
    $toDoList->addTask('work_1', 1);
    $toDoList->addTask('work_2', 9);
    $toDoList->deleteTask('65b2190fb8eb0');
    $toDoList->completeTask('65b217469ce49');
    print_r($toDoList->getTasks());
} catch (Exception $exception) {
    logger($exception->getMessage());
}
