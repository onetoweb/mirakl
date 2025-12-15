.. _top:
.. title:: Offer

`Back to index <index.rst>`_

=====
Offer
=====

.. contents::
    :local:


Import a file to add offers
```````````````````````````

.. code-block:: php
    
    $importMode = 'NORMAL'; // NORMAL or REPLACE
    $operatorFormat = false;
    $withProducts = false;
    $file = '/path/to/file';
    $result = $client->offer->importFile($importMode, $operatorFormat, $withProducts, $file, [
        
        // optional parameters
        'shop_id' => 0
    ]);


Get information and statistics about offer imports
``````````````````````````````````````````````````

.. code-block:: php
    
    $result = $client->offer->listImportFiles([
        
        // optional parameters
        'start_date' => '2019-08-24T14:15:22Z',
        'end_date' => '2019-08-24T14:15:22Z',
        'status' => 'WAITING_SYNCHRONIZATION_PRODUCT',
        'mode' => 'NORMAL',
        'origins' => 'API',
        'shop_id' => 0
    ]);


Import stock from array
```````````````````````

| Status of the import can be viewed with 'Get information and statistics about an offer import'
| Error report of the import can be viewed with 'Get the error report file for an offer import'

.. code-block:: php
    
    $data = [
        [
            'offer-sku' => 'string',
            'quantity' => 42
        ]
    ];
    $result = $client->offer->importStockFromArray($data);


Get information and statistics about an offer import
````````````````````````````````````````````````````

.. code-block:: php
    
    $importId = '42';
    $result = $client->offer->getImportFile($importId, [
        
        // optional parameters
        'shop_id' => 0
    ]);


Get the error report file for an offer import
`````````````````````````````````````````````

.. code-block:: php
    
    $importId = '42';
    $result = $client->offer->getImportFile($importId, [
        
        // optional parameters
        'shop_id' => 0
    ]);


List offers of a shop
`````````````````````

.. code-block:: php
    
    $result = $client->offer->list([
    
        // optional parameters
        'offer_state_codes' => 'string',
        'sku' => 'string',
        'product_id' => 'string',
        'favorite' => false,
        'pricing_channel_code' => 'string',
        'pricing_customer_organization_id' => 'string',
        'shop_id' => 0
    ]);


Create, update, or delete offers
````````````````````````````````

.. code-block:: php
    
    $data = [
        'offers' => [
            [
                'all_prices' => [
                    [
                        'channel_code' => 'US',
                        'discount_end_date' => '2019-04-29T22:00:00Z',
                        'discount_start_date' => '2019-04-01T22:00:00Z',
                        'unit_discount_price' => '49',
                        'unit_origin_price' => 50,
                        'volume_prices' => [
                            [
                                'quantity_threshold' => 5,
                                'unit_discount_price' => 45,
                                'unit_origin_price' => 48
                            ]
                        ]
                    ]
                ],
                'allow_quote_requests' => false,
                'available_ended' => '2019-05-29T22:00:00Z',
                'available_started' => '2019-03-01T22:00:00Z',
                'description' => 'Offer for product MKP100000000154824',
                'discount' => [
                    'end_date' => '2019-05-31T22:00:00Z',
                    'price' => 49,
                    'ranges' => [
                        [
                            'price' => 45,
                            'quantity_threshold' => 5
                        ]
                    ],
                    'start_date' => '2019-03-31T22:00:00Z'
                ],
                'eco_contributions' => [
                    [
                        'eco_contribution_amount' => 3.59,
                        'epr_category_code' => 'FR-DEA',
                        'producer_id' => 'FR123456_89ABCD'
                    ], [
                        'eco_contribution_amount' => 0.99,
                        'epr_category_code' => 'DE-WEEE',
                        'producer_id' => 'ProducerID1'
                    ]
                ],
                'internal_description' => 'Offer for product MKP100000000154824',
                'leadtime_to_ship' => 5,
                'logistic_class' => 'M',
                'max_order_quantity' => 3,
                'min_order_quantity' => 1,
                'min_quantity_alert' => 2,
                'offer_additional_fields' => [
                    [
                        'code' => 'ecotax',
                        'value' => '20'
                    ]
                ],
                'package_quantity' => '2',
                'price' => 50,
                'price_additional_info' => 'Apply Discount prices',
                'product_id' => '9400016774345',
                'product_id_type' => 'EAN',
                'product_tax_code' => 'tax',
                'quantity' => '5000',
                'shop_sku' => 'Offer_SKU_001',
                'state_code' => '11',
                'update_delete' => 'update'
            ]
        ]
    ];
    $result = $client->offer->save($data, [
        
        // optional parameters
        'shop_id' => 0
    ]);


Get information about an offer
``````````````````````````````

.. code-block:: php
    
    $offerId = '42';
    $result = $client->offer->get($offerId, [
        
        // optional parameters
        'pricing_channel_code' => 'string',
        'pricing_customer_organization_id' => 'string',
        'shop_id' => 0
    ]);


