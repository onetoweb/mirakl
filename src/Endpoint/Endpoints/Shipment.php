<?php

namespace Onetoweb\Mirakl\Endpoint\Endpoints;

use Onetoweb\Mirakl\Endpoint\AbstractEndpoint;

/**
 * Shipment Endpoint.
 */
class Shipment extends AbstractEndpoint
{
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function list(array $query = []): ?array
    {
        return $this->client->get('/api/shipments', $query);
    }
    
    /**
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function create(array $data, array $query = []): ?array
    {
        return $this->client->post('/api/shipments', $data, [], $query);
    }
    
    /**
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function update(array $data, array $query = []): ?array
    {
        return $this->client->put('/api/shipments', $data, [], $query);
    }
    
    /**
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function delete(array $data, array $query = []): ?array
    {
        return $this->client->put('/api/shipments/delete', $data, [], $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function listItems(array $query = []): ?array
    {
        return $this->client->get('/api/shipments/items_to_ship', $query);
    }
    
    /**
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function tracking(array $data, array $query = []): ?array
    {
        return $this->client->post('/api/shipments/tracking', $data, [], $query);
    }
    
    /**
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function validateShipped(array $data, array $query = []): ?array
    {
        return $this->client->put('/api/shipments/ship', $data, [], $query);
    }
    
    /**
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function updateAdditionalInformation(array $data, array $query = []): ?array
    {
        return $this->client->put('/api/shipments/additional_information', $data, [], $query);
    }
}
