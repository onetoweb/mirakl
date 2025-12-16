<?php

namespace Onetoweb\Mirakl\Endpoint\Endpoints;

use Onetoweb\Mirakl\Endpoint\AbstractEndpoint;

/**
 * Incident Endpoint.
 */
class Incident extends AbstractEndpoint
{
    /**
     * @param string $orderId
     * @param string $line
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function resolve(string $orderId, string $line, array $data, array $query = []): ?array
    {
        return $this->client->put("/api/orders/$orderId/lines/$line/resolve_incident", $data, $query);
    }
}
