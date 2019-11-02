<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Catalog manage products block
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
namespace Abhijit\Package\Block\Adminhtml;

/**
 * @api
 * @since 100.0.2
 */
class Product extends \Magento\Catalog\Block\Adminhtml\Product
{    
    /**
     * Prepare button and grid
     *
     * @return \Magento\Catalog\Block\Adminhtml\Product
     */
    protected function _prepareLayout()
    {
        $addButtonProps = [
            'id' => 'add_new_product',
            'label' => __('Add Package/Product'),
            'class' => 'add',
            'button_class' => '',
            'class_name' => \Magento\Backend\Block\Widget\Button\SplitButton::class,
            'options' => $this->_getAddProductButtonOptions(),
        ];
        $this->buttonList->add('add_new', $addButtonProps);

        return parent::_prepareLayout();
    }

    /**
     * Retrieve options for 'Add Product' split button
     *
     * @return array
     */
    protected function _getAddProductButtonOptions()
    {
        $splitButtonOptions = [];
        $types = $this->_typeFactory->create()->getTypes();
        uasort(
            $types,
            function ($elementOne, $elementTwo) {
                return ($elementOne['sort_order'] < $elementTwo['sort_order']) ? -1 : 1;
            }
        );      

        foreach ($types as $typeId => $type) {
            if($typeId == 'simple' || $typeId == 'membership' || $typeId == 'grouped' || $typeId == 'virtual' ){

                $label = __($type['label']);
                if($typeId == 'membership'){
                    $label = __('Membership Package');
                }

                $splitButtonOptions[$typeId] = [
                    'label' => $label,        
                    'onclick' => "setLocation('" . $this->_getProductCreateUrl($typeId) . "')",
                    'default' => \Magento\Catalog\Model\Product\Type::DEFAULT_TYPE == $typeId,
            ];
            }            
        }

        return $splitButtonOptions;
    }
   
}
