.. _top:
.. title:: Platform Settings

`Back to index <index.rst>`_

=================
Platform Settings
=================

.. contents::
    :local:


List all custom fields
``````````````````````

.. code-block:: php
    
    $result = $client->platform->additionalFields([
        
        // optional parameters
        'entities' => 'string',
        'shop_id' => 0
    ]);


List all enabled channels
`````````````````````````

.. code-block:: php
    
    $result = $client->platform->channels([
        
        // optional parameters
        'shop_id' => 0
    ]);


List currency codes and labels
``````````````````````````````

.. code-block:: php
    
    $result = $client->platform->currencies([
        
        // optional parameters
        'shop_id' => 0
    ]);


List all document types
```````````````````````

.. code-block:: php
    
    $result = $client->platform->documents([
        
        // optional parameters
        'entities' => 'string',
        'shop_id' => 0
    ]);


List locale codes and labels
````````````````````````````

.. code-block:: php
    
    $result = $client->platform->locales([
        
        // optional parameters
        'shop_id' => 0
    ]);


List offer conditions
`````````````````````

.. code-block:: php
    
    $result = $client->platform->offersStates([
        
        // optional parameters
        'active' => true,
        'shop_id' => 0
    ]);


List platform configurations
````````````````````````````

.. code-block:: php
    
    $result = $client->platform->configuration([
        
        // optional parameters
        'shop_id' => 0
    ]);


List reasons
````````````

.. code-block:: php
    
    $result = $client->platform->reasons([
        
        // optional parameters
        'shop_id' => 0
    ]);


List all active shipping zones
``````````````````````````````

.. code-block:: php
    
    $result = $client->platform->shippingZones([
        
        // optional parameters
        'shop_id' => 0
    ]);


List all active shipping methods
````````````````````````````````

.. code-block:: php
    
    $result = $client->platform->shippingTypes([
        
        // optional parameters
        'shop_id' => 0
    ]);


List all carriers
`````````````````

.. code-block:: php
    
    $result = $client->platform->shippingCarriers([
        
        // optional parameters
        'shop_id' => 0
    ]);


List all logistic classes
`````````````````````````

.. code-block:: php
    
    $result = $client->platform->shippingLogisticClasses([
        
        // optional parameters
        'shop_id' => 0
    ]);


Health Check endpoint
`````````````````````

.. code-block:: php
    
    $result = $client->platform->version([
        
        // optional parameters
        'shop_id' => 0
    ]);


`Back to top <#top>`_