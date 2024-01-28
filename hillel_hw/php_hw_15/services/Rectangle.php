<?php
declare(strict_types=1);

class Rectangle extends Figure
{
    /**
     * @var float
     */
    private float $width;
    /**
     * @var float
     */
    private float $height;

    /**
     * @param float $width
     * @param float $height
     * @throws Exception
     */
    public function __construct(float $width, float $height)
    {
        $this->setWidth($width);
        $this->setHeight($height);
    }

    /**
     * @return float
     */
    public function area(): float
    {
        return $this->getWidth() * $this->getHeight();
    }

    /**
     * @return float
     */
    public function perimeter(): float
    {
        return 2 * ($this->getWidth() + $this->getHeight());
    }

    /**
     * @return float
     */
    public function getWidth(): float
    {
        return $this->width;
    }

    /**
     * @param float $width
     * @return void
     * @throws Exception
     */
    public function setWidth(float $width): void
    {
        $this->validator($width);
        $this->width = $width;
    }

    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * @param float $height
     * @return void
     * @throws Exception
     */
    public function setHeight(float $height): void
    {
        $this->validator($height);
        $this->height = $height;
    }

}
