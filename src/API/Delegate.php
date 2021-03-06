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

class Delegate extends AbstractAPI
{
    /**
     * @return \BrianFaust\Http\HttpResponse
     */
    public function count(): HttpResponse
    {
        return $this->client->get('api/delegates/count');
    }

    /**
     * @param string $q
     * @param array  $parameters
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function search(string $q, array $parameters = []): HttpResponse
    {
        return $this->client->get('api/delegates/search', compact('q') + $parameters);
    }

    /**
     * @param string $publicKey
     * @param array  $parameters
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function voters(string $publicKey, array $parameters = []): HttpResponse
    {
        return $this->client->get('api/delegates/voters', compact('publicKey') + $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function delegate(array $parameters = []): HttpResponse
    {
        return $this->client->get('api/delegates/get', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function delegates(array $parameters = []): HttpResponse
    {
        return $this->client->get('api/delegates', $parameters);
    }

    /**
     * @return \BrianFaust\Http\HttpResponse
     */
    public function fee(): HttpResponse
    {
        return $this->client->get('api/delegates/fee');
    }

    /**
     * @param string $generatorPublicKey
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function forgedByAccount(string $generatorPublicKey): HttpResponse
    {
        return $this->client->get('api/delegates/forging/getForgedByAccount', compact('generatorPublicKey'));
    }

    /**
     * @param string $secret
     * @param array  $parameters
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function create(string $secret, array $parameters = []): HttpResponse
    {
        return $this->client->put('api/delegates', compact('secret') + $parameters);
    }

    /**
     * @return \BrianFaust\Http\HttpResponse
     */
    public function nextForgers(): HttpResponse
    {
        return $this->client->get('api/delegates/getNextForgers');
    }

    /**
     * @param string $secret
     * @param array  $parameters
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function enableForging(string $secret, array $parameters = []): HttpResponse
    {
        return $this->client->post('api/delegates/forging/enable', compact('secret') + $parameters);
    }

    /**
     * @param string $secret
     * @param array  $parameters
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function disableForging(string $secret, array $parameters = []): HttpResponse
    {
        return $this->client->post('api/delegates/forging/disable', compact('secret') + $parameters);
    }

    /**
     * @param string $publicKey
     * @param array  $parameters
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function forgingStatus(string $publicKey, array $parameters = []): HttpResponse
    {
        return $this->client->post('api/delegates/forging/disable', compact('publicKey') + $parameters);
    }
}
