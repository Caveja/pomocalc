<?php

namespace Pomocalc\Tests;

use Pomocalc\Calculator;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var
     */
    private $calculator;

    protected function setUp()
    {
        $this->calculator = new Calculator();
    }

    public function test15MinutesIsZeroPomodoros()
    {
        $this->check(0, 15);
    }

    public function test25MinutesIsOnePomodoro()
    {
        $this->check(1, 25);
    }

    public function test50MinutesIsOnePomodoro()
    {
        $this->check(1, 50);
    }

    public function test55MinutesIsTwoPomodoros()
    {
        $this->check(2, 55);
    }

    public function test145MinutesIsFourPomodoros()
    {
        $this->check(4, 145);
    }

    public function test170MinutesIsFivePomodoros()
    {
        $this->check(5, 170);
    }

    /**
     * @param $pomodoros
     * @param $minutes
     */
    private function check($pomodoros, $minutes)
    {
        $this->assertSame($pomodoros, $this->calculator->getPomodorosForMinutes($minutes));
    }
}
