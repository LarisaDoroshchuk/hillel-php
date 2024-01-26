<?php
declare(strict_types=1);

class User
{
    private string $name;
    private BankAccount $bankAccount;

    /**
     * @param string $name
     * @param BankAccount $bankAccount
     */
    public function __construct(string $name, BankAccount $bankAccount)
    {
        $this->setName($name);
        $this->bankAccount = $bankAccount;
    }

    /**
     * @param float $money
     * @return void
     * @throws Exception
     */
    public function putMoney(float $money): void
    {
        $this->bankAccount->putMoney($money);
    }

    /**
     * @param float $money
     * @return void
     * @throws Exception
     */
    public function getMoney(float $money): void
    {
        $this->bankAccount->getMoney($money);

    }

    /**
     * @return int
     */
    public function getAccountNumber(): int
    {
        return $this->bankAccount->getAccountNumber();
    }

    /**
     * @return float
     */
    public function getBalanceSize(): float
    {
        return $this->bankAccount->getBalanceSize();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

}