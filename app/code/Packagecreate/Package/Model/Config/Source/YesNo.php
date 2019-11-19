<?php

namespace Packagecreate\Package\Model\Config\Source;

class YesNo extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
    * Get all options
    *
    * @return array
    */
    public function getAllOptions()
    {
        $this->_options = [
                ['label' => __('Yes'), 'value'=>'yes'],                
                ['label' => __('No'), 'value'=>'no'],  
            ];

        return $this->_options;

    }

}