<?php
declare(strict_types=1);

class Cat
{
    use Color;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $breed;

    /**
     * @param string $name
     * @param string $breed
     */
    public function __construct(string $name, string $breed)
    {
        $this->setName($name);
        $this->setBreed($breed);
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

    /**
     * @return string
     */
    public function getBreed(): string
    {
        return $this->breed;
    }

    /**
     * @param string $breed
     * @return void
     */
    public function setBreed(string $breed): void
    {
        $this->breed = $breed;
    }
}
