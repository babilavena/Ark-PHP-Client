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

/**
 * @coversNothing
 */
class AccountTest extends TestCase
{
    /** @test */
    public function can_get_balance()
    {
        // Arrange...
        $address = str_random(34);

        // Act...
        $response = $this->getClient()->api('Account')->balance($address);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_publickey()
    {
        // Arrange...
        $address = str_random(34);

        // Act...
        $response = $this->getClient()->api('Account')->publicKey($address);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_delegates()
    {
        // Arrange...
        $address = 'Aan1H7m2T6yBVGjRBAa8HYW8xdfoPmrNwD';

        // Act...
        $response = $this->getClient()->api('Account')->delegates($address);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_delegates_fee()
    {
        // Arrange...
        $address = 'Aan1H7m2T6yBVGjRBAa8HYW8xdfoPmrNwD';

        // Act...
        $response = $this->getClient()->api('Account')->delegatesFee($address);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_add_delegates()
    {
        // Arrange...
        $secret = 'Aan1H7m2T6yBVGjRBAa8HYW8xdfoPmrNwD';
        $publicKey = 'Aan1H7m2T6yBVGjRBAa8HYW8xdfoPmrNwD';
        $secondSecret = 'Aan1H7m2T6yBVGjRBAa8HYW8xdfoPmrNwD';

        // Act...
        $response = $this->getClient()->api('Account')->createDelegates($secret, $publicKey, $secondSecret);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_account()
    {
        // Arrange...
        $address = 'Aan1H7m2T6yBVGjRBAa8HYW8xdfoPmrNwD';

        // Act...
        $response = $this->getClient()->api('Account')->account($address);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }
}
