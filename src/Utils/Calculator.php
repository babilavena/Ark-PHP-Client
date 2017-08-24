<?php

declare(strict_types=1);

/*
 * This file is part of Ark PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Ark\Utils;

class Calculator
{
    /**
     * @var int
     */
    private $fixedPoint = 100000000;

    /**
     * @var float
     */
    private $dailyProduction;

    /**
     * @var float
     */
    private $profitShare;

    /**
     * @var float
     */
    private $votingPool;

    /**
     * Create a new Calculator instance.
     *
     * @param int $dailyProduction
     * @param int $profitShare
     */
    public function __construct(int $dailyProduction, int $profitShare)
    {
        $this->dailyProduction = $dailyProduction;
        $this->profitShare = $profitShare;
    }

    /**
     * Calculate the ARK profit share per second.
     *
     * @param int $value
     *
     * @return float
     */
    public function perSecond(int $value): float
    {
        return $this->perMinute($value) / 60;
    }

    /**
     * Calculate the ARK profit share per minute.
     *
     * @param int $value
     *
     * @return float
     */
    public function perMinute(int $value): float
    {
        return $this->perHour($value) / 60;
    }

    /**
     * Calculate the ARK profit share per hour.
     *
     * @param int $value
     *
     * @return float
     */
    public function perHour(int $value): float
    {
        return $this->perDay($value) / 24;
    }

    /**
     * Calculate the ARK profit share per day.
     *
     * @param int $value
     *
     * @return float
     */
    public function perDay(int $value): float
    {
        $profitShare = $this->profitShare;

        if ($profitShare >= 1) {
            $profitShare = $profitShare / 100;
        }

        return $this->dailyProduction * $profitShare * $this->voteWeight($value);
    }

    /**
     * Calculate the ARK profit share per week.
     *
     * @param int $value
     *
     * @return float
     */
    public function perWeek(int $value): float
    {
        return $this->perDay($value) * 7;
    }

    /**
     * Calculate the ARK profit share per month.
     *
     * @param int $value
     *
     * @return float
     */
    public function perMonth(int $value): float
    {
        return $this->perWeek($value) * 4;
    }

    /**
     * Calculate the ARK profit share per year.
     *
     * @param int $value
     *
     * @return float
     */
    public function perYear(int $value): float
    {
        return $this->perMonth($value) * 12;
    }

    /**
     * Calculate the ARK profit share per second.
     *
     * @param int $value
     *
     * @return float
     */
    public function setVotingPool(int $value)
    {
        $this->votingPool = $this->toFixed($value);
    }

    /**
     * Calculate the vote weight for the given value.
     *
     * @param int $value
     *
     * @return float
     */
    private function voteWeight(int $value): float
    {
        return $this->toFixed($value) / $this->votingPool;
    }

    /**
     * Formats a number using fixed-point notation.
     *
     * @param  int    $value
     *
     * @return int
     */
    private function toFixed(int $value): int
    {
        if ($value < $this->fixedPoint) {
            $value *= $this->fixedPoint;
        }

        return $value;
    }
}
