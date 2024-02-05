<?php
declare(strict_types=1);

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


///////////////////////  Помилки PSR стандартів

//на вказано для строгої типизації - declare(strict_types=1);

class printtext // Клас вказан із маленької букви, назва класа та назва папки різні, нема камелкейса
{
    private $t = 'some text'; // не вказан тип свойства - string, не зрозуміла назва

    // немає опису метода
    public function Print() // не вказано що повертає метод - void, назва з великої літери
    {echo(ucfirst($this->getText()));}  // не за стандартами розставлені дужки

    // немає опису метода
    protected function GetText()  // не вказано що повертає метод - string, назва з великої літери
    {return $this->text;}  // не за стандартами розставлені дужки
}