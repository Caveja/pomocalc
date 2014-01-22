<?php

namespace Pomocalc;

class Calculator
{
    const POMODORO = 25;
    const SHORT_BREAK = 5;
    const LONG_BREAK = 30;

    /**
     * @param  float $minutes
     * @return int
     */
    public function getPomodorosForMinutes($minutes)
    {
        $pomodoros = 0;

        while ($minutes >= self::POMODORO) {
            $break = ++$pomodoros % 4 === 0 ? self::LONG_BREAK : self::SHORT_BREAK;

            $minutes -= (self::POMODORO + $break);

        }

        return $pomodoros;
    }
}
