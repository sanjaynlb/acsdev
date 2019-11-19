<?php

namespace Packagecreate\Membertype\Model\Config;

class Membershipcategory extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
    * Get all options
    *
    * @return array
    */
    public function getAllOptions()
    {
        $this->_options = [
                ['label' => __('Category 1'), 'value'=>'1'],                
                ['label' => __('Category 2'), 'value'=>'2'],  
            ];

        return $this->_options;

    }

}