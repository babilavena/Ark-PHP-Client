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

namespace BrianFaust\Ark\API;

use BrianFaust\Http\HttpResponse;

class Peer extends AbstractAPI
{
    /**
     * Get a single peer.
     *
     * @param string $ip
     * @param int    $port
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function peer(string $ip, int $port): HttpResponse
    {
        return $this->client->get('api/peers/get', compact('ip', 'port'));
    }

    /**
     * Get all peers.
     *
     * @param array $parameters
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function peers(array $parameters = []): HttpResponse
    {
        return $this->client->get('api/peers', $parameters);
    }

    /**
     * Get the peer version.
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function version(): HttpResponse
    {
        return $this->client->get('api/peers/version');
    }
}
