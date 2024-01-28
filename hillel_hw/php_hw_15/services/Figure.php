<?php
declare(strict_types=1);

abstract class Figure
{
    /**
     * @return float
     */
    abstract public function area(): float;

    /**
     * @return float
     */
    abstract public function perimeter(): float;

    /**
     * @return void
     */
    public function getArea(): void
    {
        echo $this->area();
    }

    /**
     * @return void
     */
    public function getPerimeter(): void
    {
        echo $this->perimeter();
    }

    /**
     * @param float $param
     * @return void
     * @throws Exception
     */
    protected function validator(float $param): void
    {
        if ($param < 0) {
            throw new Exception('You cannot enter a value less than zero!');
        }
    }

}
