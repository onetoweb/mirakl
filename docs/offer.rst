.. _top:
.. title:: Offer

`Back to index <index.rst>`_

=====
Offer
=====

.. contents::
    :local:


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


`Back to top <#top>`_