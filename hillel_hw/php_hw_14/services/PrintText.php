<?php

class PrintText
{
    private string $text = 'some text';

    /**
     * @return void
     */
    public function print(): void
    {
        echo(ucfirst($this->getText()));
    }

    /**
     * @return string
     */
    protected function getText(): string
    {
        return $this->text;
    }
}
