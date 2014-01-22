<?php

namespace Pomocalc;

class Calculator
{
    const POMODORO = 25;
    const SHORT_BREAK = 5;

    /**
     * @param  float $minutes
     * @return int
     */
    public function getPomodorosForMinutes($minutes)
    {
        $pomodoros = 0;

        while ($minutes >= self::POMODORO) {
            $minutes -= (self::POMODORO + self::SHORT_BREAK);
            ++$pomodoros;
        }

        return $pomodoros;
    }
}
