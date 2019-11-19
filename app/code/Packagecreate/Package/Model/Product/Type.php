<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Packagecreate\Package\Model\Product;

use Magento\Catalog\Model\Product;
use Magento\Framework\Data\OptionSourceInterface;

/**
 * Product type model
 *
 * @api
 * @since 100.0.2
 */
class Type extends \Magento\Catalog\Model\Product\Type
{     
   
    /**
     * Get product type labels array
     *
     * @return array
     */
    public function getOptionArray()
    {
        $options = [];
        foreach ($this->getTypes() as $typeId => $type) {
            $options[$typeId] = (string)$type['label'];
        }
        return $options;
    }

    /**
     * Get product type labels array with empty value
     *
     * @return array
     */
    public function getAllOption()
    {
        $options = $this->getOptionArray();
        array_unshift($options, ['value' => '', 'label' => '']);
        return $options;
    }

    /**
     * Get product type labels array with empty value for option element
     *
     * @return array
     */
    public function getAllOptions()
    {
        $res = $this->getOptions();
        array_unshift($res, ['value' => '', 'label' => '']);       

        return $res;
    }

    /**
     * Get product type labels array for option element
     *
     * @return array
     */
    public function getOptions()
    {
        $res = [];
        foreach ($this->getOptionArray() as $index => $value) {
            if($index == 'membership'){
                $res[] = ['value' => $index, 'label' => 'Membership Package'];    
            }else{
                $res[] = ['value' => $index, 'label' => $value];
            }
            
        }

        return $res;
    }

    /**
     * Get product type label
     *
     * @param string $optionId
     * @return null|string
     */
    public function getOptionText($optionId)
    {
        $options = $this->getOptionArray();
        return $options[$optionId] ?? null;
    }

    /**
     * Get product types
     *
     * @return array
     */
    public function getTypes()
    {
        if ($this->_types === null) {
            $productTypes = $this->_config->getAll();
        
            foreach ($productTypes as $productTypeKey => $productTypeConfig) {
                if($productTypeKey == 'simple' || $productTypeKey == 'membership' ){
                    $productTypes[$productTypeKey]['label'] = __($productTypeConfig['label']);
                }else{
                    unset($productTypes[$productTypeKey]);
                }            
            }
            $this->_types = $productTypes;
        }
    
        return $this->_types;
    }

    /**
     * Return composite product type Ids
     *
     * @return array
     */
    public function getCompositeTypes()
    {
        if ($this->_compositeTypes === null) {
            $this->_compositeTypes = [];
            $types = $this->getTypes();
            foreach ($types as $typeId => $typeInfo) {
                if (array_key_exists('composite', $typeInfo) && $typeInfo['composite']) {
                    $this->_compositeTypes[] = $typeId;
                }
            }
        }
        return $this->_compositeTypes;
    }

    /**
     * Return product types by type indexing priority
     *
     * @return array
     */
    public function getTypesByPriority()
    {
        if ($this->_typesPriority === null) {
            $this->_typesPriority = [];
            $simplePriority = [];
            $compositePriority = [];

            $types = $this->getTypes();
            foreach ($types as $typeId => $typeInfo) {
                $priority = isset($typeInfo['index_priority']) ? abs((int) $typeInfo['index_priority']) : 0;
                if (!empty($typeInfo['composite'])) {
                    $compositePriority[$typeId] = $priority;
                } else {
                    $simplePriority[$typeId] = $priority;
                }
            }

            asort($simplePriority, SORT_NUMERIC);
            asort($compositePriority, SORT_NUMERIC);

            foreach (array_keys($simplePriority) as $typeId) {
                $this->_typesPriority[$typeId] = $types[$typeId];
            }
            foreach (array_keys($compositePriority) as $typeId) {
                $this->_typesPriority[$typeId] = $types[$typeId];
            }
        }
        return $this->_typesPriority;
    }

    /**
     * @inheritdoc
     */
    public function toOptionArray()
    {
        return $this->getOptions();
    }
}