Export offers CSV or JSON file asynchronously
`````````````````````````````````````````````

.. code-block:: php
    
    $data = [
        'channel_codes' => [
            'B2B'
        ],
        'export_type' => 'text/csv',
        'include_fields' => [
            'active',
            'allow-quote-requests',
            'available-end-date',
            'available-start-date',
            'channels',
            'currency-iso-code',
            'date-created',
            'deleted',
            'description',
            'discount-end-date',
            'discount-price',
            'discount-ranges',
            'discount-start-date',
            'favorite-rank',
            'fulfillment-center-code',
            'leadtime-to-ship',
            'logistic-class',
            'measurement-units',
            'min-shipping-price',
            'min-shipping-price-additional',
            'min-shipping-type',
            'min-shipping-zone',
            'offer-id',
            'origin-price',
            'premium',
            'price',
            'price[channel=B2B]',
            'price-additional-info',
            'price-ranges',
            'product-sku',
            'professional',
            'quantity',
            'shop-id',
            'shop-name',
            'shop-sku',
            'state-code',
            'total-price'
        ],
        'items_per_chunk' => 10000,
        'last_request_date' => '2021-11-12T02:34:00Z',
        'megabytes_per_chunk' => 100,
        'rename_fields' => [
            'active' => 'active',
            'allow-quote-requests' => 'allowQuoteRequests',
            'available-end-date' => 'availableEndDate',
            'available-start-date' => 'availableStartDate',
            'channels' => 'channels',
            'currency-iso-code' => 'currencyIsoCode',
            'date-created' => 'dateCreated',
            'deleted' => 'deleted',
            'description' => 'description',
            'discount-end-date' => 'discountEndDate',
            'discount-price' => 'discountPrice',
            'discount-ranges' => 'discountRanges',
            'discount-start-date' => 'discountStartDate',
            'favorite-rank' => 'favoriteRank',
            'fulfillment-center-code' => 'fulfillmentCenterCode',
            'leadtime-to-ship' => 'leadtimeToShip',
            'logistic-class' => 'logisticClass',
            'measurement-units' => 'measurementUnits',
            'min-shipping-price' => 'minShippingPrice',
            'min-shipping-price-additional' => 'minShippingPriceAdditional',
            'min-shipping-type' => 'minShippingType',
            'min-shipping-zone' => 'minShippingZone',
            'offer-id' => 'offerId',
            'origin-price' => 'originPrice',
            'premium' => 'premium',
            'price' => 'price',
            'price-additional-info' => 'priceAdditionalinfo',
            'price-ranges' => 'priceRanges',
            'product-sku' => 'productSku',
            'professional' => 'professional',
            'quantity' => 'quantity',
            'shop-id' => 'shopId',
            'shop-name' => 'shopName',
            'state-code' => 'stateCode',
            'total-price' => 'totalPrice'
        ],
        'shipping_zones' => [
            'DOM1'
        ]
    ];
    $result = $client->offer->exportAsync($data, [
        
        // optional parameters
        'shop_id' => 0
    ]);


Poll the status of an asynchronous offer export
```````````````````````````````````````````````

.. code-block:: php
    
    $trackingId = '42';
    $result = $client->offer->exportAsyncStatus($trackingId, [
        
        // optional parameters
        'shop_id' => 0
    ]);


Retrieve offer files once asynchronous offer export is complete
```````````````````````````````````````````````````````````````

| Use the url returned by 'Poll the status of an asynchronous offer export'

.. code-block:: php
    
    $url = 'https://yourinstance.mirakl.net/api/offers/export/async/file/00000000-0000-0000-0000-000000000000?file=of52-export/obelinknl-prod/00000000-0000-0000-0000-000000000000/0.cs';
    
    $result = $client->offer->exportAsyncDownload($url);
    
    // store file
    $filename = '/path/to/'.$result['filename'];
    $result = \Onetoweb\Mirakl\Utils::storeFile($filename, $result);


List offers for each given product
``````````````````````````````````

.. code-block:: php
    
    $result = $client->offer->listForProduct([
        
        // one of the two is required product_ids or product_references
        'product_ids' => 'string',
        'product_references' => 'string',
        
        // optional parameters
        'offer_state_codes' => 'string',
        'all_offers' => false,
        'channel_codes' => 'string',
        'all_channels' => false,
        'pricing_channel_code' => 'string',
        'pricing_customer_organization_id' => 'string',
        'shipping_zones' => 'string',
        'all_shipping_zones' => false,
        'shop_id' => 0
    ]);


Import a price file
```````````````````

.. code-block:: php
    
    $file = '/path/to/file';
    $result = $client->offer->importPriceFile($file, [
        
        // optional parameters
        'shop_id' => 0
    ]);


Import a prices from array
``````````````````````````

.. code-block:: php
    
    $result = $client->offer->importPriceFromArray([[
        'offer-sku' => 'string',
        'price' => 1.1,
    ], [
        'offer-sku' => 'string',
        'price' => 1.2,
    ]]);


Get information and statistics about an offer pricing import
````````````````````````````````````````````````````````````

.. code-block:: php
    
    $result = $client->offer->importPriceFileStatus([
        
        // optional parameters 
        'import_id' => 'string',
        'start_date' => '2019-08-24T14:15:22Z',
        'end_date' => '2019-08-24T14:15:22Z',
        'status' => 'WAITING',
        'origins' => 'API',
        'shop_id' => 0
    ]);


Get the error report for a price import in CSV format
`````````````````````````````````````````````````````

.. code-block:: php
    
    $result = $client->offer->importPriceFileErrorReport([
        
        // optional parameters
        'shop_id' => 0
    ]);


Import a stock file
```````````````````

.. code-block:: php
    
    $file = '/path/to/file';
    $result = $client->offer->importStockFile($file, [
        
        // optional parameters 
        'shop_id' => 0
    ]);


Get information and statistics about an offer stock import
``````````````````````````````````````````````````````````

.. code-block:: php
    
    $importId = '42';
    $result = $client->offer->importStockFileStatus($importId, [
        
        // optional parameters
        'shop_id' => 0
    ]);


Get the error report for a stock import in CSV format
`````````````````````````````````````````````````````

.. code-block:: php
    
    $importId = '42';
    $result = $client->offer->importPriceFileErrorReport($importId, [
        
        // optional parameters
        'shop_id' => 0
    ]);


`Back to top <#top>`_