<?php

namespace Onetoweb\Mirakl\Endpoint\Endpoints;

use Onetoweb\Mirakl\Endpoint\AbstractEndpoint;
use GuzzleHttp\Psr7\Utils;

/**
 * Store Endpoint.
 */
class Store extends AbstractEndpoint
{
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function get(array $query = []): ?array
    {
        return $this->client->get('/api/account', $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function documents(array $query = []): ?array
    {
        return $this->client->get('/api/shops/documents', $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function downloads(array $query = []): ?array
    {
        return $this->client->get('/api/shops/documents/download', $query);
    }
    
    /**
     * @param array $data
     * 
     * @return array|NULL
     */
    public function update(array $data): ?array
    {
        return $this->client->put('/api/account', $data);
    }
    
    /**
     * @param int $documentId
     * @param int $shopId
     * 
     * @return array|NULL
     */
    public function deleteDocument(int $documentId, int $shopId): ?array
    {
        return $this->client->delete("/api/shops/documents/{$documentId}", [
            'shop_id' => $shopId
        ]);
    }
    
    /**
     * @param array $data
     * 
     * @return array|NULL
     */
    public function uploadDocument(array $data, array $files): ?array
    {
        $multipart = [];
        
        $multipart[] = [
            'name' => 'shop_documents',
            'contents' => addslashes(json_encode($data)),
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
        
        return $this->client->post('/api/shops/documents', [], $multipart);
    }
}
