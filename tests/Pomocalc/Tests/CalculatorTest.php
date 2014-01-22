<?php

namespace Pomocalc\Tests;

use Pomocalc\Calculator;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    public function test15MinutesIsZeroPomodoros()
    {
        $calculator = new Calculator();

        $this->assertSame(0, $calculator->getPomodorosForMinutes(15));
    }
}
