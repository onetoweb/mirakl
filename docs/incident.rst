.. _top:
.. title:: Incidents

`Back to index <index.rst>`_

=========
Incidents
=========

.. contents::
    :local:


Mark an incident as resolved
````````````````````````````

.. code-block:: php
    
    $orderId = '';
    $line = '';
    $data = [
        'reason_code' => '8'
    ];
    $result = $client->incident->resolve($orderId, $line, $data, [
        
        // optional parameters
        'shop_id' => 0,
    ]);


`Back to top <#top>`_