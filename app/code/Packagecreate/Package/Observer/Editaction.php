<?php

namespace Packagecreate\Package\Observer;

use Magento\Framework\Event\ObserverInterface;

class Editaction implements ObserverInterface
{    
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $_product = $observer->getProduct();  // you will get product object        

        // echo "<pre>";
        // print_r($_product->getData('quantity_and_stock_status'));
        // exit;        
    }   
}