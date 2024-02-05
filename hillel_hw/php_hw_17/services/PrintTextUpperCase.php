<?php
declare(strict_types=1);

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

///////////////////////  Помилки PSR стандартів

//на вказано для строгої типизації - declare(strict_types=1);

// Клас вказан із маленької букви, назва класа та назва папки різні
// Назва класа не зрозуміла, нема камел кєйса
class printttt extends printtext
{
    // немає опису метода
    // не вказано що повертає метод - void, назва з великої літери
    // не за стандартами розставлені дужки
    public function Print() {echo(strtoupper($this->getText()));}

    use Vendor\Package\FirstTrait; // Ключове use слово, ПОВИННО бути оголошене в наступному рядку після відкриваючої дужки.

    // метод який не визивається є надлишковим кодом, назва з великої літери, не зрозуміло що повертає
    // аргумент без типа данних, дужки розставлені не по стандартах
    public function Process($ag){echo $ag;}
}