.. _top:
.. title:: Messages

`Back to index <index.rst>`_

========
Messages
========

.. contents::
    :local:


Retrieve a thread
`````````````````

.. code-block:: php
    
    $threadId = '42';
    $result = $client->message->getThread($threadId, [
        
        // optional parameters
        'shop_id' => 0
    ]);


List all threads
````````````````

.. code-block:: php
    
    $threadId = '42';
    $result = $client->message->listThreads([
        
        // optional parameters
        'entity_type' => 'string',
        'entity_id' => 'string',
        'updated_since' => '2019-08-24T14:15:22Z',
        'with_messages' => false,
        'channel_codes' => 'string',
        'shop_id' => 0
    ]);


Create a thread with the operator
`````````````````````````````````

.. code-block:: php
    
    $files = [
        'path/to/file1',
        'path/to/file2',
    ];
    $data = [
        'body' => 'string',
        'entity' => [
            'type' => 'string'
        ],
        'topic' => [
            'type' => 'FREE_TEXT',
            'value' => 'string'
        ]
    ];
    $result = $client->message->createThread($files, $data, [
        
        // optional parameters
        'shop_id' => 0
    ]);


Reply to a thread
`````````````````

.. code-block:: php
    
    $threadId = '42';
    $files = [
        '/path/to/file1',
        '/path/to/file2'
    ];
    $data = [
        'body' => 'string',
        'to' => [
            [
                'id' => 'string',
                'type' => 'OPERATOR'
            ]
        ],
        'topic' => [
            'type' => 'FREE_TEXT',
            'value' => 'string'
        ]
    ];
    $result = $client->message->replyToThread($threadId, $files, $data, [
        
        // optional parameters
        'shop_id' => 0
    ]);


Download an attachment
``````````````````````

.. code-block:: php
    
    $attachmentId = '42';
    $result = $client->message->downloadAttachment($attachmentId, [
        
        // optional parameters
        'shop_id' => 0
    ]);
    
    // store file
    $filename = '/path/to/'.$result['filename'];
    $result = \Onetoweb\Mirakl\Utils::storeFile($filename, $result);


Create a thread on an order
```````````````````````````

.. code-block:: php
    
    $orderId = '42';
    $files = [
        '/path/to/file1',
        '/path/to/file2',
    ];
    $data = [
        'body' => 'string',
        'to' => [
            'OPERATOR'
        ],
        'topic' => [
            'type' => 'FREE_TEXT',
            'value' => 'string'
        ]
    ];
    $result = $client->message->createThreadOnOrder($orderId, $files, $data, [
        
        // optional parameters
        'shop_id' => 0
    ]);


`Back to top <#top>`_