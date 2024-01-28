<?php
declare(strict_types=1);

class Car
{
    use Color;

    /**
     * @var float|int
     */
    private float|int $speed = 0;

    /**
     * @var string
     */
    private string $model;

    /**
     * @param string $model
     */
    public function __construct(string $model)
    {
        $this->setModel($model);
    }

    /**
     * @return float|int
     */
    public function getSpeed(): float|int
    {
        return $this->speed;
    }

    /**
     * @param float|int $speed
     * @return void
     */
    public function setSpeed(float|int $speed): void
    {
        $this->speed = $speed;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     * @return void
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }
}
