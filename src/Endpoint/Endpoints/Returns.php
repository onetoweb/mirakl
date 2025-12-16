<?php

namespace Onetoweb\Mirakl\Endpoint\Endpoints;

use Onetoweb\Mirakl\Endpoint\AbstractEndpoint;

/**
 * Returns Endpoint.
 */
class Returns extends AbstractEndpoint
{
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function list(array $query = []): ?array
    {
        return $this->client->get('/api/returns', $query);
    }
    
    /**
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function update(array $data, array $query = []): ?array
    {
        return $this->client->put('/api/returns', $data, $query);
    }
    
    /**
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function accept(array $data, array $query = []): ?array
    {
        return $this->client->put('/api/returns/accept', $data, $query);
    }
    
    /**
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function receive(array $data, array $query = []): ?array
    {
        return $this->client->put('/api/returns/receive', $data, $query);
    }
    
    /**
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function compliant(array $data, array $query = []): ?array
    {
        return $this->client->put('/api/returns/compliant', $data, $query);
    }
    
    /**
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function close(array $data, array $query = []): ?array
    {
        return $this->client->put('/api/returns/close', $data, $query);
    }
    
    /**
     * @param array $data
     * @param array $query = []
     *
     * @return array|NULL
     */
    public function cancel(array $data, array $query = []): ?array
    {
        return $this->client->put('/api/returns/cancel', $data, $query);
    }
}
