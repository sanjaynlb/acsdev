<?php

namespace Abhijit\Package\Observer;

use Magento\Framework\Event\ObserverInterface;

class Productsavebefore implements ObserverInterface
{    
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $_product = $observer->getProduct();  // you will get product object
        $_sku = $_product->getSku(); // for sku
      

        if($_product->getTypeId() == 'membership'){
        	try{
        		$_product->setData('product_ids',implode(',',$_product->getData('product_ids')));		
        	}catch(\Exception $e){
        		$_product->setData('product_ids',"");
        	}        	
        }
        // else{
        // 	$_product->setTypeId('simple');
        // }
        
        return $_product;        
    }   
}