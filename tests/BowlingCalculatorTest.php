<?php


use Quiz\BowlingCalculator;

class BowlingCalculatorTest extends \PHPUnit\Framework\TestCase
{

    public function testGetResult_inASimpleGame_shouldReturnScore()
    {
        $calculator = new BowlingCalculator();

        for ($i = 0; $i < 20; $i++) {
            $calculator->throw(1);
        }

        $this->assertEquals(20, $calculator->getResult());
    }

    public function testGetResult_withASpare_shouldReturnScore()
    {
        $calculator = new BowlingCalculator();

        $calculator->throw(5);
        $calculator->throw(5);
        $calculator->throw(3);

        for ($i = 0; $i < 17; $i++) {
            $calculator->throw(1);
        }

        $this->assertEquals(33, $calculator->getResult());
    }

    public function testGetResult_withAStrike_shouldReturnScore()
    {
        $calculator = new BowlingCalculator();

        $calculator->throw(10);
        $calculator->throw(3);
        $calculator->throw(4);

        for ($i = 0; $i < 16; $i++) {
            $calculator->throw(1);
        }

        $this->assertEquals(40, $calculator->getResult());
    }

    public function testGetResult_inAPerfectGame_shoudReturnScore()
    {
        $calculator = new BowlingCalculator();

        for ($i = 0; $i < 12; $i++) {
            $calculator->throw(10);
        }

        $this->assertEquals(300, $calculator->getResult());
    }
}