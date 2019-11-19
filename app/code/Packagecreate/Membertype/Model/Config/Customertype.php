<?php

namespace Packagecreate\Membertype\Model\Config;

class Customertype extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
    * Get all options
    *
    * @return array
    */
    public function getAllOptions()
    {
        $this->_options = [
                ['label' => __('Student'), 'value'=>'student'],                
                ['label' => __('Professional'), 'value'=>'professional'],  
            ];

        return $this->_options;

    }

}