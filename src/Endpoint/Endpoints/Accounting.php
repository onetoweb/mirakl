<?php

namespace Onetoweb\Mirakl\Endpoint\Endpoints;

use Onetoweb\Mirakl\Endpoint\AbstractEndpoint;
use GuzzleHttp\Psr7\Utils;

/**
 * Accounting Endpoint.
 */
class Accounting extends AbstractEndpoint
{
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function listRequests(array $query = []): ?array
    {
        return $this->client->get('/api/document-request/requests', $query);
    }
    
    /**
     * @param string $documentRequestId
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function listRequestLines(string $documentRequestId, array $query = []): ?array
    {
        return $this->client->get("/api/document-request/$documentRequestId/lines", $query);
    }
    
    /**
     * @param array $query = [];
     * 
     * @return array|NULL
     */
    public function downloadRequestDocument(array $query = []): ?array
    {
        return $this->client->get('/api/document-request/documents/download', $query);
    }
    
    /**
     * @param array $files
     * @param array $data
     * @param array $query = [];
     * 
     * @return array|NULL
     */
    public function uploadRequestDocuments(array $files, array $data, array $query = []): ?array
    {
        $multipart = [];
        
        $multipart[] = [
            'name' => 'documents_input',
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
        
        return $this->client->post('/api/document-request/documents/upload', [], $multipart, $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function listInvoices(array $query = []): ?array
    {
        return $this->client->get('/api/invoices', $query);
    }
    
    /**
     * @param string $documentId
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function downloadInvoiceDocument(string $documentId, array $query = []): ?array
    {
        return $this->client->get("/api/invoices/$documentId", $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function listTransactionsLogs(array $query = []): ?array
    {
        return $this->client->get('/api/sellerpayment/transactions_logs', $query);
    }
    
    /**
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function exportTransactionLines(array $data, array $query = []): ?array
    {
        return $this->client->post('/api/sellerpayment/transactions_logs/async', $data, [], $query);
    }
    
    /**
     * @param string $trackingId
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function statusExportTransactionLines(string $trackingId, array $query = []): ?array
    {
        return $this->client->get("/api/sellerpayment/transactions_logs/async/status/$trackingId", $query);
    }
}
