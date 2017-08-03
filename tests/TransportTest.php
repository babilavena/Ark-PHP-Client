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
class TransportTest extends TestCase
{
    /** @test */
    public function can_get_list()
    {
        // Act...
        $response = $this->getClient()->api('Transport')->list();

        // Assert...
        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function can_get_blocks_common()
    {
        // Arrange...
        $ids = [];

        // Act...
        $response = $this->getClient()->api('Transport')->blocksCommon($ids);

        // Assert...
        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function can_get_blocks()
    {
        // Act...
        $response = $this->getClient()->api('Transport')->blocks();

        // Assert...
        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function can_get_block()
    {
        // Arrange...
        $id = str_random(34);

        // Act...
        $response = $this->getClient()->api('Transport')->block($id);

        // Assert...
        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function can_add_block()
    {
        // Arrange...
        $block = [];

        // Act...
        $response = $this->getClient()->api('Transport')->addBlock($block);

        // Assert...
        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function can_get_transactions()
    {
        // Act...
        $response = $this->getClient()->api('Transport')->transactions();

        // Assert...
        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function can_get_transactions_from_ids()
    {
        // Arrange...
        $ids = [];

        // Act...
        $response = $this->getClient()->api('Transport')->transactionsFromIds($ids);

        // Assert...
        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function can_add_transactions()
    {
        // Arrange...
        $transactions = [];

        // Act...
        $response = $this->getClient()->api('Transport')->addTransactions($transactions);

        // Assert...
        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function can_get_height()
    {
        // Act...
        $response = $this->getClient()->api('Transport')->height();

        // Assert...
        $this->assertTrue($response->isSuccess());
    }

    /** @test */
    public function can_get_status()
    {
        // Act...
        $response = $this->getClient()->api('Transport')->status();

        // Assert...
        $this->assertTrue($response->isSuccess());
    }
}
