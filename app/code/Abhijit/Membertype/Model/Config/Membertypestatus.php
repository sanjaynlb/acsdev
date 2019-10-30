<?php

namespace Abhijit\Membertype\Model\Config;

class Membertypestatus extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
    * Get all options
    *
    * @return array
    */
    public function getAllOptions()
    {
        $this->_options = [
                ['label' => __('Active'), 'value'=>'active'],                
                ['label' => __('Inactive'), 'value'=>'inactive'],  
            ];

        return $this->_options;

    }

}