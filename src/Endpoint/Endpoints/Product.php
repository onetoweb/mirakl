<?php

namespace Onetoweb\Mirakl\Endpoint\Endpoints;

use Onetoweb\Mirakl\Endpoint\AbstractEndpoint;
use GuzzleHttp\Psr7\Utils;

/**
 * Product Endpoint.
 */
class Product extends AbstractEndpoint
{
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function hierarchies(array $query = []): ?array
    {
        return $this->client->get('/api/hierarchies', $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function list(array $query = []): ?array
    {
        return $this->client->get('/api/products', $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function listImports(array $query = []): ?array
    {
        return $this->client->get('/api/products/imports', $query);
    }
    
    /**
     * @param int $importId
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function getImport(int $importId, array $query = []): ?array
    {
        return $this->client->get("/api/products/imports/$importId", $query);
    }
    
    /**
     * @param int $importId
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function getImportErrorReport(int $importId, array $query = []): ?array
    {
        return $this->client->get("/api/products/imports/$importId/error_report", $query);
    }
    
    /**
     * @param int $importId
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function getImportNewProductReport(int $importId, array $query = []): ?array
    {
        return $this->client->get("/api/products/imports/$importId/new_product_report", $query);
    }
    
    /**
     * @param int $importId
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function getImportTransformedFile(int $importId, array $query = []): ?array
    {
        return $this->client->get("/api/products/imports/$importId/transformed_file", $query);
    }
    
    /**
     * @param int $importId
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function getImportTransformedFileErrorReport(int $importId, array $query = []): ?array
    {
        return $this->client->get("/api/products/imports/$importId/transformation_error_report", $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function attributes(array $query = []): ?array
    {
        return $this->client->get('/api/products/attributes', $query);
    }
    
    /**
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function listValues(array $query = []): ?array
    {
        return $this->client->get('/api/values_lists', $query);
    }
    
    /**
     * @param string $file
     * @param array $conversionOptions
     * @param string $conversionType = 'STANDARD'
     * @param bool $operatorFormat = false
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function createImport(string $file, array $conversionOptions, string $conversionType = 'STANDARD', bool $operatorFormat = false, array $query = []): ?array
    {
        // add conversion options
        $multipart[] = [
            'name' => 'conversion_options',
            'contents' => json_encode($conversionOptions),
            'headers' => [
                'type' => 'application/json'
            ]
        ];
        
        // add conversion type
        $multipart[] = [
            'name' => 'conversion_type',
            'contents' => $conversionType,
            'headers' => [
                'type' => 'application/json'
            ]
        ];
        
        // add file
        $multipart[] = [
            'name' => 'file',
            'contents' => Utils::tryFopen($file, 'r')
        ];
        
        // add operator format
        $multipart[] = [
            'name' => 'operator_format',
            'contents' => $operatorFormat,
            'headers' => [
                'type' => 'application/json'
            ]
        ];
        
        return $this->client->post('/api/products/imports', [], $multipart);
    }
}
