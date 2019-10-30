<?php
namespace Abhijit\Customcart\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\RequestInterface;
 
class Customprice implements ObserverInterface
{
	private $logger;
	private $request;

	public function __construct(\Psr\Log\LoggerInterface $logger,\Magento\Framework\App\RequestInterface $request)
	{
	    $this->logger = $logger;
	    $this->request = $request;
	}

	public function execute(\Magento\Framework\Event\Observer $observer) {
		$requestParams = $this->request->getParams();

		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$product = $objectManager->create('Magento\Catalog\Model\Product')->load($requestParams['product']);


		$this->logger->info($product->getId());
    	$item = $observer->getEvent()->getData('quote_item');	
    	  
    	// $this->logger->critical($item->getProduct()->getName());    	
    	
		$item = ( $item->getParentItem() ? $item->getParentItem() : $item );
		$price = 100; //set your price here
		$item->setCustomPrice($price);
		$item->setOriginalCustomPrice($price);

		if($product->getTypeId() == 'grouped'){
			$additionalOptions[] = array(
                'label' => "Grouped Product",
                'value' => $product->getId(),
            );
            
        	$item->getProduct()->addCustomOption('additional_options', serialize($additionalOptions));
		}
		
		$item->getProduct()->setIsSuperMode(true);
	}
 
}