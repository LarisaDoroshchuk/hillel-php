<?php
declare(strict_types=1);

class Flower
{
    use Color;

    /**
     * @var string
     */
    private string $typeFlower;

    /**
     * @param string $typeFlower
     */
    public function __construct(string $typeFlower)
    {
        $this->setTypeFlower($typeFlower);
    }

    /**
     * @return string
     */
    public function getTypeFlower(): string
    {
        return $this->typeFlower;
    }

    /**
     * @param string $typeFlower
     * @return void
     */
    public function setTypeFlower(string $typeFlower): void
    {
        $this->typeFlower = $typeFlower;
    }
}
