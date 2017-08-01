<?php

/*
 * This file is part of Ark PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Ark;

use BrianFaust\Http\Http;

class Client
{
    /** @var string */
    public $ip;

    /** @var int */
    public $port;

    /** @var string */
    public $nethash;

    /** @var string */
    public $version;

    /**
     * Create a new Ark client instance.
     *
     * @param string $ip
     * @param int $port
     * @param string $nethash
     * @param string $version
     */
    public function __construct(string $ip, int $port, string $nethash, string $version)
    {
        $this->ip = $ip;
        $this->port = $port;
        $this->nethash = $nethash;
        $this->version = $version;
    }

    /**
     * @param string $name
     *
     * @return \BrianFaust\Ark\API\AbstractAPI
     */
    public function api(string $name): API\AbstractAPI
    {
        $client = Http::withBaseUri("http://{$this->ip}:{$this->port}/")->withHeaders([
            'nethash' => $this->nethash,
            'version' => $this->version,
            'port'    => $this->port,
        ]);

        $class = "BrianFaust\\Ark\\API\\{$name}";

        return new $class($client);
    }
}
