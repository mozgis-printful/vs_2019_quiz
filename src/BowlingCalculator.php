<?php


namespace Quiz;


class BowlingCalculator
{
    /**
     * @var array
     */
    private $throws = [];

    /**
     * @param int $points
     */
    public function throw(int $points)
    {
        $this->throws[] = $points;
    }

    /**
     * @return int
     */
    public function getResult(): int
    {
        $score = 0;
        $currentThrow = 0;
        for ($i = 0; $i < 10; $i++) {
            if ($this->isStrike($currentThrow)) {
                $score += $this->addStrike($currentThrow);
                $currentThrow += 1;
            } else if ($this->isSpare($currentThrow)) {
                $score += $this->addSpare($currentThrow);
                $currentThrow += 2;
            } else {
                $score += $this->addNormal($currentThrow);
                $currentThrow += 2;
            }
        }

        return $score;
    }

    /**
     * @param int $currentThrow
     * @return int
     */
    private function addNormal(int $currentThrow): int
    {
        $score = 0;
        $throw1 = $this->getThrowScoreByIndex($currentThrow, 0);
        $throw2 = $this->getThrowScoreByIndex($currentThrow, 1);

        $score += $throw1;
        $score += $throw2;

        return $score;
    }

    /**
     * @param int $currentThrow
     * @return bool
     */
    private function isSpare(int $currentThrow): bool
    {
        $throw1 = $this->getThrowScoreByIndex($currentThrow, 0);
        $throw2 = $this->getThrowScoreByIndex($currentThrow, 1);

        return $throw1 + $throw2 == 10;
    }

    /**
     * @param int $currentThrow
     * @return int
     */
    private function addSpare(int $currentThrow): int
    {
        $score = 0;
        $score += $this->addNormal($currentThrow);
        $score += $this->throws[$currentThrow + 2];

        return $score;
    }

    /**
     * @param int $currentThrow
     * @return bool
     */
    private function isStrike(int $currentThrow)
    {
        $throw1 = $this->getThrowScoreByIndex($currentThrow, 0);

        return $throw1 == 10;
    }

    /**
     * @param int $currentThrow
     * @return int
     */
    private function addStrike(int $currentThrow): int
    {
        $score = 0;
        $extraThrow1 = $this->getThrowScoreByIndex($currentThrow, 1);
        $extraThrow2 = $this->getThrowScoreByIndex($currentThrow, 2);

        $score += 10 + $extraThrow1 + $extraThrow2;

        return $score;
    }

    /**
     * @param int $currentThrow
     * @param int $offset
     * @return int
     */
    private function getThrowScoreByIndex(int $currentThrow, int $offset): int
    {
        return isset($this->throws[$currentThrow + $offset]) ? $this->throws[$currentThrow + $offset] : 0;
    }
}