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
class MultiSignatureTest extends TestCase
{
    /** @test */
    public function can_pending()
    {
        // Arrange...
        $publicKey = 'Aan1H7m2T6yBVGjRBAa8HYW8xdfoPmrNwD';

        // Act...
        $response = $this->getClient()->api('MultiSignature')->pending($publicKey);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_sign()
    {
        // Arrange...
        $transactionId = 'Aan1H7m2T6yBVGjRBAa8HYW8xdfoPmrNwD';
        $secret = 'Aan1H7m2T6yBVGjRBAa8HYW8xdfoPmrNwD';

        // Act...
        $response = $this->getClient()->api('MultiSignature')->sign($transactionId, $secret);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_add_multisignature()
    {
        // Arrange...
        $min = rand();
        $lifetime = rand();
        $keysgroup = 'Aan1H7m2T6yBVGjRBAa8HYW8xdfoPmrNwD';
        $secret = 'Aan1H7m2T6yBVGjRBAa8HYW8xdfoPmrNwD';

        // Act...
        $response = $this->getClient()->api('MultiSignature')->create($min, $lifetime, $keysgroup, $secret);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_accounts()
    {
        // Arrange...
        $publicKey = 'Aan1H7m2T6yBVGjRBAa8HYW8xdfoPmrNwD';

        // Act...
        $response = $this->getClient()->api('MultiSignature')->accounts($publicKey);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }
}
