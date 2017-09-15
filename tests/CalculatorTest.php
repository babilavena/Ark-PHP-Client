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

namespace BrianFaust\Tests\Ark;

use BrianFaust\Ark\Client;
use BrianFaust\Ark\Utils\Calculator;

/**
 * @coversNothing
 */
class CalculatorTest extends TestCase
{
    /** @test */
    public function can_calculate_daily_profit_share()
    {
        // Arrange...
        $votingPool = 10000000;
        $userPool = 100000;
        $expectedShare = 3.165;

        // Act...
        $calculator = new Calculator(422, 75);
        $calculator->setVotingPool($votingPool);

        // Assert...
        $this->assertSame($expectedShare, $calculator->perDay($userPool));
    }
}
