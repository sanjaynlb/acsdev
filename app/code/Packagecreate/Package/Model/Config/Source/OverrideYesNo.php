<?php

namespace Packagecreate\Package\Model\Config\Source;

class OverrideYesNo extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
    * Get all options
    *
    * @return array
    */
    public function getAllOptions()
    {
        $this->_options = [
                ['label' => __('Yes'), 'value'=> 1],                
                ['label' => __('No'), 'value'=> 0 ],  
            ];

        return $this->_options;

    }

}