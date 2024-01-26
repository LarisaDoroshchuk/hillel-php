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
        $this->setTaskFileName($taskFileName);
        $this->setTaskFilePath('data/' . $this->getTaskFileName() . '.txt');
        $this->readTasksFromFile();
    }


    public function getTaskFilePath(): string
    {
        return $this->taskFilePath;
    }

    public function setTaskFilePath(string $taskFilePath): void
    {
        $this->taskFilePath = $taskFilePath;
    }

    public function setTasks(array $tasks): void
    {
        $this->tasks = $tasks;
    }

    /**
     * @return string
     */
    public function getTaskFileName(): string
    {
        return $this->taskFileName;
    }

    /**
     * @param string $taskFileName
     * @return void
     * @throws Exception
     */
    public function setTaskFileName(string $taskFileName): void
    {
        if (!trim($taskFileName)) {
            throw new Exception('File name not sent');
        }
        $this->taskFileName = $taskFileName;
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
        if (strlen($taskName) < 2) {
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
        return $this->sortTasks($this->tasks);
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
        $this->setTasks(array_filter($this->tasks, function ($item) use ($taskId) {
            return $item[0] !== $taskId;
        }));
    }

    /**
     * @param array $tasks
     * @return array
     */
    private function sortTasks(array $tasks): array
    {
        $comparePriority = function ($a, $b) {
            if ($a[2] == $b[2]) {
                return 0;
            }
            return ($a[2] < $b[2]) ? 1 : -1;
        };
        usort($tasks, $comparePriority);

        return $tasks;
    }

    /**
     * @throws Exception
     */
    private function readTasksFromFile(): void
    {
        $this->file = fopen($this->getTaskFilePath(), "a+");
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
        $this->file = fopen($this->getTaskFilePath(), "w+");

        fwrite($this->file, $this->arrayToString() . PHP_EOL);
        fclose($this->file);
    }


}