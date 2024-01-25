<?php
declare(strict_types=1);

namespace Services;

use enums\Status;
use Exception;

class ToDoList
{
    private array $tasks = [];
    private string $taskFileName;
    private string $taskFilePath;
    private $file;


    /**
     * @param string $taskFileName
     * @throws Exception
     */
    public function __construct(string $taskFileName)
    {
        $this->taskFileName = $taskFileName;
        $this->taskFilePath = 'data/' . $taskFileName . '.txt';
        $this->readTasksFromFile();
    }


    /**
     * @param string $taskName
     * @param int $priority
     * @return array
     * @throws Exception
     */
    public function addTask(string $taskName, int $priority): array
    {
        if ($priority < 0 || $priority > 10) {
            throw new Exception('priority should be between 1 and 10');
        }
        if ($taskName < 2) {
            throw new Exception('taskName should not be shorter 2 symbols');
        }

        $uuid = uniqid();

        $task = [$uuid, $taskName, $priority, Status::NOT_DONE->value];
        $this->tasks[] = $task;

        return $task;
    }

    /**
     * @return array
     */
    public function getTasks(): array
    {
        return $this->tasks;
    }

    /**
     * @param string $taskId
     * @return void
     */
    public function completeTask(string $taskId): void
    {
        foreach ($this->tasks as $key => $value) {
            if ($value[0] === $taskId) {
                $this->tasks[$key][3] = Status::DONE->value;
            }
        }
    }

    /**
     * @param string $taskId
     * @return void
     */
    public function deleteTask(string $taskId): void
    {
        $this->tasks = array_filter($this->tasks, function ($item) use ($taskId) {
            return $item[0] !== $taskId;
        });
    }

    /**
     * @throws Exception
     */
    private function readTasksFromFile(): void
    {
        if (!trim($this->taskFileName)) {
            throw new Exception('File name not sent');
        }
        $this->file = fopen($this->taskFilePath, "a+");
        $this->stringToArray();
        fclose($this->file);
    }

    /**
     * @return string
     */
    private function arrayToString(): string
    {
        $rows = [];
        foreach ($this->tasks as $row) {
            if (count($row) > 1) {
                $rows[] = implode(" | ", $row);
            }
        }
        return implode(PHP_EOL, $rows);
    }

    /**
     * @return void
     */
    private function stringToArray(): void
    {
        while (!feof($this->file)) {
            $row = fgets($this->file);
            if ($row) {
                $elements = explode(" | ", trim($row));

                $this->tasks[] = $elements;
            }
        }
    }

    /**
     *
     */
    public function __destruct()
    {
        $this->file = fopen($this->taskFilePath, "w+");

        fwrite($this->file, $this->arrayToString() . PHP_EOL);
        fclose($this->file);
    }

}