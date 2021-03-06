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

/**
 * @coversNothing
 */
class PeerTest extends TestCase
{
    /** @test */
    public function can_get_peers()
    {
        // Act...
        $response = $this->getClient()->api('Peer')->peers();

        // Assert...
        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function can_version()
    {
        // Act...
        $response = $this->getClient()->api('Peer')->version();

        // Assert...
        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function can_get_peer()
    {
        // Arrange...
        $ip = str_random(34);
        $port = rand();

        // Act...
        $response = $this->getClient()->api('Peer')->peer($ip, $port);

        // Assert...
        $this->assertTrue($response->isSuccess());
    }
}
