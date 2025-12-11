<?php

namespace Onetoweb\Mirakl\Endpoint\Endpoints;

use Onetoweb\Mirakl\Endpoint\AbstractEndpoint;

/**
 * Platform Endpoint.
 */
class Platform extends AbstractEndpoint
{
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function additionalFields(array $query = []): ?array
    {
        return $this->client->get('/api/additional_fields', $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function channels(array $query = []): ?array
    {
        return $this->client->get('/api/channels', $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function currencies(array $query = []): ?array
    {
        return $this->client->get('/api/currencies', $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function documents(array $query = []): ?array
    {
        return $this->client->get('/api/documents', $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function locales(array $query = []): ?array
    {
        return $this->client->get('/api/locales', $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function offersStates(array $query = []): ?array
    {
        return $this->client->get('/api/offers/states', $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function configuration(array $query = []): ?array
    {
        return $this->client->get('/api/platform/configuration', $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function reasons(array $query = []): ?array
    {
        return $this->client->get('/api/reasons', $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function shippingZones(array $query = []): ?array
    {
        return $this->client->get('/api/shipping/zones', $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function shippingTypes(array $query = []): ?array
    {
        return $this->client->get('/api/shipping/types', $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function shippingCarriers(array $query = []): ?array
    {
        return $this->client->get('/api/shipping/carriers', $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function shippingLogisticClasses(array $query = []): ?array
    {
        return $this->client->get('/api/shipping/logistic_classes', $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function version(array $query = []): ?array
    {
        return $this->client->get('/api/version', $query);
    }
}
