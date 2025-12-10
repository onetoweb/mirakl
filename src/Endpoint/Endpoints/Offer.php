<?php

namespace Onetoweb\Mirakl\Endpoint\Endpoints;

use Onetoweb\Mirakl\Endpoint\AbstractEndpoint;
use Onetoweb\Mirakl\CsvTrait;
use GuzzleHttp\Psr7\Utils;

/**
 * Offer Endpoint.
 */
class Offer extends AbstractEndpoint
{
    use CsvTrait;
    
    /**
     * @param string $importMode = 'NORMAL'
     * @param bool $operatorFormat = false
     * @param bool $withProducts = false
     * @param string $file
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function importFile(
        string $importMode = 'NORMAL',
        bool $operatorFormat = false,
        bool $withProducts = false,
        string $file,
        array $query = []
    ): ?array {
        
        $multipart = [];
        
        $multipart[] = [
            'name' => 'file',
            'contents' => Utils::tryFopen($file, 'r')
        ];
        
        $multipart[] = [
            'name' => 'import_mode',
            'contents' => $importMode,
            'headers' => [
                'type' => 'application/json'
            ]
        ];
        
        $multipart[] = [
            'name' => 'operator_format',
            'contents' => $operatorFormat,
            'headers' => [
                'type' => 'application/json'
            ]
        ];
        
        $multipart[] = [
            'name' => 'with_products',
            'contents' => $withProducts,
            'headers' => [
                'type' => 'application/json'
            ]
        ];
        
        return $this->client->post('/api/offers/imports', [], $multipart, $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function listImportFiles(array $query = []): ?array
    {
        return $this->client->get('/api/offers/imports', $query);
    }
    
    /**
     * @param string $importId
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function getImportFile(string $importId, array $query = []): ?array
    {
        return $this->client->get("/api/offers/imports/$importId", $query);
    }
    
    /**
     * @param string $importId
     * @param array $query = []
     *
     * @return array|NULL
     */
    public function getImportErrorReport(string $importId, array $query = []): ?array
    {
        return $this->client->get("/api/offers/imports/$importId/error_report", $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function list(array $query = []): ?array
    {
        return $this->client->get('/api/offers', $query);
    }
    
    /**
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function save(array $data, array $query = []): ?array
    {
        return $this->client->post('/api/offers', $data, [], $query);
    }
    
    /**
     * @param string $offerId
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function get(string $offerId, array $query = []): ?array
    {
        return $this->client->get("/api/offers/$offerId", $query);
    }
    
    /**
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function exportAsync(array $data, array $query = []): ?array
    {
        return $this->client->post('/api/offers/export/async', $data, [], $query);
    }
    
    /**
     * @param string $trackingId
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function exportAsyncStatus(string $trackingId, array $query = []): ?array
    {
        return $this->client->get("/api/offers/export/async/status/$trackingId", $query);
    }
    
    /**
     * @param string $url
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function exportAsyncDownload(string $url, array $query = []): ?array
    {
        // get endpoint
        $endpoint = parse_url($url, PHP_URL_PATH);
        
        // parse query string
        parse_str(parse_url($url, PHP_URL_QUERY), $query);
        
        return $this->client->get($endpoint, $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function listForProduct(array $query = []): ?array
    {
        return $this->client->get('/api/products/offers', $query);
    }
    
    /**
     * @param string $file
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function importPriceFile(string $file, array $query = []): ?array
    {
        $multipart = [];
        
        $multipart[] = [
            'name' => 'file',
            'contents' => Utils::tryFopen($file, 'r')
        ];
        
        return $this->client->post('/api/offers/pricing/imports', [], $multipart, $query);
    }
    
    /**
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function importPriceFromArray(array $data, array $query = []): ?array
    {
        $contents = self::createCsvString($data);
        
        $multipart = [];
        
        $multipart[] = [
            'name' => 'file',
            'contents' => $contents,
            'filename' => 'price_import_'.time().'.csv'
        ];
        
        return $this->client->post('/api/offers/pricing/imports', [], $multipart, $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function importPriceFileStatus(array $query = []): ?array
    {
        return $this->client->get('/api/offers/pricing/imports', $query);
    }
    
    /**
     * @param string $importId
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function importPriceFileErrorReport(string $importId, array $query = []): ?array
    {
        return $this->client->get("/api/offers/pricing/imports/$importId/error_report", $query);
    }
    
    /**
     * @param string $file
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function importStockFile(string $file, array $query = []): ?array
    {
        $multipart = [];
        
        $multipart[] = [
            'name' => 'file',
            'contents' => Utils::tryFopen($file, 'r')
        ];
        
        return $this->client->post('/api/offers/stock/imports', [], $multipart, $query);
    }
    
    /**
     * Uses /api/offers/imports endpoint.
     * 
     * @param array $data
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function importStockFromArray(array $data, array $query = []): ?array
    {
        $contents = self::createCsvString($data, [
            'update-delete' => 'update'
        ]);
        
        $multipart = [];
        
        $multipart[] = [
            'name' => 'file',
            'contents' => $contents,
            'filename' => 'stock_import_'.time().'.csv'
        ];
        
        $multipart[] = [
            'name' => 'import_mode',
            'contents' => 'NORMAL',
            'headers' => [
                'type' => 'application/json'
            ]
        ];
        
        $multipart[] = [
            'name' => 'operator_format',
            'contents' => false,
            'headers' => [
                'type' => 'application/json'
            ]
        ];
        
        $multipart[] = [
            'name' => 'with_products',
            'contents' => false,
            'headers' => [
                'type' => 'application/json'
            ]
        ];
        
        return $this->client->post('/api/offers/imports', [], $multipart, $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function importStockFileStatus(string $importId, array $query = []): ?array
    {
        return $this->client->get("/api/offers/stock/imports/$importId/status", $query);
    }
    
    /**
     * @param string $importId
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function importStockFileErrorReport(string $importId, array $query = []): ?array
    {
        return $this->client->get("/api/offers/stock/imports/$importId/error_report", $query);
    }
}
