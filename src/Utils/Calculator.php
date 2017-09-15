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
     * @param int|float $dailyProduction
     * @param int|float $profitShare
     */
    public function __construct($dailyProduction, $profitShare)
    {
        $this->dailyProduction = $dailyProduction;
        $this->profitShare = $profitShare;
    }

    /**
     * Calculate the ARK profit share per second.
     *
     * @param int|float $value
     *
     * @return float
     */
    public function perSecond($value): float
    {
        return $this->perMinute($value) / 60;
    }

    /**
     * Calculate the ARK profit share per minute.
     *
     * @param int|float $value
     *
     * @return float
     */
    public function perMinute($value): float
    {
        return $this->perHour($value) / 60;
    }

    /**
     * Calculate the ARK profit share per hour.
     *
     * @param int|float $value
     *
     * @return float
     */
    public function perHour($value): float
    {
        return $this->perDay($value) / 24;
    }

    /**
     * Calculate the ARK profit share per day.
     *
     * @param int|float $value
     *
     * @return float
     */
    public function perDay($value): float
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
     * @param int|float $value
     *
     * @return float
     */
    public function perWeek($value): float
    {
        return $this->perDay($value) * 7;
    }

    /**
     * Calculate the ARK profit share per month.
     *
     * @param int|float $value
     *
     * @return float
     */
    public function perMonth($value): float
    {
        return $this->perWeek($value) * 4;
    }

    /**
     * Calculate the ARK profit share per year.
     *
     * @param int|float $value
     *
     * @return float
     */
    public function perYear($value): float
    {
        return $this->perMonth($value) * 12;
    }

    /**
     * Calculate the ARK profit share per second.
     *
     * @param int|float $value
     *
     * @return float
     */
    public function setVotingPool($value)
    {
        $this->votingPool = (int) str_replace(',', null, $value);
    }

    /**
     * Calculate the vote weight for the given value.
     *
     * @param int|float $value
     *
     * @return float
     */
    private function voteWeight($value): float
    {
        return $this->formatArkBalance($value) / $this->votingPool;
    }

    /**
     * Format the given value to assure we are working with a float.
     *
     * @param int|float $value
     *
     * @return float
     */
    private function formatArkBalance($value): float
    {
        if (is_float($value)) {
            return $value;
        }

        if (strpos((string) $value, ',')) {
            return (float) str_replace(',', null, $value);
        }

        if (strlen((string) $value) >= 9) {
            return $value / 10 ** 8;
        }

        return (float) $value;
    }
}
