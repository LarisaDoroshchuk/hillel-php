<?php
declare(strict_types=1);

trait Color
{
    /**
     * @var string
     */
    private string $color;

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     * @return void
     * @throws Exception
     */
    public function setColor(string $color): void
    {
        if (!trim($color)) {
            throw new Exception('You didn\'t specify the color');
        }
        $this->color = $color;
    }
}
