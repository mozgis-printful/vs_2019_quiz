<?php


namespace Quiz;



class Owner
{

    use Sleepable;

    private $animals = [];
    private $foo;

    public function assignAnimal(Animal $animal)
    {
        $this->animals[] = $animal;
    }

    public function walk(Animal $animal) {
        if (!in_array($animal, $this->animals)) {
            throw new \Exception('Animal is not assigned');
        }

        echo 'Walking with: ' . $animal->getName();
    }

    public function flyWith(Flyable $animal) {
        if (!in_array($animal, $this->animals)) {
            throw new \Exception('Animal is not assigned');
        }

        echo 'Flying with: ' . $animal->getName();
    }
}