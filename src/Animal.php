<?php


namespace Quiz;


abstract class Animal
{
    use Sleepable;
    protected $hunger = 10;
    private $name;

    static $animalCount = 0;

    public function __construct(string $name)
    {
        self::$animalCount++;
        $this->name = $name;
    }

    public function eat()
    {
        $this->hunger -= 1;
    }

    public function run()
    {
        $this->hunger += 1;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHunger(): int
    {
        return $this->hunger;
    }
}