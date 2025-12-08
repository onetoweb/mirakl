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
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function list(array $query = []): ?array
    {
        return $this->client->get('/api/offers', $query);
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
}
