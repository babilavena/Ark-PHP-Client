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

use BrianFaust\Ark\Utils\Base58;

/**
 * @coversNothing
 */
class Base58Test extends TestCase
{
    /** @test */
    public function can_encode()
    {
        // Arrange...
        $value = 'Hello World';

        // Expect...
        $expected = 'JxF12TrwUP45BMd';

        // Act...
        $actual = Base58::encode($value);

        // Assert...
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_decode()
    {
        // Arrange...
        $value = 'JxF12TrwUP45BMd';

        // Expect...
        $expected = 'Hello World';

        // Act...
        $actual = Base58::decode($value);

        // Assert...
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_encode_check()
    {
        // Arrange...
        $value = 'Hello World';

        // Expect...
        $expected = '32UWxgjUJDXeRwy6c6Fxf';

        // Act...
        $actual = Base58::encodeCheck($value);

        // Assert...
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_decode_check()
    {
        // Arrange...
        $value = '32UWxgjUJDXeRwy6c6Fxf';

        // Expect...
        $expected = 'Hello World';

        // Act...
        $actual = Base58::decodeCheck($value);

        // Assert...
        $this->assertEquals($expected, $actual);
    }
}
