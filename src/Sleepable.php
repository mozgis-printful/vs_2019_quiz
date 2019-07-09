<?php


namespace Quiz;


trait Sleepable
{
    protected $foo = 'foo';

    public function sleep(int $duration)
    {
        echo $this->name . ' Is sleeping for ' . $duration . ' minutes';
    }
}