.. _top:
.. title:: Stores

`Back to index <index.rst>`_

======
Stores
======

.. contents::
    :local:


Get shop information
````````````````````

.. code-block:: php
    
    $result = $client->store->get([
        
        // optional parameters
        'shop_id' => 0
    ]);


List shop's documents
`````````````````````

.. code-block:: php
    
    $result = $client->store->documents([
        
        // optional parameters
        'shop_id' => 0
    ]);


Download documents for one or multiple shops
````````````````````````````````````````````

.. code-block:: php
    
    $result = $client->store->downloads([
        
        // optional parameters
        'document_ids' => 'string',
        'type_codes' => 'string',
        'shop_id' => 0
    ]);
    
    $filename = '/path/to/'.$result['filename'];
    $result = \Onetoweb\Mirakl\Utils::storeFile($filename, $result);


Update shop
```````````

.. code-block:: php
    
    $result = $client->store->update([
        'address' => [
            'city' => 'New York',
            'civility' => 'Mr',
            'country' => 'USA',
            'firstname' => 'Doe',
            'lastname' => 'John',
            'phone' => '213-509-6996',
            'phone_secondary' => '213-509-6995',
            'state' => 'Manhattan',
            'street1' => '30, Prince Street',
            'street2' => '1st floor',
            'zip_code' => 'NY 10012'
        ],
        'channels' => [
            'US'
        ],
        'closed_from' => '2025-03-20T16:42:21Z',
        'closed_to' => '2026-03-20T16:42:21Z',
        'description' => 'This is the description of this seller',
        'email' => 'my-store@example.com',
        'fax' => '0245875499',
        'is_professional' => true,
        'payment_info' => [
            '@type' => 'IBAN',
            'bank_name' => 'CACE',
            'bic' => 'AGRIFRPPXX2',
            'iban' => 'FR6031047696713027315572590',
            'owner' => 'John Doe'
        ],
        'pro_details' => [
            'corporate_name' => 'Mirakl Inc.',
            'identification_number' => '44268625900078',
            'tax_identification_number' => 'FR939383'
        ],
        'producer_identifiers' => [
            [
                'epr_category_code' => 'FR-DEA',
                'producer_id' => 'FR123456_89ABCD'
            ], [
                'epr_category_code' => 'DE-WEEE',
                'producer_id' => 'PRODUCERID1'
            ]
        ],
        'recycling_policy' => 'When we deliver your new item,we’ll take your old one away for you.Appliance recycling:this service is available through our home delivery service.Recycling electronic items in-store:if you have an old electronic item,we can safely recycle these items in-store,for free',
        'return_policy' => '3 days return policy',
        'shipping_country' => 'ITA',
        'shop_additional_fields' => [
            [
                'code' => 'segment',
                'value' => '1'
            ], [
                'code' => 'prio-level',
                'value' => 'High'
            ]
        ],
        'shop_name' => 'My Super Seller',
        'web_site' => 'https://example.fr'
    ]);


Upload business documents to associate with a shop
``````````````````````````````````````````````````

.. code-block:: php
    
    $files = [
        '/path/to/file1',
        '/path/to/file2'
    ];
    $result = $client->store->uploadDocument([
        'shop_documents' => [
            [
                'file_name' => 'file1',
                'type_code' => 'document'
            ], [
                'file_name' => 'file2',
                'type_code' => 'document'
            ]
        ]
    ], $files);


`Back to top <#top>`_