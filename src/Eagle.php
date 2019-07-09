<?php


namespace Quiz;


class Eagle extends Animal implements Flyable
{

    public function fly(int $distance)
    {
        $this->hunger += $distance;
    }
}