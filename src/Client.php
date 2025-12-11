<?php

namespace Onetoweb\Mirakl;

use Onetoweb\Mirakl\Endpoint\Endpoints;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Client as GuzzleCLient;

/**
 * Mirakl Api Client.
 */
#[\AllowDynamicProperties]
class Client
{
    /**
     * Base href
     */
    public const BASE_HREF = 'https://%s.mirakl.net';
    
    /**
     * Methods.
     */
    public const METHOD_GET = 'GET';
    public const METHOD_POST = 'POST';
    public const METHOD_PUT = 'PUT';
    public const METHOD_DELETE = 'DELETE';
    
    /**
     * @var string
     */
    private $apiKey;
    
    /**
     * @var string
     */
    private $instance;
    
    /**
     * @param string $instance
     * @param string $apiKey
     */
    public function __construct(string $instance, string $apiKey)
    {
        $this->instance = $instance;
        $this->apiKey = $apiKey;
        
        // load endpoints
        $this->loadEndpoints();
    }
    
    /**
     * @return void
     */
    private function loadEndpoints(): void
    {
        foreach (Endpoints::list() as $name => $class) {
            $this->{$name} = new $class($this);
        }
    }
    
    /**
     * @return string
     */
    public function getBaseHref(): string
    {
        return sprintf(self::BASE_HREF, $this->instance);
    }
    
    /**
     * @param string $endpoint
     * 
     * @return array|NULL
     */
    public function getUrl(string $endpoint): string
    {
        return $this->getBaseHref() . '/' . ltrim($endpoint, '/');
    }
    
    /**
     * @param string $endpoint
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function get(string $endpoint, array $query = []): ?array
    {
        return $this->request(self::METHOD_GET, $endpoint, [], $query);
    }
    
    /**
     * @param string $endpoint
     * @param array $data = []
     * @param array $multipart = []
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function post(string $endpoint, array $data = [], array $multipart = [], array $query = []): ?array
    {
        return $this->request(self::METHOD_POST, $endpoint, $data, $query, $multipart);
    }
    
    /**
     * @param string $endpoint
     * @param array $data = []
     * @param array $query = []
     * 
     * @return array|NULL
     */
    public function put(string $endpoint, array $data = [], array $query = []): ?array
    {
        return $this->request(self::METHOD_PUT, $endpoint, $data, $query);
    }
    
    /**
     * @param string $endpoint
     * 
     * @return array
     */
    public function delete(string $endpoint): ?array
    {
        return $this->request(self::METHOD_DELETE, $endpoint);
    }
    
    /**
     * @param string $method
     * @param string $endpoint
     * @param array $data = []
     * @param array $query = []
     * @param array $multipart = []
     * 
     * @return array|NULL
     */
    public function request(string $method, string $endpoint, array $data = [], array $query = [], array $multipart = []): ?array
    {
        // build options
        $options = [
            RequestOptions::HTTP_ERRORS => false,
            RequestOptions::QUERY => $query,
            RequestOptions::HEADERS => [
                'Authorization' => $this->apiKey,
            ],
        ];
        
        if (count($multipart) > 0) {
            
            // make multipart request
            $options[RequestOptions::MULTIPART] = $multipart;
            
        } elseif (count($data) > 0) {
            
            // add json
            $options[RequestOptions::JSON] = $data;
        }
        
        // make request
        $response = (new GuzzleCLient())->request($method, $this->getUrl($endpoint), $options);
        
        // get contents
        $contents = $response->getBody()->getContents();
        
        if (str_contains($response->getHeaderLine('Content-Type'), 'application/json')) {
            
            // decode json
            $json = json_decode($contents, true);
            
        } elseif ($response->hasHeader('Content-Type')) {
            
            // build array
            $json = [
                'type' => $response->getHeaderLine('Content-Type'),
                'filename' => rtrim(ltrim($response->getHeaderLine('Content-Disposition'), 'attachment; filename="'), '"'),
                'contents' => base64_encode($contents)
            ];
            
        } else {
            
            $json = null;
        }
        
        return $json;
    }
}
