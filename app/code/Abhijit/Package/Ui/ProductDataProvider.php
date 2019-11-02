<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Abhijit\Package\Ui;

use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Magento\Ui\DataProvider\Modifier\ModifierInterface;
use Magento\Ui\DataProvider\Modifier\PoolInterface;

/**
 * DataProvider for product edit form
 *
 * @api
 * @since 101.0.0
 */
class ProductDataProvider extends \Magento\Catalog\Ui\DataProvider\Product\Form\ProductDataProvider{
      
    /**
     * {@inheritdoc}
     * @since 101.0.0
     */
    public function getMeta()
    {     
        /** @var ModifierInterface $modifier */
        $meta = parent::getMeta();


        unset($meta['search-engine-optimization']);
        unset($meta['design']);
        unset($meta['schedule-design-update']);
        unset($meta['gift-options']);
        // unset($meta['create_category_modal']);
        // unset($meta['websites']);        
        unset($meta['ts_shipping']);
        unset($meta['downloadable']);
        unset($meta['custom_options']);
        unset($meta['configurable']);        
        unset($meta['related']);
        unset($meta['product-details']['children']['container_news_from_date']);
        unset($meta['product-details']['children']['container_news_to_date']);
        // unset($meta['product-details']['children']['quantity_and_stock_status_qty']);
        // unset($meta['product-details']['children']['container_quantity_and_stock_status']);
        // unset($meta['product-details']['children']['container_weight']);
        // unset($meta['product-details']['children']['container_weight_type']);
        unset($meta['product-details']['children']['container_price_rate']);
        unset($meta['product-details']['children']['container_category_ids']['children']['create_category_button']);

        // echo "<pre>";print_r($meta);exit;
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $pool = $objectManager->create('Magento\Ui\DataProvider\Modifier\PoolInterface');

        /** @var ModifierInterface $modifier */
        foreach ($pool->getModifiersInstances() as $modifier) {
            $meta = $modifier->modifyMeta($meta);
        }

        return $meta;
    }
}


