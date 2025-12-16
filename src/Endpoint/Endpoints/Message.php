<?php

namespace Onetoweb\Mirakl\Endpoint\Endpoints;

use Onetoweb\Mirakl\Endpoint\AbstractEndpoint;
use GuzzleHttp\Psr7\Utils;

/**
 * Message Endpoint.
 */
class Message extends AbstractEndpoint
{
    /**
     * @param string $threadId
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function getThread(string $threadId, array $query = []): ?array
    {
        return $this->client->get("/api/inbox/threads/$threadId", $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function listThreads(array $query = []): ?array
    {
        return $this->client->get('/api/inbox/threads', $query);
    }
    
    /**
     * @param array $files
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function createThread(array $files, array $data, array $query = []): ?array
    {
        $multipart = [];
        
        foreach ($files as $file) {
            
            $multipart[] = [
                'name' => 'files[]',
                'contents' => Utils::tryFopen($file, 'r')
            ];
        }
        
        $multipart[] = [
            'name' => 'thread_input',
            'contents' => json_encode($data),
            'headers' => [
                'type' => 'application/json'
            ]
        ];
        
        return $this->client->post('/api/inbox/threads', [], $multipart, $query);
    }
    
    /**
     * @param string $threadId
     * @param array $files
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function replyToThread(string $threadId, array $files, array $data, array $query = []): ?array
    {
        $multipart = [];
        
        foreach ($files as $file) {
            
            $multipart[] = [
                'name' => 'files[]',
                'contents' => Utils::tryFopen($file, 'r')
            ];
        }
        
        $multipart[] = [
            'name' => 'message_input',
            'contents' => json_encode($data),
            'headers' => [
                'type' => 'application/json'
            ]
        ];
        
        return $this->client->post("/api/inbox/threads/$threadId/message", [], $multipart, $query);
    }
    
    /**
     * @param array $attachmentId
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function downloadAttachment(string $attachmentId, array $query = []): ?array
    {
        return $this->client->get("/api/inbox/threads/$attachmentId/download", $query);
    }
    
    /**
     * @param array $orderId
     * @param array $files
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function createThreadOnOrder(string $orderId, array $files, array $data, array $query = []): ?array
    {
        $multipart = [];
        
        foreach ($files as $file) {
            
            $multipart[] = [
                'name' => 'files[]',
                'contents' => Utils::tryFopen($file, 'r')
            ];
        }
        
        $multipart[] = [
            'name' => 'thread_input',
            'contents' => json_encode($data),
            'headers' => [
                'type' => 'application/json'
            ]
        ];
        
        return $this->client->post("/api/orders/$orderId/threads", [], $multipart, $query);
    }
}
