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
class DelegateTest extends TestCase
{
    /** @test */
    public function can_count()
    {
        // Act...
        $response = $this->getClient()->api('Delegate')->count();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_search()
    {
        // Arrange...
        $q = 'yin';

        // Act...
        $response = $this->getClient()->api('Delegate')->search($q);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_voters()
    {
        // Arrange...
        $publicKey = '026972bdafa405f33a293b047798ff9cef3d2c3ab59e89c04d394df35147c17921';

        // Act...
        $response = $this->getClient()->api('Delegate')->voters($publicKey);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_delegate()
    {
        // Act...
        $response = $this->getClient()->api('Delegate')->delegate([
            'publicKey' => '03abd20e654fa87af4efcdbbb4a0dd82a01cf3e88e72269809b698d785b98b09b2',
        ]);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_delegates()
    {
        // Act...
        $response = $this->getClient()->api('Delegate')->delegates();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_fee()
    {
        // Act...
        $response = $this->getClient()->api('Delegate')->fee();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_forged_by_account()
    {
        // Arrange...
        $generatorPublicKey = '026972bdafa405f33a293b047798ff9cef3d2c3ab59e89c04d394df35147c17921';

        // Act...
        $response = $this->getClient()->api('Delegate')->forgedByAccount($generatorPublicKey);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_add_delegate()
    {
        // Skip...
        $this->markTestSkipped('This requires secrets and will only be tested on local machines.');

        // Arrange...
        $secret = env('ARK_TESTING_SECRET');
        $username = str_random(34);
        $secondSecret = env('ARK_TESTING_SECOND_SECRET');

        // Act...
        $response = $this->getClient()->api('Delegate')->create($secret);

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }

    /** @test */
    public function can_get_next_forgers()
    {
        // Act...
        $response = $this->getClient()->api('Delegate')->nextForgers();

        // Assert...
        $this->assertInstanceOf('Illuminate\Support\Collection', $response);
    }
}
