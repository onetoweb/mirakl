.. _top:
.. title:: Invoicing and Accounting

`Back to index <index.rst>`_

========================
Invoicing and Accounting
========================

.. contents::
    :local:


List accounting documents requests
``````````````````````````````````

.. code-block:: php
    
    $result = $client->accounting->listRequest([
        
        // optional parameters
        'id' => 'string',
        'document_number' => 'string',
        'date_created_from' => '2019-08-24T14:15:22Z',
        'date_created_to' => '2019-08-24T14:15:22Z',
        'last_updated_from' => '2019-08-24T14:15:22Z',
        'last_updated_to' => '2019-08-24T14:15:22Z',
        'issue_date_from' => '2019-08-24T14:15:22Z',
        'issue_date_to' => '2019-08-24T14:15:22Z',
        'state' => 'STAGING',
        'type' => 'INVOICE',
        'issuer_type' => 'OPERATOR',
        'entity_id' => 'string',
        'entity_type' => 'PRODUCT_LOGISTIC_ORDER',
        'billing_cycle_from' => '2019-08-24T14:15:22Z',
        'billing_cycle_to' => '2019-08-24T14:15:22Z',
        'payment_state' => 'PAID',
        'shop_id' => 0
    ]);


List of document request lines
``````````````````````````````

.. code-block:: php
    
    $documentRequestId = '42';
    $result = $client->accounting->listRequestLines($documentRequestId, [
        
        // optional parameters
        'shop_id' => 0
    ]);


Download accounting documents
`````````````````````````````

.. code-block:: php
    
    $result = $client->accounting->downloadRequestDocument([
        
        // optional parameters
        'document_request_id' => 'string',
        'document_id' => 'string',
        'document_format' => 'PDF',
        'entity_id' => 'string',
        'entity_type' => 'PRODUCT_LOGISTIC_ORDER',
        'shop_id' => 0
    ]);
    
    $filename = '/path/to/'.$result['filename'];
    $result = \Onetoweb\Mirakl\Utils::storeFile($filename, $result);


Upload accounting documents
```````````````````````````

.. code-block:: php
    
    $data = [
        'requests' => [
            [
                'document_number' => 'string',
                'due_date' => '2023-03-28T09:34:42Z',
                'files' => [
                    [
                        'format' => 'PDF',
                        'name' => 'string'
                    ]
                ],
                'issue_date' => '2023-03-28T09:34:42Z',
                'request_id' => 'string',
                'total_amount_excluding_taxes' => 0,
                'total_tax_amount' => 0
            ]
        ]
    ];
    $files = [
        '/path/to/file'
    ];
    $result = $client->accounting->upload($files, $data, [
        
        // optional parameters
        'shop_id' => 0
    ]);


List accounting documents
`````````````````````````

.. code-block:: php
    
    $result = $client->accounting->listInvoices([
        
        // optional parameters
        'currency' => 'AED',
        'end_date' => '2019-08-24T14:15:22Z',
        'issuing_user_types' => 'OPERATOR',
        'pay_out_psp_codes' => 'NOT_SPECIFIED',
        'payment_status' => 'PENDING',
        'start_date' => '2019-08-24T14:15:22Z',
        'type' => 'ALL',
        'shop_id' => 0
    ]);


Download an accounting document
```````````````````````````````

.. code-block:: php
    
    $documentId = '';
    $result = $client->accounting->downloadInvoiceDocument($documentId, [
        
        // optional parameters
        'shop_id' => 0
    ]);
    
    $filename = '/path/to/'.$result['filename'];
    $result = \Onetoweb\Mirakl\Utils::storeFile($filename, $result);


List transaction lines
``````````````````````

.. code-block:: php
    
    $result = $client->accounting->listTransactionsLogs([
        'date_created_from' => '2019-08-24T14:15:22Z',
        'date_created_to' => '2019-08-24T14:15:22Z',
        'transaction_date_from' => '2019-08-24T14:15:22Z',
        'transaction_date_to' => '2019-08-24T14:15:22Z',
        'last_updated_from' => '2019-08-24T14:15:22Z',
        'payment_state' => 'PENDING',
        'transaction_type' => 'MANUAL_CREDIT',
        'accounting_document_number' => 'string',
        'order_id' => 'string',
        'order_line_id' => 'string',
        'order_reference_for_customer' => 'string',
        'order_reference_for_seller' => 'string',
        'accounting_document_id' => 'string',
        'shop_model' => 'MARKETPLACE',
        'pay_out_psp_codes' => 'NOT_SPECIFIED',
        'shop_id' => 0
    ]);


Export transaction lines JSON file asynchronously
`````````````````````````````````````````````````

.. code-block:: php
    
    $data = [
        'Transaction_date_from' => '2021-11-12T02:34:00Z',
        'megabytes_per_chunk' => '10',
        'shop_domain' => [
            'PRODUCT'
        ],
        'transaction_type' => [
            'MANUAL_CREDIT'
        ]
    ];
    $result = $client->accounting->exportTransactionLines($data, [
        'shop_id' => 0
    ]);


Poll the status of an asynchronous transaction log export
`````````````````````````````````````````````````````````

.. code-block:: php
    
    $trackingId = 'string';
    $result = $client->accounting->statusExportTransactionLines($trackingId, [
        'shop_id' => 0
    ]);


`Back to top <#top>`_