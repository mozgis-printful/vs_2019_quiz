<?php
namespace Quiz;

class Dog extends Animal
{
    public function run()
    {
        $this->hunger += 2;
    }
}