.. _top:
.. title:: Returns

`Back to index <index.rst>`_

=======
Returns
=======

.. contents::
    :local:


List returns
````````````

.. code-block:: php
    
    $result = $client->returns->list([
        
        // optional parameters
        'return_id' => 'string',
        'return_state' => 'string',
        'return_creation_date_from' => '2019-08-24T14:15:22Z',
        'return_creation_date_to' => '2019-08-24T14:15:22Z',
        'return_last_updated_from' => '2019-08-24T14:15:22Z',
        'return_last_updated_to' => '2019-08-24T14:15:22Z',
        'order_commercial_id' => 'string',
        'order_line_id' => 'string',
        'return_rma' => 'string',
        'customer_id' => 'string',
        'shop_id' => 0,
    ]);


Patch update returns
````````````````````

.. code-block:: php
    
    $data = [
        'returns' => [
            [
                'id' => 'string',
                'label_url' => 'string',
                'rma' => 'string',
                'tracking' => [
                    'carrier_code' => 'string',
                    'carrier_name' => 'string',
                    'carrier_standard_code' => 'string',
                    'tracking_number' => 'string',
                    'tracking_url' => 'string'
                ]
            ]
        ]
    ];
    $result = $client->returns->update($data, [
        
        // optional parameters
        'shop_id' => 0
    ]);


Accept or refuse a return request
`````````````````````````````````

.. code-block:: php
    
    $data = [
        'returns' => [
            [
                'accepted' => true,
                'id' => 'af1a537d-3f8a-4bb4-a69c-08df8395ece6'
            ], [
                'accepted' => false,
                'id' => 'b77907cb-f72e-4f69-aac3-14df566311de',
                'rejection_reason_code' => 'RETURN_REJECTION_NOT_ELIGIBLE'
            ], [
                'accepted' => true,
                'id' => 'df7b1144-0789-46f9-a0db-bb79c2c7de3a'
            ]
        ]
    ];
    $result = $client->returns->accept($data, [
        
        // optional parameters
        'shop_id' => 0
    ]);


Validate returns as received
````````````````````````````

.. code-block:: php
    
    $data = [
        'returns' => [
            [
                'id' => 'af1a537d-3f8a-4bb4-a69c-08df8395ece6'
            ], [
                'id' => 'df7b1144-0789-46f9-a0db-bb79c2c7de3a'
            ], [
                'id' => 'b77907cb-f72e-4f69-aac3-14df566311de'
            ]
        ]
    ];
    $result = $client->returns->receive($data, [
        
        // optional parameters
        'shop_id' => 0
    ]);


Mark a return as compliant or non compliant
```````````````````````````````````````````

.. code-block:: php
    
    $data = [
        'returns' => [
            [
                'id' => 'f61b5db8-d8f5-4715-b05f-aa4432c0e9e2',
                'return_lines' => [
                    [
                        'compliant' => true,
                        'order_line_id' => 'OR01-A-1'
                    ],
                    [
                        'compliant' => false,
                        'non_compliance_additional_info' => 'There is a missing item',
                        'non_compliance_reason_code' => 'RETURN_NON_COMPLIANT_MISSING_ITEM',
                        'order_line_id' => 'OR01-A-2'
                    ]
                ]
            ]
        ]
    ];
    $result = $client->returns->compliant($data, [
        
        // optional parameters
        'shop_id' => 0
    ]);


Mark a return as closed
```````````````````````

.. code-block:: php
    
    $data = [
        'returns' => [
            [
                'id' => 'af1a537d-3f8a-4bb4-a69c-08df8395ece6'
            ], [
                'id' => 'df7b1144-0789-46f9-a0db-bb79c2c7de3a'
            ], [
                'id' => 'b77907cb-f72e-4f69-aac3-14df566311de'
            ]
        ]
    ];
    $result = $client->returns->close($data, [
        
        // optional parameters
        'shop_id' => 0
    ]);


Mark a return as canceled
`````````````````````````

.. code-block:: php
    
    $data = [
        'returns' => [
            [
                'id' => 'af1a537d-3f8a-4bb4-a69c-08df8395ece6'
            ], [
                'id' => 'df7b1144-0789-46f9-a0db-bb79c2c7de3a'
            ], [
                'id' => 'b77907cb-f72e-4f69-aac3-14df566311de'
            ]
        ]
    ];
    $result = $client->returns->cancel($data, [
        
        // optional parameters
        'shop_id' => 0
    ]);


`Back to top <#top>`_