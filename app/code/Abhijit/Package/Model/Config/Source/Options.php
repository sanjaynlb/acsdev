<?php

namespace Abhijit\Package\Model\Config\Source;

class Options extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
    * Get all options
    *
    * @return array
    */
    public function getAllOptions()
    {
        $this->_options = [
                ['label' => __('ACS'), 'value'=>'acs'],                
            ];

        return $this->_options;

    }

}