.. _top:
.. title:: Multiple shipments

`Back to index <index.rst>`_

==================
Multiple shipments
==================

.. contents::
    :local:


List shipments
``````````````

.. code-block:: php
    
    $result = $client->shipment->list([
        
        // optional parameters
        'order_id' => 'string',
        'shipment_state_code' => 'string',
        'shipment_customer_debit_state_code' => 'string',
        'last_updated_from' => '2019-08-24T14:15:22Z',
        'last_updated_to' => '2019-08-24T14:15:22Z',
        'shop_id' => 0
    ]);


Create shipments
````````````````

.. code-block:: php
    
    $data = [
        'shipments' => [
            [
                'invoice_reference' => 'ABCDEF012345',
                'order_id' => 'ORDER_01-A',
                'shipment_additional_information' => [
                    [
                        'code' => 'DELIVERY_BILL_ID',
                        'type' => 'STRING',
                        'value' => 'IUYHJ777-98'
                    ], [
                        'code' => 'DELIVERY_BILL_DATE',
                        'type' => 'DATE',
                        'value' => '2024-01-01'
                    ]
                ],
                'shipment_lines' => [
                    [
                        'offer_sku' => 'OFFER_SKU_1',
                        'package_reference' => 'package_ref_1',
                        'quantity' => 1
                    ], [
                        'offer_sku' => 'OFFER_SKU_2',
                        'package_reference' => 'package_ref_2',
                        'quantity' => 3
                    ]
                ],
                'shipped' => false,
                'shipping_from' => [
                    'warehouse' => [
                        'code' => 'DEFAULT_WAREHOUSE'
                    ]
                ],
                'tracking' => [
                    'carrier_code' => 'UPS',
                    'carrier_name' => 'UPS',
                    'carrier_standard_code' => 'UPS',
                    'tracking_number' => '1Z2356F1ZJ98L9733M5',
                    'tracking_url' => 'https://wwwapps.ups.com/WebTracking/track?track=yes&trackNums={trackingId}'
                ]
            ], [
                'invoice_reference' => 'ABCDEF012345',
                'order_id' => 'ORDER_01-A',
                'shipment_additional_information' => '',
                'shipment_lines' => [
                    [
                        'order_line_id' => 'ORDER_01-A-1',
                        'package_reference' => 'package_ref_1',
                        'quantity' => 1
                    ], [
                        'order_line_id' => 'ORDER_01-A-2',
                        'package_reference' => 'package_ref_2',
                        'quantity' => 3
                    ]
                ],
                'shipped' => true,
                'tracking' => [
                    'carrier_name' => 'Custom carrier',
                    'tracking_url' => 'http://www.customcarrier.com/tracking'
                ]
            ]
        ]
    ];
    $result = $client->shipment->create($data, [
        
        // optional parameters
        'shop_id' => 0,
    ]);


