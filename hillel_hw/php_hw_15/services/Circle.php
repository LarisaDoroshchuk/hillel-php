<?php
declare(strict_types=1);

class Circle extends Figure
{
    /**
     * @var float
     */
    private float $radius;

    /**
     * @param float $radius
     * @throws Exception
     */
    public function __construct(float $radius)
    {
        $this->setRadius($radius);
    }

    /**
     * @return float
     */
    public function area(): float
    {
        return M_PI * pow($this->getRadius(), 2);
    }

    /**
     * @return float
     */
    public function perimeter(): float
    {
        return 2 * M_PI * $this->getRadius();
    }

    /**
     * @return float
     */
    public function getRadius(): float
    {
        return $this->radius;
    }

    /**
     * @param float $radius
     * @return void
     * @throws Exception
     */
    public function setRadius(float $radius): void
    {
        $this->validator($radius);
        $this->radius = $radius;
    }

}
