<?php

namespace Onetoweb\Mirakl\Endpoint\Endpoints;

use Onetoweb\Mirakl\Endpoint\AbstractEndpoint;
use GuzzleHttp\Psr7\Utils;

/**
 * Order Endpoint.
 */
class Order extends AbstractEndpoint
{
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function list(array $query = []): ?array
    {
        return $this->client->get('/api/orders', $query);
    }
    
    /**
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function exportAsync(array $data, array $query = []): ?array
    {
        return $this->client->post('/api/orders/async-export', $data, [], $query);
    }
    
    /**
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function update(array $data, array $query = []): ?array
    {
        return $this->client->put('/api/orders', $data, $query);
    }
    
    /**
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function updateShippingFrom(array $data, array $query = []): ?array
    {
        return $this->client->put('/api/orders/shipping_from', $data, $query);
    }
    
    /**
     * @param string $trackingId
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function exportAsyncStatus(string $trackingId, array $data, array $query = []): ?array
    {
        return $this->client->put("/api/orders/async-export/status/$trackingId", $data, $query);
    }
    
    /**
     * @param string $orderId
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function acceptOrderlines(string $orderId, array $data, array $query = []): ?array
    {
        return $this->client->put("/api/orders/$orderId/accept", $data, $query);
    }
    
    /**
     * @param string $orderId
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function validateShipment(string $orderId, array $data, array $query = []): ?array
    {
        return $this->client->put("/api/orders/$orderId/ship", $data, $query);
    }
    
    /**
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function refundOrderLines(array $data, array $query = []): ?array
    {
        return $this->client->put('/api/orders/refund', $data, $query);
    }
    
    /**
     * @param string $orderId
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function cancel(string $orderId, array $data, array $query = []): ?array
    {
        return $this->client->put("/api/orders/$orderId/cancel", $data, $query);
    }
    
    /**
     * @param string $orderId
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function cancelOrderlines(array $data, array $query = []): ?array
    {
        return $this->client->put('/api/orders/cancel', $data, $query);
    }
    
    /**
     * @param string $orderId
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function updateAdditionalFields(string $orderId, array $data, array $query = []): ?array
    {
        return $this->client->put("/api/orders/$orderId/additional_fields", $data, $query);
    }
    
    /**
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function adjustOrderLine(array $data, array $query = []): ?array
    {
        return $this->client->put('/api/orders/adjust', $data, $query);
    }
    
    /**
     * @param string $orderId
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function evaluation(string $orderId, array $query = []): ?array
    {
        return $this->client->get("/api/orders/$orderId/evaluation", $query);
    }
    
    /**
     * @param array $query
     * 
     * @return array|NULL
     */
    public function documents(array $query): ?array
    {
        return $this->client->get('/api/orders/documents', $query);
    }
    
    /**
     * @param array $query
     * 
     * @return array|NULL
     */
    public function downloadDocuments(array $query): ?array
    {
        return $this->client->get('/api/orders/documents/download', $query);
    }
    
    /**
     * @param string $orderId
     * @param array $data
     * @param array $files
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function uploadDocuments(string $orderId, array $data, array $files, array $query = []): ?array
    {
        $multipart = [];
        
        $multipart[] = [
            'name' => 'order_documents',
            'contents' => json_encode($data),
            'headers' => [
                'type' => 'application/json'
            ]
        ];
        
        foreach ($files as $file) {
            
            $multipart[] = [
                'name' => 'files[]',
                'contents' => Utils::tryFopen($file, 'r')
            ];
        }
        
        return $this->client->post("/api/orders/$orderId/documents", [], $multipart);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function taxes(array $query = []): ?array
    {
        return $this->client->get('/api/orders/taxes', $query);
    }
    
    /**
     * @param string $documentId
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function deleteDocument(string $documentId, array $query = []): ?array
    {
        return $this->client->delete("/api/orders/documents/$documentId", $query);
    }
}
