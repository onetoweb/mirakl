<?php

namespace Onetoweb\Mirakl\Endpoint\Endpoints;

use Onetoweb\Mirakl\Endpoint\AbstractEndpoint;

/**
 * User Endpoint.
 */
class User extends AbstractEndpoint
{
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function roles(array $query = []): ?array
    {
        return $this->client->get('/api/users/shops/roles', $query);
    }
}
