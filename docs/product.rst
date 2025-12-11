.. _top:
.. title:: Shop

`Back to index <index.rst>`_

=======
Product
=======

.. contents::
    :local:


List Catalog categories (parents and children) related to a Catalog category
````````````````````````````````````````````````````````````````````````````

.. code-block:: php
    
    $result = $client->product->hierarchies([
        
        // optional parameters
        'hierarchy' => 'string',
        'max_level' => 0,
        'shop_id' => 0
    ]);


Get products for a list of product references
`````````````````````````````````````````````

.. code-block:: php
    
    $result = $client->product->list([
        'product_references' => 'string',
        
        // optional parameters
        'shop_id' => 0,
        'products' => ''
    ]);


Import products to the operator information system
``````````````````````````````````````````````````

.. code-block:: php
    
    $file = '/path/to/file';
    $conversionOptions = [
        'ai_enrichment' => [
            'status' => 'ENABLED'
        ],
        'ai_rewrite' => [
            'status' => 'ENABLED'
        ]
    ];
    $conversionType = 'STANDARD'; // possible values: STANDARD / AI_CONVERTER
    $operatorFormat = false;
    $client->product->createImports($file, $conversionOptions, $conversionType, $operatorFormat, [
        
        // optional parameters
        'shop_id' => 0
    ]);


Get product import
``````````````````

.. code-block:: php
    
    $importId = 42;
    $result = $client->product->getImport($importId, [
        
        // optional parameters
        'shop_id' => 0
    ]);


List product imports
````````````````````

.. code-block:: php
    
    $result = $client->product->listImports([
        
        // optional parameters
        'last_request_date' => '2019-08-24T14:15:22Z',
        'status' => 'string',
        'has_transformed_file' => true,
        'shop_id' => 0
    ]);


Get product import error report
```````````````````````````````

.. code-block:: php
    
    $importId = 42;
    $result = $client->product->getImportErrorReport($importId, [
        
        // optional parameters
        'shop_id' => 0
    ]);


Get product import new product report
`````````````````````````````````````

.. code-block:: php
    
    $importId = 42;
    $result = $client->product->getImportNewProductReport($importId, [
        
        // optional parameters
        'shop_id' => 0
    ]);


Get product import transformed file
```````````````````````````````````

.. code-block:: php
    
    $importId = 42;
    $result = $client->product->getImportTransformedFile($importId, [
        
        // optional parameters
        'shop_id' => 0
    ]);


Get product import transformed file error report
````````````````````````````````````````````````

.. code-block:: php
    
    $importId = 42;
    $result = $client->product->getImportTransformedFileErrorReport($importId, [
        
        // optional parameters
        'shop_id' => 0
    ]);


Get product list values
```````````````````````

.. code-block:: php
    
    $result = $client->product->listValues([
        
        // optional parameters
        'code' => 'string',
        'shop_id' => 0
    ]);


Get product attributes
``````````````````````

.. code-block:: php
    
    $result = $client->product->attributes([
        
        // optional parameters
        'hierarchy' => 'string',
        'max_level' => 0,
        'all_operator_attributes' => false,
        'with_roles' => false,
        'shop_id' => 0
    ]);


`Back to top <#top>`_