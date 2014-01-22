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
        $this->assertSame(0, $this->calculator->getPomodorosForMinutes(15));
    }

}
