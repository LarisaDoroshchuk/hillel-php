<?php
declare(strict_types=1);

class BankAccount
{
    private int $accountNumber;
    private float $balanceSize;

    /**
     * @param float $balanceSize
     * @throws Exception
     */
    public function __construct(float $balanceSize)
    {
        $this->setAccountNumber(rand(1000000, 9999999999));
        $this->setBalanceSize($balanceSize);
    }

    /**
     * @param float $money
     * @return void
     * @throws Exception
     */
    public function putMoney(float $money): void
    {
        if ($money < 0) {
            throw new Exception('You cannot deposit negative amounts of money into your account!');
        }
        $this->setBalanceSize($this->getBalanceSize() + $money);
    }

    /**
     * @param float $money
     * @return void
     * @throws Exception
     */
    public function getMoney(float $money): void
    {
        if ($this->getBalanceSize() < $money) {
            throw new Exception('You cannot withdraw more money from your account than is in your account!');
        }
        if ($money < 0) {
            throw new Exception('You cannot withdraw a negative amount of money from your account!');
        }

        $this->setBalanceSize($this->getBalanceSize() - $money);
    }

    /**
     * @return int
     */
    public function getAccountNumber(): int
    {
        return $this->accountNumber;
    }

    /**
     * @param int $accountNumber
     * @return void
     */
    public function setAccountNumber(int $accountNumber): void
    {
        $this->accountNumber = $accountNumber;
    }

    /**
     * @return float
     */
    public function getBalanceSize(): float
    {
        return $this->balanceSize;
    }

    /**
     * @param float $balanceSize
     * @return void
     * @throws Exception
     */
    private function setBalanceSize(float $balanceSize): void
    {
        if ($balanceSize < 0) {
            throw new Exception('Your balance cannot be less than zero!');
        }
        $this->balanceSize = $balanceSize;
    }

}
