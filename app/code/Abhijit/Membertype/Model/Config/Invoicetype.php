<?php

namespace Abhijit\Membertype\Model\Config;

class Invoicetype extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
    * Get all options
    *
    * @return array
    */
    public function getAllOptions()
    {
        $this->_options = [
                ['label' => __('Retail'), 'value'=>'retail'],                
                ['label' => __('Wholesale'), 'value'=>'wholesale'],  
            ];

        return $this->_options;

    }

}