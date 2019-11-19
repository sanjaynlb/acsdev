<?php
 
namespace Packagecreate\Package\Model\Product\Type;
 
class Membership extends \Magento\Catalog\Model\Product\Type\AbstractType {
  const TYPE_ID = 'membership';
 
    /**
     * {@inheritdoc}
     */
    public function deleteTypeSpecificData(\Magento\Catalog\Model\Product $product)
    {
        // method intentionally empty
    }
 
}