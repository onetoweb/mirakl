.. _top:
.. title:: Orders

`Back to index <index.rst>`_

======
Orders
======

.. contents::
    :local:


List orders
```````````

.. code-block:: php
    
    $result = $client->order->list([
        
        // optional parameters
        'order_ids' => 'string',
        'order_references_for_customer' => 'string',
        'order_references_for_seller' => 'string',
        'order_state_codes' => 'STAGING',
        'channel_codes' => 'string',
        'only_null_channel' => false,
        'start_date' => '2019-08-24T14:15:22Z',
        'end_date' => '2019-08-24T14:15:22Z',
        'start_update_date' => '2019-08-24T14:15:22Z',
        'end_update_date' => '2019-08-24T14:15:22Z',
        'customer_debited' => true,
        'payment_workflow' => 'PAY_ON_ACCEPTANCE',
        'has_incident' => true,
        'fulfillment_center_code' => 'string',
        'order_tax_mode' => 'TAX_INCLUDED',
        'shop_id' => 0
    ]);


Export orders asynchronously
````````````````````````````

.. code-block:: php
    
    $result = $client->order->exportAsync([
        'channel_codes' => [
            'US'
        ],
        'end_date' => '2023-01-01T00:00:00.000Z',
        'end_update_date' => '2020-08-19T14:58:22.460Z',
        'fulfillment_center_codes' => 'fulfillment_center_codes_001',
        'items_per_chunk' => 10000,
        'megabytes_per_chunk' => 100,
        'only_null_channel' => false,
        'order_state_codes' => [
            'WAITING_ACCEPTANCE',
            'SHIPPING'
        ],
        'order_tax_mode' => 'TAX_INCLUDED',
        'shop_ids' => [
            2310
        ],
        'start_date' => '2022-01-01T00:00:00.000Z',
        'start_update_date' => '2019-08-20T14:58:22.460Z'
    ], [
        
        // optional parameters
        'shop_id' => 0
    ]);


Update order
````````````

.. code-block:: php
    
    $result = $client->order->update([
        'orders' => [
            [
                'order_id' => 'string',
                'order_lines' => [
                    [
                        'eco_contributions' => [
                            [
                                'epr_category_code' => 'string',
                                'producer_id' => 'string',
                                'unit_amount' => 0
                            ]
                        ],
                        'order_line_id' => 'string'
                    ]
                ],
                'references' => [
                    'order_reference_for_seller' => 'string'
                ]
            ]
        ]
    ], [
        
        // optional parameters
        'shop_id' => 0
    ]);


Update order line shipping origin
`````````````````````````````````

.. code-block:: php
    
    $result = $client->order->updateShippingFrom([
        'order_lines' => [
            [
                'id' => 'order-line-1',
                'shipping_from' => [
                    'address' => [
                        'city' => 'New York City',
                        'country_iso_code' => 'USA',
                        'state' => 'New York',
                        'street_1' => '113 MacDougal Street',
                        'street_2' => '1st floor',
                        'zip_code' => 'NY 10012'
                    ]
                ]
            ]
        ]
    ], [
        
        // optional parameters
        'shop_id' => 0
    ]);


Get the status of an asynchronous order export
``````````````````````````````````````````````

.. code-block:: php
    
    $trackingId = '42';
    $result = $client->order->exportAsyncStatus($trackingId, [
        
        // optional parameters
        'shop_id' => 0
    ]);


Accept or refuse order lines
````````````````````````````

.. code-block:: php
    
    $result = $client->order->acceptOrderlines($orderId, [
        'order_lines' => [
            [
                'accepted' => true,
                'id' => 'Order_00012-B-1'
            ]
        ]
    ], [
        
        // optional parameters
        'shop_id' => 0
    ]);


