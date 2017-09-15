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
        $publicKey = '026972bdafa405f33a293b047798ff9cef3d2c3ab59e89c04d394df35147c17921';

        // Act...
        $response = $this->getClient()->api('MultiSignature')->pending($publicKey);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_sign()
    {
        // Skip...
        $this->markTestSkipped('This requires secrets and will only be tested on local machines.');

        // Arrange...
        $transactionId = str_random(34);
        $secret = env('ARK_TESTING_SECRET');

        // Act...
        $response = $this->getClient()->api('MultiSignature')->sign($transactionId, $secret);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_add_multisignature()
    {
        // Skip...
        $this->markTestSkipped('This requires secrets and will only be tested on local machines.');

        // Arrange...
        $min = rand();
        $lifetime = rand();
        $keysgroup = str_random(34);
        $secret = env('ARK_TESTING_SECRET');

        // Act...
        $response = $this->getClient()->api('MultiSignature')->create($min, $lifetime, $keysgroup, $secret);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_accounts()
    {
        // Skip...
        $this->markTestSkipped('This seems to be deprecated, so skip the test for now.');

        // Arrange...
        $publicKey = '026972bdafa405f33a293b047798ff9cef3d2c3ab59e89c04d394df35147c17921';

        // Act...
        $response = $this->getClient()->api('MultiSignature')->accounts($publicKey);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }
}
