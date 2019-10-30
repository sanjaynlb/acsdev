<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Abhijit\Package\Controller\Adminhtml\Product;

use Magento\Framework\App\Action\HttpGetActionInterface as HttpGetActionInterface;
use Magento\Backend\App\Action;
use Magento\Catalog\Controller\Adminhtml\Product;
use Magento\Framework\App\ObjectManager;

class NewAction extends \Magento\Catalog\Controller\Adminhtml\Product\NewAction
{
   
    /**
     * Create new product page
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        
        $product_type = $this->getRequest()->getParam('type');
        $page_title = "New Product";

        if($product_type == 'membership' ){
            $page_title = "New Package";
        }
        

        if (!$this->getRequest()->getParam('set')) {
            return $this->resultForwardFactory->create()->forward('noroute');
        }

        $product = $this->productBuilder->build($this->getRequest());
        $this->_eventManager->dispatch('catalog_product_new_action', ['product' => $product]);

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        if ($this->getRequest()->getParam('popup')) {
            $resultPage->addHandle(['popup', 'catalog_product_' . $product->getTypeId()]);
        } else {
            $resultPage->addHandle(['catalog_product_' . $product->getTypeId()]);
            $resultPage->setActiveMenu('Magento_Catalog::catalog_products');
            $resultPage->getConfig()->getTitle()->prepend(__('Products'));
            $resultPage->getConfig()->getTitle()->prepend(__($page_title));
        }

        return $resultPage;
    }
}