Validate the shipment of an order
`````````````````````````````````

.. code-block:: php
    
    $orderId = '42';
    $result = $client->order->validateShipment($orderId, [
        
        // optional parameters
        'shop_id' => 0
    ]);


Perform refunds on order lines
``````````````````````````````

.. code-block:: php
    
    $result = $client->order->refundOrderLines([
        'order_tax_mode' => 'TAX_EXCLUDED',
        'refunds' => [
            [
                'amount' => 1.5,
                'currency_iso_code' => 'USD',
                'excluded_from_shipment' => false,
                'fees' => [
                    [
                        'amount' => 0.5,
                        'code' => 'CARD_FEE'
                    ], [
                        'amount' => 0.25,
                        'code' => 'EU_DRS'
                    ]
                ],
                'order_line_id' => 'Order_00010-A-1',
                'quantity' => 0,
                'reason_code' => '15',
                'shipping_amount' => 2,
                'shipping_taxes' => [
                    [
                        'amount' => '1',
                        'code' => 'tax1'
                    ], [
                        'amount' => '1',
                        'code' => 'tax2'
                    ]
                ],
                'tax_legal_notice' => 'Tax legal notice',
                'taxes' => [
                    [
                        'amount' => '1',
                        'code' => 'tax1'
                    ], [
                        'amount' => '1',
                        'code' => 'tax2'
                    ]
                ]
            ]
        ]
    ], [
        
        // optional parameters
        'shop_id' => 0
    ]);


Perform a full cancelation of an order
``````````````````````````````````````

.. code-block:: php
    
    $orderId = '42';
    $result = $client->order->cancel($orderId, [
        
        // optional parameters
        'shop_id' => 0
    ]);


Perform cancelations on order lines
```````````````````````````````````

.. code-block:: php
    
    $result = $client->order->cancelOrderlines([
        'cancelations' => [
            [
                'amount' => 2,
                'currency_iso_code' => 'USD',
                'fees' => [
                    [
                        'amount' => 0.5,
                        'code' => 'CARD_FEE'
                    ], [
                        'amount' => 0.25,
                        'code' => 'EU_DRS'
                    ]
                ],
                'order_line_id' => 'Order_00013-A-1',
                'quantity' => 0,
                'reason_code' => 34,
                'shipping_amount' => 0,
                'shipping_taxes' => [
                    [
                        'amount' => '1',
                        'code' => 'tax1'
                    ], [
                        'amount' => '1',
                        'code' => 'tax2'
                    ]
                ],
                'taxes' => [
                    [
                        'amount' => 1,
                        'code' => 'tax1'
                    ], [
                        'amount' => 1,
                        'code' => 'tax2'
                    ]
                ]
            ]
        ],
        'order_tax_mode' => 'TAX_EXCLUDED'
    ], [
        
        // optional parameters
        'shop_id' => 0
    ]);


Update the custom fields of an order and its order lines
````````````````````````````````````````````````````````

.. code-block:: php
    
    $orderId = '42';
    $result = $client->order->updateAdditionalFields($orderId, [
        'order_additional_fields' => [
            [
                'code' => 'ecotax',
                'value' => [
                    '15'
                ]
            ]
        ],
        'order_lines' => [
            [
                'order_line_additional_fields' => [
                    [
                        'code' => 'delivery-countries',
                        'value' => [
                            'Canada'
                        ]
                    ]
                ],
                'order_line_id' => 'Order_00014-A-1'
            ]
        ]
    ], [
        
        // optional parameters
        'shop_id' => 0
    ]);


Adjust order line
`````````````````

.. code-block:: php
    
    $result = $client->order->adjustOrderLine([
        'order_lines' => [
            [
                'actual_measurement' => 0.85,
                'order_line_id' => 'ORDER_0014-A-1'
            ], [
                'actual_measurement' => 1,
                'order_line_id' => 'ORDER_9999-A-1'
            ]
        ]
    ], [
        
        // optional parameters
        'shop_id' => 0
    ]);


Get the evaluation of an order
``````````````````````````````

.. code-block:: php
    
    $orderId = '42';
    $result = $client->order->evaluation($orderId, [
        
        // optional parameters
        'shop_id' => 0
    ]);


Lists order's documents
```````````````````````

.. code-block:: php
    
    $result = $client->order->documents([
        'order_ids' => 'string',
        'shop_id' => 0
    ]);


Upload documents to attach to an order
``````````````````````````````````````

.. code-block:: php
    
    $orderId = '42';
    $files = [
        '/path/to/file1',
        '/path/to/file2',
    ];
    $data = [
        'order_documents' => [
            [
                'entity' => [
                    'id' => 'string',
                    'type' => 'RETURN'
                ],
                'file_name' => 'string',
                'type_code' => 'string'
            ]
        ]
    ];
    $result = $client->order->uploadDocuments($orderId, data, $files, [
        
        // optional parameters
        'shop_id' => 0
    ]);


Download one or multiple documents attached to one or multiple orders
`````````````````````````````````````````````````````````````````````

.. code-block:: php
    
    


List all the order taxes available on the platform
``````````````````````````````````````````````````

.. code-block:: php
    
    $result = $client->order->taxes([
    
        // optional parameters
        'shop_id' => 0
    ]);


Delete an order document
````````````````````````

.. code
    
    $documentId = '42';
    $result = $client->order->deleteDocument($documentId, [
        
        // optional parameters
        'shop_id' => 0
    ]);


`Back to top <#top>`_