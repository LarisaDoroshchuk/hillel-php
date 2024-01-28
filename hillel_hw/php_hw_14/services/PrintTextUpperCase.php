<?php

class PrintTextUpperCase extends PrintText
{
    /**
     * @return void
     */
    public function print(): void
    {
        echo(strtoupper($this->getText()));
    }
}
