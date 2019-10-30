<?php

namespace Abhijit\Package\Observer;

use Magento\Framework\Event\ObserverInterface;

class Productsavebefore implements ObserverInterface
{    
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $_product = $observer->getProduct();  // you will get product object
        $_sku = $_product->getSku(); // for sku
        $_product->setData('product_ids',implode(',',$_product->getData('product_ids')));
        return $_product;        
    }   
}