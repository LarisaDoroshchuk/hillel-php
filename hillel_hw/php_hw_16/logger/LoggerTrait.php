<?php
declare(strict_types=1);

class LoggerTrait
{
    /**
     * @param string $content
     * @return void
     */
    public function error(string $content): void
    {
        $type = 'error';
        $data = date('Y:m:d H:i:s');
        $content = "[$data][$type][$content]\n";
        file_put_contents(APP_DIR . 'logs/logs.txt', $content, FILE_APPEND);
    }
}