Update shipment shipping origin
```````````````````````````````

.. code-block:: php
    
    $data = [
        'shipments' => [
            [
                'id' => '5b2269b6-3918-43bc-9262-fddd815398f3',
                'shipping_from' => [
                    'warehouse' => [
                        'code' => 'WHC1'
                    ]
                ]
            ],
            [
                'id' => '0e450a4c-704f-4e2c-845a-71b65b4ff16a',
                'shipping_from' => [
                    'warehouse' => [
                        'code' => 'WHC2'
                    ]
                ]
            ]
        ]
    ];
    $result = $client->shipment->update($data, [
        
        // optional parameters
        'shop_id' => 0,
    ]);


Delete shipments
````````````````

.. code-block:: php
    
    $data = [
        'shipments' => [
            [
                'id' => 'e2055970-dd6c-4d66-b005-096d6e6e0f30'
            ], [
                'id' => '89174558-2845-44ef-bd57-78db027947f7'
            ], [
                'id' => '14d134a1-eb3a-442c-b16c-05a35486d1bf'
            ]
        ]
    ];
    $result = $client->shipment->delete($data, [
        
        // optional parameters
        'shop_id' => 0,
    ]);


List items to ship
``````````````````

.. code-block:: php
    
    $result = $client->shipment->listItems([
        
        // optional parameters
        'order_id' => 'string',
        'fulfillment_center_code' => 'string',
        'shipping_date_from' => '2019-08-24T14:15:22Z',
        'shipping_date_to' => '2019-08-24T14:15:22Z',
        'shop_id' => 0
    ]);


Update carrier tracking information for shipments
``````````````````````````````````````````````````

.. code-block:: php
    
    $data = [
        'shipments' => [
            [
                'id' => 'f40bf65e-a320-41d3-878c-36ce9e1144ce',
                'tracking' => [
                    'carrier_code' => 'UPS',
                    'carrier_name' => 'UPS',
                    'carrier_standard_code' => 'UPS',
                    'tracking_number' => '1Z2356F1ZJ98L9733M5',
                    'tracking_url' => 'https://wwwapps.ups.com/WebTracking/track?track=yes&trackNums={trackingId}'
                ]
            ],
            [
                'id' => 'ff341bfe-ebeb-4211-848b-77fcbcd91723',
                'tracking' => [
                    'carrier_code' => 'UPS',
                    'carrier_name' => 'UPS',
                    'carrier_standard_code' => 'UPS',
                    'tracking_number' => '1Z2356F1ZJ98L9733M5',
                    'tracking_url' => 'https://wwwapps.ups.com/WebTracking/track?track=yes&trackNums={trackingId}'
                ]
            ]
        ]
    ];
    
    $result = $client->shipment->tracking($data, [
        
        // optional parameters
        'shop_id' => 0
    ]);


Validate shipments as shipped
`````````````````````````````

.. code-block:: php
    
    $data = [
        'shipments' => [
            [
                'id' => 'f40bf65e-a320-41d3-878c-36ce9e1144ce'
            ], [
                'id' => 'c8ca3759-a81b-4abe-afd0-93a418e83ae8'
            ], [
                'id' => 'ff341bfe-ebeb-4211-848b-77fcbcd91723'
            ]
        ]
    ];
    $result = $client->shipment->validateShipped($data, [
        
        // optional parameters
        'shop_id' => 0
    ]);


Validate shipments as ready to pick up
``````````````````````````````````````

.. code-block:: php
    
    $data = [
        'shipments' => [
            [
                'id' => 'f40bf65e-a320-41d3-878c-36ce9e1144ce'
            ], [
                'id' => 'c8ca3759-a81b-4abe-afd0-93a418e83ae8'
            ], [
                'id' => 'ff341bfe-ebeb-4211-848b-77fcbcd91723'
            ]
        ]
    ];
    $result = $client->shipment->validatePickup($data, [
        
        // optional parameters
        'shop_id' => 0
    ]);


Update shipment additional information
``````````````````````````````````````

.. code-block:: php
    
    $data = [
        'shipments' => [
            [
                'id' => '4dd549d5-3b5b-4237-a77c-a084359f93z',
                'shipment_additional_information' => [
                    [
                        'code' => 'IMEI',
                        'type' => 'STRING',
                        'value' => '38021999921000'
                    ],
                    [
                        'code' => 'DELIVERY_BILL_ID',
                        'type' => 'STRING',
                        'value' => 'invalid value with spaces'
                    ]
                ]
            ],
            [
                'id' => '245365B0-D003-4DB7-B23F-5C0A48E93E53',
                'shipment_additional_information' => [
                    [
                        'code' => 'DELIVERY_BILL_DATE',
                        'type' => 'DATE',
                        'value' => '2024-01-01'
                    ],
                    [
                        'code' => 'DELIVERY_BILL_ID',
                        'type' => 'STRING',
                        'value' => 'IUYHJ777-98'
                    ]
                ]
            ]
        ]
    ];
    $result = $client->shipment->updateAdditionalInformation($data, [
        
        // optional parameters
        'shop_id' => 0
    ]);


`Back to top <#top>`_