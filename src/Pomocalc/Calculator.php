<?php

namespace Pomocalc;

/**
 * Class Calculator
 * @package Pomocalc
 */
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
            ++$pomodoros;
            $minutes -= self::POMODORO + $this->getBreakLengthFromPomodoroNumber($pomodoros);
        }

        return $pomodoros;
    }

    /**
     * @param $pomodoros
     * @return int
     */
    private function getBreakLengthFromPomodoroNumber($pomodoros)
    {
        return $pomodoros % 4 === 0 ? self::LONG_BREAK : self::SHORT_BREAK;
    }
}
