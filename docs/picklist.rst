.. _top:
.. title:: Picklist

`Back to index <index.rst>`_

========
Picklist
========

.. contents::
    :local:


List picklists
``````````````

.. code-block:: php
    
    $result = $client->picklist->list([
        
        // optional parameters
        'pickrun_code' => 'string',
        'pickup_date_min' => '2019-08-24T14:15:22Z',
        'pickup_date_max' => '2019-08-24T14:15:22Z',
        'picklist_id' => 'string',
        'picklist_state' => 'string',
        'order_line_id' => 'string',
        'shop_id' => 0,
    ]);


`Back to top <#top>`_