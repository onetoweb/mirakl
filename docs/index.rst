.. title:: Index

Index
=====

.. contents::
    :local:

===========
Basic Usage
===========

Setup

.. code-block:: php
    
    require 'vendor/autoload.php';
    
    use Onetoweb\Mirakl\Client;
    
    // param
    $instance = 'instance';
    $apiKey = 'api_key';
    
    // setup client
    $client = new Client($instance, $apiKey);


========
Examples
========

* `Stores <store.rst>`_
* `Offer <offer.rst>`_
* `Platform Settings <platform.rst>`_
* `Invoicing and Accounting <accounting.rst>`_
* `Products <product.rst>`_
* `Messages <message.rst>`_
