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
class SignatureTest extends TestCase
{
    /** @test */
    public function can_get_fee()
    {
        // Act...
        $response = $this->getClient()->api('Signature')->fee();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_add_signature()
    {
        // Arrange...
        $secret = 'Aan1H7m2T6yBVGjRBAa8HYW8xdfoPmrNwD';
        $secondSecret = 'Aan1H7m2T6yBVGjRBAa8HYW8xdfoPmrNwD';

        // Act...
        $response = $this->getClient()->api('Signature')->create($secret, $secondSecret);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }
}
