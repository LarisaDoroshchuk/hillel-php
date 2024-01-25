<?php


function  logger(string $content, string $type = 'error'): void
{
    $data = date('Y:m:d H:i:s');
    $content = "[$data][$type][$content]\n";
    file_put_contents(APP_DIR . 'logs/logs.txt', $content, FILE_APPEND);
}
